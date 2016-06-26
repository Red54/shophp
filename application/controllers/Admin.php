<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->admin)
		{
			echo $this->session->admin;
		}
		else
		{
			redirect('admin/login');
		}
	}

	public function login()
	{
		$this->session->unset_userdata('admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user', '用户', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pass', '密码', 'trim|required|xss_clean|callback__validation');
		$data['title'] = 'Shophp 管理员登录';
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/login', $data);
		}
		else
		{
			$this->session->set_userdata('admin', $this->input->post('user'));
			redirect('admin');
		}
	}

	public function _validation()
	{
		$this->form_validation->set_message('_validation', '用户 或 密码 错误');
		return $this->admin_model->validation();
	}

	public function logout()
	{
		$this->session->unset_userdata('admin');
		redirect('admin');
	}
}

