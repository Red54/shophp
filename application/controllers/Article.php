<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
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
		if (0 == $id) {
			redirect('acate');
		}
        $this->article_model->view($id);
        $data['a'] = $this->article_model->get($id);
        $data['cid'] = $data['a']['cid'];
        $data['cname'] = $this->acate_model->get($data['cid'])['name'];
        $data['title'] = $data['a']['title'];
        $this->load->view('article', $data);
    }
}
