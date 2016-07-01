<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Acate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if ($this->admin_model->vsession()) {
            redirect('admin/login');
        }
        $this->load->model('acate_model');
    }

    public function index()
    {
        $data['title'] = '文章类别';
        $data['acate'] = $this->acate_model->get();
        $this->load->view('admin/acate/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pid', '父级类别', 'trim|required');
        $this->form_validation->set_rules('name', '类别名称', 'trim|required');
        $this->form_validation->set_rules('intro', '类别简介', 'trim');
        if ($this->form_validation->run() === false) {
            $data['title'] = '文章类别';
            $data['subtitle'] = '新建类别';
            $data['pname'] = $this->acate_model->pname();
            $this->load->view('admin/acate/add', $data);
        } else {
            $this->acate_model->add();
            redirect('admin/acate');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pid', '父级类别', 'trim|required');
        $this->form_validation->set_rules('name', '类别名称', 'trim|required');
        $this->form_validation->set_rules('intro', '类别简介', 'trim');
        if ($this->form_validation->run() === false) {
            $data['title'] = '文章类别';
            $data['subtitle'] = '编辑信息';
            $data['id'] = $id;
            $data['pname'] = $this->acate_model->pname($id);
            $data['a'] = $this->acate_model->get($id);
            $this->load->view('admin/acate/edit', $data);
        } else {
            $this->acate_model->edit($id);
            redirect('admin/acate');
        }
    }

    public function del($id)
    {
        $this->acate_model->del($id);
        redirect('admin/acate');
    }
}
