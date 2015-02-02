<?php
class WrsvpRsvpController
{
    private $_main;
    private $_db;
    private $_view;

    public function __construct($main)
    {
        $this->_main = $main;
    }

    public function setCaptchaDir($upload)
    {
        $upload['subdir'] = '/captcha';
        $upload['path'] = $upload['basedir'] . $upload['subdir'];
        $upload['url'] = $upload['baseurl'] . $upload['subdir'];
        return $upload;
    }

    private function _gc($imgdir)
    {
        $expire = time() - 600;
        if (!$imgdir || strlen($imgdir) < 2) {
            // safety guard
            return;
        }
        foreach (new DirectoryIterator($imgdir) as $file) {
            if (!$file->isDot() && !$file->isDir()) {
                if ($file->getMTime() < $expire) {
                    @unlink($file->getPathname());
                }
            }
        }
    }

    protected function _generateCaptcha()
    {
        add_filter('upload_dir', array($this, 'setCaptchaDir'));
        $upload_dir = wp_upload_dir();
        if (mt_rand(1, 10) == 1) {
            $this->_gc($upload_dir['path']);
        }
        $code = rand(1000, 9999);
        $_SESSION['wi-rsvp-captcha-code'] = $code;
        if (!empty($_SESSION['wi-rsvp-captcha-file'])) {
            @unlink($_SESSION['wi-rsvp-captcha-file']);
        }
        $_SESSION['wi-rsvp-captcha-file'] = $upload_dir['path'] . '/' . md5($code) . '.png';
        $im = imagecreatetruecolor(50, 24);
        $bg = imagecolorallocate($im, 219, 212, 203);
        $fg = imagecolorallocate($im, 0, 0, 0);
        imagefill($im, 0, 0, $bg);
        imagestring($im, 5, 5, 5, $code, $fg);
        imagepng($im, $_SESSION['wi-rsvp-captcha-file']);
        imagedestroy($im);
        remove_filter('upload_dir', array($this, 'setCaptchaDir'));
        return $upload_dir['url'] . '/' . md5($code) . '.png';
    }

    public function setDb($db)
    {
        $this->_db = $db;
    }

    public function setView($view)
    {
        $this->_view = $view;
    }

    public function url()
    {
        $args = func_get_args();
        return call_user_func_array(array($this->_main->getRouter(), 'url'), $args);
    }

    public function validate($val)
    {
        return !empty($val);
    }

    public function postIsValid($post, $required_fields = null)
    {
        $posted_fields  = array_filter($post, array($this, 'validate'));
        if (!empty($required_fields)) {
            $missing_fields = array_diff($required_fields, array_keys($posted_fields));
            if (count($missing_fields) > 0) {
                return 'missing-required-fields';
            }
        }
        return true;
    }

    public function indexAction()
    {
        $this->_view->sort   = !empty($_GET['sort']) ? $_GET['sort'] : '';
        $this->_view->dir    = !empty($_GET['dir']) ? $_GET['dir'] : '';
        $this->_view->guests = $this->_db->getGuestsList($this->_view->sort, $this->_view->dir);
        $this->_view->stats  = $this->_db->getGuestStats();
        $this->_view->options = get_option('wi_rsvp_options');

        $this->_view->render('index.phtml');
    }

