<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->admin) {
            $this->load->model('admin_model');
        } else {
            redirect('adminlogin');
        }
    }

    public function index()
    {
        $data['title'] = 'Shophp 系统';
        $this->load->view('admin/index', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('admin');
    }
}
