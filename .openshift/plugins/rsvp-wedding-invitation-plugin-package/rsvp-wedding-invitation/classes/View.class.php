<?php
class WrsvpView
{
    private $_controller;
    private $_script;
    private $_base_dir;

    public $images_url;
    public $scripts_url;
    public $css_url;


    public function __construct($controller)
    {
        $this->_controller  = $controller;
        $this->_controller->setView($this);
    }

    public function init($file)
    {
        $this->_base_dir   = plugin_dir_path($file);
        $this->images_url  = plugin_dir_url($file) . 'design/images';
        $this->css_url     = plugin_dir_url($file) . 'design/css';
        $this->scripts_url = plugin_dir_url($file) . 'js';
    }

    public function getBaseDir()
    {
        return $this->_base_dir;
    }

    private function url()
    {
        $args = func_get_args();
        return call_user_func_array(array($this->_controller, 'url'), $args);
    }

    public function setScript($script)
    {
        if (!empty($script)) {
            $this->_script = $script;
        }
    }

    public function getScriptPath()
    {
        return $this->_base_dir . 'views/' . $this->_script;
    }

    public function appendScript($handle, $src, $ver = '', $in_footer = true)
    {
        wp_enqueue_script($handle, $src, array('jquery'), $ver, $in_footer);
    }

    public function render($script = null)
    {
        $this->setScript($script);
        if (empty($this->_script)) {
            throw new Exception(__('No script to render', 'wi-rsvp'));
        }
        if (!file_exists($this->getScriptPath())) {
            throw new Exception(__('Script file missing', 'wi-rsvp') . ': ' . $this->getScriptPath());
        }
        try {
            ob_start();
            include $this->getScriptPath();
            ob_end_flush();
        } catch(Exception $e) {
            wp_die($e->getMessage());
        }
    }
}