    public function editGuestAction()
    {
        $_POST = stripslashes_deep($_POST);
        if (empty($_POST)) {
            $params = func_get_arg(0);
            $this->_view->guest = $this->_db->getGuest($params['id']);
        } else {
            check_admin_referer('vw_rsvp_edit_guest');
            $fields = array(
                'first_name' => '%s',
                'last_name'  => '%s',
                'phone'      => '%s',
                'email'      => '%s',
                'attending'  => '%s',
                'total'      => '%d',
                'kids'       => '%d',
                'vegans'     => '%d',
                'message'    => '%s',
            );
            $required_fields = array(
                'first_name',
                'last_name',
                'phone',
                'email',
                'attending',
            );
            $error = $this->postIsValid($_POST, $required_fields);

            if ($error === true) {
                $this->_db->updateGuest(
                    array_intersect_key($_POST, $fields),
                    $_POST['id'],
                    array_values($fields)
                );
                $this->_view->success = __('Guest info saved.', 'wi-rsvp');
            } else {
                switch ($error) {
                    default:
                    case 'missing-required-fields':
                        $this->_view->error = __('Please fill in all the fields.', 'wi-rsvp');
                        break;
                }
            }
            $this->_view->guest = (object) $_POST;
        }
        $this->_view->render('edit-guest.phtml');
    }

    public function addGuestAction()
    {
        $_POST = stripslashes_deep($_POST);
        if (!empty($_POST)) {
            check_admin_referer('vw_rsvp_add_guest');
            $fields = array(
                'first_name' => '%s',
                'last_name'  => '%s',
                'phone'      => '%s',
                'email'      => '%s',
                'attending'  => '%s',
                'total'      => '%d',
                'kids'       => '%d',
                'vegans'     => '%d',
                'message'    => '%s',
            );
            $required_fields = array(
                'first_name',
                'last_name',
                'phone',
                'email',
                'attending',
            );
            $error = $this->postIsValid($_POST, $required_fields);

            if ($error === true) {
                $this->_db->addGuest(
                    array_intersect_key($_POST, $fields),
                    array_values($fields)
                );
                $this->_view->success = __('Guest added.', 'wi-rsvp');
            } else {
                switch ($error) {
                    default:
                    case 'missing-required-fields':
                        $this->_view->error = __('Please fill in all the fields.', 'wi-rsvp');
                        break;
                }
                $this->_view->guest = (object) $_POST;
            }
        }
        $this->_view->render('add-guest.phtml');
    }

    public function bulkDeleteAction()
    {
        if (!empty($_POST) && !empty($_POST['guests'])) {
            check_admin_referer('vw_rsvp_bulk_action');
            $this->_db->deleteGuests($_POST['guests']);
            $this->_view->success = __('Guests deleted.', 'wi-rsvp');
        }
        $this->_view->render('bulk-delete.phtml');
    }

    public function sendInvitesAction()
    {
        $_POST = stripslashes_deep($_POST);
        if (!empty($_POST)) {
            if (empty($_POST['send'])) {
                check_admin_referer('vw_rsvp_bulk_action');
                if (!empty($_POST['guests'])) {
                    $this->_view->guests = $this->_db->getGuests($_POST['guests']);
                }
                $this->_view->text = !empty($_POST['text']) ? $_POST['text'] : '';
                $this->_view->rsvp_text = !empty($_POST['rsvp_text']) ? $_POST['rsvp_text'] : '';
                $this->_view->rsvp_link = !empty($_POST['rsvp_link']) ? $_POST['rsvp_link'] : '';
            } else {
                check_admin_referer('vw_rsvp_send_invites');
                $guests = $this->_db->getGuests($_POST['guests']);
                $this->_view->text = $_POST['text'];
                $this->_view->rsvp_text = $_POST['rsvp_text'];
                $this->_view->rsvp_link = $_POST['rsvp_link'];

                $current_user = wp_get_current_user();
                add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                $sent   = 0;
                $errors = 0;
                foreach ($guests as $guest) {
                    ob_start();
                    $this->_view->to = $guest->first_name  . ' ' . $guest->last_name;
                    $this->_view->render('wedding-invite.phtml');
                    $html_content = ob_get_contents();
                    ob_end_clean();

                    $headers = array();
//                    $headers[] = 'From: ' . $current_user->display_name . ' < ' . strtolower($current_user->display_name) . '@ithemewordpress.com>';
                    if (wp_mail($guest->email, __('Wedding invitation', 'wi-rsvp'), $html_content, $headers)) {
                        $sent++;
                        $this->_db->updateGuest(array('invited_datetime' => date('Y-m-d H:i:s')), $guest->id, array('%s'));
                    } else {
                        $errors++;
                    }
                }
                $this->_view->success  = $sent . ' ' . __('invites sent successfully', 'wi-rsvp') . '.';
                $this->_view->success .= '<br>' . $errors . ' ' . __('errors', 'wi-rsvp') . '.';
            }
        }
        $this->_view->render('send-invites.phtml');
    }

