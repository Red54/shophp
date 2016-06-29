<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();{
            $this->load->model('admin_model');
        if ($this->admin_model->strange())
            redirect('adminlogin');
        }
    }

    public function index()
    {
        $data['title'] = 'Shophp 系统';
        $data['admin'] = $this->admin_model->get();
        $this->load->view('admin/index', $data);
    }

    public function del($id)
    {
        if (1 != $id) {
            $this->admin_model->del($id);
        }
        redirect('admin');
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', '用户名', 'trim|required');
        $this->form_validation->set_rules('oldp', '旧密码', 'trim');
        $this->form_validation->set_rules('pass', '新密码', 'trim|min_length[6]|matches[conp]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|matches[pass]');
        $this->form_validation->set_rules('status', '状态', 'trim|required|callback__validation');
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Shophp 系统';
            $data['id'] = $id;
            $data['a'] = $this->admin_model->get($id);
            $this->load->view('admin/edit', $data);
        } else {
            $this->admin_model->set($id);
            redirect('admin');
        }
    }

    public function _validation()
    {
        if (null != $this->input->post('pass')) {
            $this->form_validation->set_message('_validation', '旧密码 错误');

            return $this->admin_model->oldpass();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('admin');
    }
}
