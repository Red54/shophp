<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gcate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('goods_model');
        $this->load->model('gcate_model');
    }

    public function index($id = 0)
    {
        $data['goods'] = $this->goods_model->cget($id);
        $data['cname'] = $this->goods_model->cname($id);
        if (0 == $id) {
            $data['title'] = '所有商品';
            $data['subtitle'] = '天灵灵地灵灵，所有商品快显灵，急急如律令！';
        } else {
            $cate = $this->gcate_model->get($id);
			$data['pid'] = $cate['pid'];
            if (0 != $cate['pid']) {
                $data['ptitle'] = $this->gcate_model->get($cate['pid'])['name'];
            } else {
            	$data['ptitle'] = '所有商品';
            }
            $data['title'] = $cate['name'];
            $data['subtitle'] = $cate['intro'];
        }
        $this->load->view('gcate', $data);
    }
}
