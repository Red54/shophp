<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if ($this->admin_model->vsession()) {
            redirect('admin/login');
        }
        $this->load->model('member_model');
    }

    public function index()
    {
        $data['title'] = '会员信息';
        $data['member'] = $this->member_model->get();
        $this->load->view('admin/member/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '会员名', 'trim|required|is_unique[member.name]');
        $this->form_validation->set_rules('pass', '密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|required|matches[pass]');
        $this->form_validation->set_rules('passq', '密保问题', 'trim|required');
        $this->form_validation->set_rules('passa', '密保答案', 'trim|required');
        $this->form_validation->set_rules('tel', '联系电话', 'trim');
        $this->form_validation->set_rules('qq', 'QQ', 'trim');
        $this->form_validation->set_rules('mail', '邮箱', 'trim|valid_email');
        $this->form_validation->set_rules('address', '联系地址', 'trim');
        $this->form_validation->set_rules('pcode', '邮政编码', 'trim');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '新建会员';
            $this->load->view('admin/member/add', $data);
        } else {
            $this->member_model->add();
            redirect('admin/member');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tel', '联系电话', 'trim');
        $this->form_validation->set_rules('qq', 'QQ', 'trim');
        $this->form_validation->set_rules('mail', '邮箱', 'trim|valid_email');
        $this->form_validation->set_rules('address', '联系地址', 'trim');
        $this->form_validation->set_rules('pcode', '邮政编码', 'trim');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '编辑资料';
            $data['id'] = $id;
            $data['a'] = $this->member_model->get($id);
            $this->load->view('admin/member/edit', $data);
        } else {
            $this->member_model->edit($id);
            redirect('admin/member');
        }
    }

    public function passwd($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pass', '新密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|required|matches[pass]');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '修改密码';
            $data['id'] = $id;
            $this->load->view('admin/member/passwd', $data);
        } else {
            $this->member_model->passwd($id);
            redirect('admin/member');
        }
    }

    public function passpt($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('passq', '密保问题', 'trim|required');
        $this->form_validation->set_rules('passa', '密保答案', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '修改密保';
            $data['id'] = $id;
            $data['a'] = $this->member_model->get($id);
            $this->load->view('admin/member/passpt', $data);
        } else {
            $this->member_model->passpt($id);
            redirect('admin/member');
        }
    }

    public function del($id)
    {
        $this->member_model->del($id);
        redirect('admin/member');
    }
}
