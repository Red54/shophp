<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gcate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if ($this->admin_model->vsession()) {
            redirect('admin/login');
        }
        $this->load->model('gcate_model');
    }

    public function index()
    {
        $data['title'] = '商品类别';
        $data['gcate'] = $this->gcate_model->get();
        $this->load->view('admin/gcate/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pid', '父级类别', 'trim|required');
        $this->form_validation->set_rules('name', '类别名称', 'trim|required');
        $this->form_validation->set_rules('intro', '类别简介', 'trim');
        if ($this->form_validation->run() === false) {
            $data['title'] = '商品类别';
            $data['subtitle'] = '新建类别';
            $data['pname'] = $this->gcate_model->pname();
            $this->load->view('admin/gcate/add', $data);
        } else {
            $this->gcate_model->add();
            redirect('admin/gcate');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pid', '父级类别', 'trim|required');
        $this->form_validation->set_rules('name', '类别名称', 'trim|required');
        $this->form_validation->set_rules('intro', '类别简介', 'trim');
        if ($this->form_validation->run() === false) {
            $data['title'] = '商品类别';
            $data['subtitle'] = '编辑信息';
            $data['id'] = $id;
            $data['pname'] = $this->gcate_model->pname($id);
            $data['a'] = $this->gcate_model->get($id);
            $this->load->view('admin/gcate/edit', $data);
        } else {
            $this->gcate_model->edit($id);
            redirect('admin/gcate');
        }
    }

    public function del($id)
    {
        $this->gcate_model->del($id);
        redirect('admin/gcate');
    }
}
