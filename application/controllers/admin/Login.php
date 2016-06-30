<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->unset_userdata('admin');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', '用户', 'trim|required');
        $this->form_validation->set_rules('pass', '密码', 'trim|required|callback__validation');
        if ($this->form_validation->run() === false) {
            $data['title'] = ' 后台登录';
            $this->load->view('admin/login', $data);
        } else {
            $this->session->set_userdata('admin', $this->input->post('user'));
            redirect('admin/admin');
        }
    }

    public function _validation()
    {
        if (null != $this->input->post('user') && null != $this->input->post('pass')) {
            $this->form_validation->set_message('_validation', '登录失败');
            $this->load->model('admin_model');

            return $this->admin_model->validation();
        }
    }
}
