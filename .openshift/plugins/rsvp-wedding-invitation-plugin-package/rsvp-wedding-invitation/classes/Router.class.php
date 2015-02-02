<?php
class WrsvpRouter
{
    private $_main;

    public function __construct($main)
    {
        $this->_main = $main;
    }

    public function route()
    {
        $args = $_GET;

        if (empty($args) || empty($args['action'])) {
            $action = 'index';
        } else {
            $action = $args['action'];
        }
        $action = explode('-', $action);
        if (count($action) > 1) {
            $action = array_merge(array($action[0]), array_map('ucfirst', array_slice($action, 1)));
        }
        $action = implode('', $action);
        $action .= 'Action';
        return call_user_func(array($this->_main->getController(), $action), $args);
    }

    public function url($action, $args = null)
    {
        $url = $this->_main->getAdminUrl() . '&action=' . $action;
        if (!empty($args) && is_array($args)) {
            $url .= '&' . http_build_query($args);
        }
        return $url;
    }
}