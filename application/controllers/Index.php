<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('goods_model');
        $this->load->model('article_model');
    }

    public function index()
    {
        $data['title'] = '主页';
        $data['goods'] = $this->goods_model->get(false, 2);
        $data['article'] = $this->article_model->get(false, 3);
        $this->load->view('index', $data);
    }
}
