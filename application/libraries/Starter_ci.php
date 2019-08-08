<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Starter_ci {
    private $_CI;
    private $_app_identity;

    public function __construct() 
    {
        $this->_CI =& get_instance();
        $this->_app_identity = $this->_CI->db->get('app_identity')->row();
    }

    public function app_name() 
    {
        echo $this->_app_identity->name;
    }

    public function icon() 
    {
        echo $this->_app_identity->icon;
    }

    public function author() 
    {
        echo $this->_app_identity->author;
    }

}