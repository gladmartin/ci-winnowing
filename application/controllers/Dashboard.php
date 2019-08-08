<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            redirect('administrator/auth/login', 'refresh');
            return;
        }
    }

	public function index()
	{
        $this->layout->set_title('Dashboard');
		$this->layout->load('administrator/template', 'administrator/dashboard/index');
	}
}
