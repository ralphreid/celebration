<?php
require_once dirname(__FILE__) . '/Db.class.php';
require_once dirname(__FILE__) . '/RsvpController.class.php';
require_once dirname(__FILE__) . '/Router.class.php';
require_once dirname(__FILE__) . '/View.class.php';

class WrsvpRsvp
{
    private $_controller;
    private $_router;
    private $_view;
    private $_db;
    private $_admin_slug = 'plugins.php';
    private $_admin_page = 'rsvp';

    public function __construct($wpdb, $file)
    {
        $this->_controller = new WrsvpRsvpController($this);
        $this->_router     = new WrsvpRouter($this);
        $this->_view       = new WrsvpView($this->_controller);

        $this->_view->init($file);
        $this->setDb($wpdb);
    }

    public function activation()
    {
        $this->_db->setupTables();
    }

    public function init()
    {
        if (!session_id()) {
            session_start();
        }
        add_action('admin_menu', array($this, 'addAdminPage'));
        add_shortcode('rsvp', array($this, 'rsvp_shortcode'));
        $this->_db->updateTables();
    }

    public function setEmailValidation()
    {
        $options = get_option('wi_rsvp_options');
        if (!empty($_POST['status'])) {
            if ($_POST['status'] == 'Y') {
                $options['rsvp_email_validation'] = 'Y';
            } else {
                $options['rsvp_email_validation'] = 'N';
            }
        }
        update_option('wi_rsvp_options', $options);
        echo $options['rsvp_email_validation'];
        exit();
    }

    public function setDb($wpdb)
    {
        $this->_db = new WrsvpDb($wpdb);
        $this->_controller->setDb($this->_db);
    }

    public function getDb()
    {
        return $this->_db;
    }

    public function getView()
    {
        return $this->_view;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getRouter()
    {
        return $this->_router;
    }

    public function getAdminUrl()
    {
        return admin_url($this->_admin_slug . '?page=' . $this->_admin_page);
    }

    public function addAdminPage()
    {
        add_submenu_page($this->_admin_slug, __('RSVP', 'wi-rsvp'), __('RSVP', 'wi-rsvp'),
            'edit_theme_options', $this->_admin_page, array($this->_router, 'route'));
    }

    public function indexPage()
    {
        $this->_controller->rsvpAction();
    }

    function enqueueScripts() {
        global $post;

        if (!empty($post) && !empty($post->post_content) && strpos($post->post_content, '[rsvp') !== false) {
            wp_enqueue_style('wrsvp-rsvp-css', $this->_view->css_url . '/rsvp_style.css', array(), '1.0', 'all');
            wp_enqueue_script('wrsvp-rsvp-js', $this->_view->scripts_url . '/rsvp.js', array('jquery'), '1.0', true);
        }
    }

    public function rsvp_shortcode( $atts, $content = null )
    {
        ob_start();
        $this->indexPage();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}