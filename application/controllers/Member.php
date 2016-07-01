<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        if ($this->member_model->vsession()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = '会员信息';
        $data['a'] = $this->member_model->get($this->session->mid);
        $this->load->view('member/index', $data);
    }

    public function edit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tel', '联系电话', 'trim');
        $this->form_validation->set_rules('qq', 'QQ', 'trim');
        $this->form_validation->set_rules('mail', '邮箱', 'trim|valid_email');
        $this->form_validation->set_rules('address', '联系地址', 'trim');
        $this->form_validation->set_rules('pcode', '邮政编码', 'trim');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '编辑资料';
            $data['a'] = $this->member_model->get($this->session->mid);
            $this->load->view('member/edit', $data);
        } else {
            $_POST['status'] = 1;
            $this->member_model->edit($this->session->mid);
            redirect('member');
        }
    }

    public function passwd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pass', '新密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conp', '确认密码', 'trim|required|matches[pass]');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '修改密码';
            $this->load->view('member/passwd', $data);
        } else {
            $this->member_model->passwd($this->session->mid);
            redirect('member');
        }
    }

    public function passpt()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('passq', '密保问题', 'trim|required');
        $this->form_validation->set_rules('passa', '密保答案', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员信息';
            $data['subtitle'] = '修改密保';
            $data['a'] = $this->member_model->get($this->session->mid);
            $this->load->view('member/passpt', $data);
        } else {
            $this->member_model->passpt($this->session->mid);
            redirect('member');
        }
    }
}
