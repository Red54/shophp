<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->unset_userdata('member');
        $this->session->unset_userdata('mid');
    }

    public function index()
    {
        $this->session->unset_userdata('member');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '会员', 'trim|required');
        $this->form_validation->set_rules('pass', '密码', 'trim|required|callback__validation');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员登录';
            $this->load->view('login', $data);
        } else {
            $this->session->set_userdata('member', $this->input->post('name'));
            $name = array('name' => $this->input->post('name'));
            $row = $this->db->get_where('member', $name)->row_array();
            $this->session->set_userdata('mid', $row['id']);
            redirect();
        }
    }

    public function _validation()
    {
        if (null != $this->input->post('name') && null != $this->input->post('pass')) {
            $this->load->model('member_model');
            if ($this->member_model->vpass()) {
                $this->form_validation->set_message('_validation', '该会员已被停用');

                return $this->member_model->vstatus();
            } else {
                $this->form_validation->set_message('_validation', '会员 或 密码 错误');

                return false;
            }
        }
    }
}
