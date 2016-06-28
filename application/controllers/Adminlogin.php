<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        $this->session->unset_userdata('admin');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', '用户', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', '密码', 'trim|required|xss_clean|callback__validation');
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Shophp 系统登录';
            $this->load->view('admin/login', $data);
        } else {
            $this->session->set_userdata('admin', $this->input->post('user'));
            redirect('admin');
        }
    }

    public function _validation()
    {
        if (null != $this->input->post('user') && null != $this->input->post('pass')) {
            $this->form_validation->set_message('_validation', '用户 或 密码 错误');

            return $this->admin_model->validation();
        }
    }
}
