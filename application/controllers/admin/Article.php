<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        {
            $this->load->model('admin_model');
            if ($this->admin_model->vsession()) {
                redirect('admin/login');
            }
            $this->load->model('article_model');
        }
    }

    public function index()
    {
        $data['title'] = '文章信息';
        $data['article'] = $this->article_model->get();
        $this->load->view('admin/article/index', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cid', '类别', 'trim|required');
        $this->form_validation->set_rules('title', '标题', 'trim|required');
        $this->form_validation->set_rules('abstract', '摘要', 'trim|required');
        $this->form_validation->set_rules('content', '内容', 'trim|required');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '文章信息';
            $data['subtitle'] = '新增文章';
            $data['cname'] = $this->article_model->cname();
            $this->load->view('admin/article/add', $data);
        } else {
            $this->article_model->add();
            redirect('admin/article');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cid', '类别', 'trim|required');
        $this->form_validation->set_rules('title', '标题', 'trim|required');
        $this->form_validation->set_rules('abstract', '摘要', 'trim|required');
        $this->form_validation->set_rules('content', '内容', 'trim|required');
        $this->form_validation->set_rules('status', '状态', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['title'] = '文章信息';
            $data['subtitle'] = '编辑文章';
            $data['id'] = $id;
            $data['cname'] = $this->article_model->cname();
            $data['a'] = $this->article_model->get($id);
            $this->load->view('admin/article/edit', $data);
        } else {
            $this->article_model->edit($id);
            redirect('admin/article');
        }
    }

    public function del($id)
    {
        $this->article_model->del($id);
        redirect('admin/article');
    }
}
