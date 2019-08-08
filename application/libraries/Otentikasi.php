<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otentikasi {
    private $_CI;
    private $_user_data;

    public function __construct() 
    {
        $this->_CI =& get_instance();
        $user_id = $this->_CI->session->userdata('user_id');
        $this->_user_data = $this->_CI->ion_auth->user($user_id)->row();
    }

    public function userdata() 
    {
        return $this->_user_data;
    }

}