<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Acate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('article_model');
        $this->load->model('acate_model');
    }

    public function index($id = 0)
    {
        $data['article'] = $this->article_model->cget($id);
        $data['cname'] = $this->article_model->cname($id);
        if (0 == $id) {
            $data['title'] = '所有文章';
            $data['subtitle'] = '天灵灵地灵灵，所有文章快显灵，急急如律令！';
        } else {
            $cate = $this->acate_model->get($id);
			$data['pid'] = $cate['pid'];
            if (0 != $cate['pid']) {
                $data['ptitle'] = $this->acate_model->get($cate['pid'])['name'];
            } else {
            	$data['ptitle'] = '所有商品';
            }
            $data['title'] = $cate['name'];
            $data['subtitle'] = $cate['intro'];
        }
        $this->load->view('acate', $data);
    }
}
