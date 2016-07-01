<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Goods extends CI_Controller
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
        if (0 == $id) {
            redirect('gcate');
        }
        $this->load->library('form_validation');
        $data['a'] = $this->goods_model->get($id);
        $cart = $this->session->cart;
        if (isset($cart[$id])) {
            $stocks = $data['a']['stocks'] - $cart[$id];
        } else {
            $stocks = $data['a']['stocks'];
        }
        $this->form_validation->set_rules('num', '数量', 'trim|required|is_natural_no_zero|less_than_equal_to['.$stocks.']');
        if ($this->form_validation->run() === false) {
            $this->goods_model->view($id);
            $data['id'] = $id;
            $data['cid'] = $data['a']['cid'];
            $data['cname'] = $this->gcate_model->get($data['cid'])['name'];
            $data['title'] = $data['a']['name'];
            $this->load->view('goods', $data);
        } else {
            $cart[$id] += $this->input->post('num');
            $this->session->set_userdata('cart', $cart);
            redirect('cart');
        }
    }
}
