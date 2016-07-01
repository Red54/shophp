<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Goods extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        {
            $this->load->model('admin_model');
            if ($this->admin_model->vsession()) {
                redirect('admin/login');
            }
            $this->load->model('goods_model');
        }
    }

    public function index()
    {
        $data['title'] = '商品信息';
        $data['goods'] = $this->goods_model->get();
        $this->load->view('admin/goods/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cid', '类别', 'trim|required');
        $this->form_validation->set_rules('name', '名称', 'trim|required');
        $this->form_validation->set_rules('spec', '规格', 'trim|required');
        if (empty($_FILES['userfile']['name'])) {
            $this->form_validation->set_rules('userfile', '图片', 'trim|required');
        } else {
            $this->form_validation->set_rules('userfile', '图片', 'trim|callback__validation');
        }
        $this->form_validation->set_rules('intro', '介绍', 'trim|required');
        $this->form_validation->set_rules('brand', '品牌', 'trim|required');
        $this->form_validation->set_rules('mprice', '市场价', 'trim|required');
        $this->form_validation->set_rules('sprice', '商城价', 'trim|required');
        $this->form_validation->set_rules('stocks', '库存量', 'trim|required');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '商品信息';
            $data['subtitle'] = '新增商品';
            $data['cname'] = $this->goods_model->cname();
            $this->load->view('admin/goods/add', $data);
        } else {
            $this->goods_model->add();
            redirect('admin/goods');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cid', '类别', 'trim|required');
        $this->form_validation->set_rules('name', '名称', 'trim|required');
        $this->form_validation->set_rules('spec', '规格', 'trim|required');
        $this->form_validation->set_rules('userfile', '图片', 'trim|callback__validation');
        $this->form_validation->set_rules('intro', '介绍', 'trim|required');
        $this->form_validation->set_rules('brand', '品牌', 'trim|required');
        $this->form_validation->set_rules('mprice', '市场价', 'trim|required');
        $this->form_validation->set_rules('sprice', '商城价', 'trim|required');
        $this->form_validation->set_rules('stocks', '库存量', 'trim|required');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '商品信息';
            $data['subtitle'] = '编辑商品';
            $data['id'] = $id;
            $data['cname'] = $this->goods_model->cname();
            $data['a'] = $this->goods_model->get($id);
            $this->load->view('admin/goods/edit', $data);
        } else {
            $this->goods_model->edit($id);
            redirect('admin/goods');
        }
    }

    public function _validation()
    {
        if (isset($_FILES['userfile']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $this->form_validation->set_message('_validation', $this->upload->display_errors());

                return false;
            } else {
                $_POST['img'] = 'uploads/'.$this->upload->data()['file_name'];

                return true;
            }
        }
    }

    public function del($id)
    {
        $this->goods_model->del($id);
        redirect('admin/goods');
    }
}
