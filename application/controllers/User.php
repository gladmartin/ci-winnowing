<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
            return;
        }
		$this->lang->load('auth');
    }

	public function index()
	{		
        $data['users'] = $this->ion_auth->users()->result();        
        foreach ($data['users'] as $k => $user)
        {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
        $this->layout->set_title('Manejemen User');
        $this->layout->css('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->layout->js('admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->layout->js('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->layout->js('js/script.js');
		$this->layout->load('template', 'user/index', $data);
    }
    
	public function tambah()
	{
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		$this->form_validation->set_rules('full_name', 'Nama lengkap', 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('group', 'Hak akses', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password konfirmasi', 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');
            $group = (array)$this->input->post('group');

			$additional_data = [
				'full_name' => $this->input->post('full_name'),
				'avatar' => 'default.png',
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data, $group))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("user", 'refresh');
		}
		else
		{
            $data['message'] = $this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message');
            $groups = $this->ion_auth->groups()->result();
            $option = [];
            foreach ($groups as $group) 
            {
                $option[$group->id] = $group->name;
            }
            $data['groups'] = $option;
            $this->layout->set_title('Tambah user');
		    $this->layout->load('template', 'user/tambah', $data);
		}
    }
    
    public function hapus($id = null)
    {
        $this->ion_auth->delete_user($id);
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect("user", 'refresh');
    }

}