    public function previewInviteAction()
    {
        $_POST = stripslashes_deep($_POST);
        if (!empty($_POST)) {
            check_admin_referer('vw_rsvp_send_invites');
            if (!empty($_POST['guests'])) {
                $this->_view->guests = $this->_db->getGuests($_POST['guests']);
            }
            $this->_view->to = __('John Smith', 'wi-rsvp');
            $this->_view->text = $_POST['text'];
            $this->_view->rsvp_text = $_POST['rsvp_text'];
            $this->_view->rsvp_link = $_POST['rsvp_link'];
        }
        $this->_view->render('preview-invite.phtml');
    }

    public function rsvpAction()
    {
        $_POST = stripslashes_deep($_POST);
        // Must be in same order as _POST fields
        $fields = array(
            'first_name' => '%s',
            'last_name'  => '%s',
            'phone'      => '%s',
            'email'      => '%s',
            'attending'  => '%s',
            'message'    => '%s',
            'total'      => '%d',
            'kids'       => '%d',
            'vegans'     => '%d',
        );
        $required_fields = array(
            'first_name',
            'last_name',
            'phone',
            'email',
            'attending',
            'total',
        );
        $options = get_option('wi_rsvp_options');

        if (!empty($_POST)) {
            if (!wp_verify_nonce($_POST['_wpnonce'], 'vw_rsvp_index')) {
                die(__('Security check failed!', 'wi-rsvp'));
            }
            if (!empty($_POST['attending']) && $_POST['attending'] == 'N') {
                $required_fields = array_diff($required_fields, array('total'));
                $_POST['total']  = 0;
                $_POST['kids']   = 0;
                $_POST['vegans'] = 0;
            }
            $error = $this->postIsValid($_POST, $required_fields);
            if ($options['rsvp_email_validation'] == 'N') {
                if (empty($_POST['captcha']) || $_POST['captcha'] != $_SESSION['wi-rsvp-captcha-code']) {
                    $error = 'captcha-invalid';
                }
            }

            if ($error === true) {
                if (($guest = $this->_db->findGuestByEmail($_POST['email']))) {
                    $this->_db->updateGuest(
                        array_intersect_key($_POST, $fields),
                        $guest->id,
                        array_values($fields)
                    );
                    $this->_view->success = __('Your RSVP was submitted. Thank you.', 'wi-rsvp');
                } else {
                    if ($options['rsvp_email_validation'] != 'N') {
                        $this->_view->error = __('You are not on the guest list.', 'wi-rsvp');
                        $this->_view->guest = (object) $_POST;
                    } else {
                        $this->_db->addGuest(
                            array_intersect_key($_POST, $fields),
                            array_values($fields)
                        );
                        $this->_view->success = __('Your RSVP was submitted. Thank you.', 'vw_rsvp');
                    }
                }
            } else {
                switch ($error) {
                    default:
                    case 'missing-required-fields':
                        $this->_view->error = __('Please fill in all the fields.', 'wi-rsvp');
                        break;
                    case 'captcha-invalid':
                        $this->_view->error = __('Please input the code in the image correctly.', 'wi-rsvp');
                        break;
                }
                $this->_view->guest = (object) $_POST;
            }
        } else {
            $this->_view->guest = (object) array_keys($fields);
        }
        if ($options['rsvp_email_validation'] == 'N') {
            $this->_view->captcha = $this->_generateCaptcha();
        }
        $this->_view->render('rsvp-form.phtml');
    }
}