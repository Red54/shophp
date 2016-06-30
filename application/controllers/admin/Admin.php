<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        {
            $this->load->model('admin_model');
            if ($this->admin_model->vsession()) {
                redirect('admin/login');
            }
        }
    }

    public function index()
    {
        $data['title'] = '管理员信息';
        $data['admin'] = $this->admin_model->get();
        $this->load->view('admin/admin/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', '用户名', 'trim|required|is_unique[admin.user]');
        $this->form_validation->set_rules('pass', '密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|required|matches[pass]');
        $this->form_validation->set_rules('tel', '联系电话', 'trim');
        $this->form_validation->set_rules('qq', 'QQ', 'trim');
        $this->form_validation->set_rules('email', '邮箱地址', 'trim|valid_email');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '管理员信息';
            $data['subtitle'] = '新建管理员';
            $this->load->view('admin/admin/add', $data);
        } else {
            $this->admin_model->add();
            redirect('admin/admin');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tel', '联系电话', 'trim');
        $this->form_validation->set_rules('qq', 'QQ', 'trim');
        $this->form_validation->set_rules('email', '邮箱地址', 'trim|valid_email');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '管理员信息';
            $data['subtitle'] = '编辑资料';
            $data['id'] = $id;
            $data['a'] = $this->admin_model->get($id);
            $this->load->view('admin/admin/edit', $data);
        } else {
            $this->admin_model->edit($id);
            redirect('admin/admin');
        }
    }

    public function passwd($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pass', '新密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|required|matches[pass]');
        if ($this->form_validation->run() === false) {
            $data['title'] = '管理员信息';
            $data['subtitle'] = '修改密码';
            $data['id'] = $id;
            $this->load->view('admin/admin/passwd', $data);
        } else {
            $this->admin_model->passwd($id);
            redirect('admin/admin');
        }
    }

    public function del($id)
    {
        if (1 != $id) {
            $this->admin_model->del($id);
        }
        redirect('admin/admin');
    }
}
