<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Oform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if ($this->admin_model->vsession()) {
            redirect('admin/login');
        }
        $this->load->model('oform_model');
        $this->load->model('ogoods_model');
    }

    public function index()
    {
        $data['oform'] = $this->oform_model->get();
        $data['title'] = '订单信息';
        $this->load->view('admin/oform/index', $data);
    }

    public function ogoods($id)
    {
        $data['ogoods'] = $this->ogoods_model->get($id);
        $data['title'] = '订单详情';
        $data['subtitle'] = $id;
        $this->load->view('admin/oform/ogoods', $data);
    }

    public function del($id)
    {
        $this->oform_model->del($id);
        redirect('oform');
    }
}
