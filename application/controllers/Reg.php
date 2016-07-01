<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->unset_userdata('member');
        $this->session->unset_userdata('mid');
    }

    public function index()
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
        $this->load->model('member_model');
        if ($this->form_validation->run() === false) {
            $data['title'] = '会员注册';
            $this->load->view('reg', $data);
        } else {
            $_POST['status'] = 1;
            $this->member_model->add();
            $this->session->set_userdata('member', $this->input->post('name'));
            $name = array('name' => $this->input->post('name'));
            $row = $this->db->get_where('member', $name)->row_array();
            $this->session->set_userdata('mid', $row['id']);
            redirect();
        }
    }
}
