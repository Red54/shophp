<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('goods_model');
        $this->load->model('gcate_model');
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $a = $this->goods_model->get($id);
        $stocks = $a['stocks'];
        $this->form_validation->set_rules('num', '数量', 'trim|required|is_natural_no_zero|less_than_equal_to['.$stocks.']');
        if ($this->form_validation->run() === false) {
            $data['goods'] = array();
            $cart = $this->session->cart;
            if (isset($cart)) {
                foreach ($cart as $k => $v) {
                    $g = $this->goods_model->get($k);
                    $g['num'] = $v;
                    $data['total'] += $g['sprice'] * $v;
                    array_push($data['goods'], $g);
                }
            }
            $data['title'] = '购物车';
            $this->load->view('cart', $data);
        } else {
            $cart[$id] = $this->input->post('num');
            $this->session->set_userdata('cart', $cart);
            redirect('cart');
        }
    }

    public function index()
    {
        $this->load->library('form_validation');
        $data['goods'] = array();
        $data['total'] = 0;
        $cart = $this->session->cart;
        if (isset($cart)) {
            foreach ($cart as $k => $v) {
                $g = $this->goods_model->get($k);
				if ($v > $g['stocks']) {
					$v = $g['stocks'];
					$cart[$k] = $v;
					$this->session->set_userdata('cart', $cart);
				}
                $g['num'] = $v;
                $data['total'] += $g['sprice'] * $v;
                array_push($data['goods'], $g);
            }
        }
        $data['title'] = '购物车';
        $this->load->view('cart', $data);
    }

    public function del($id)
    {
        $cart = $this->session->cart;
        unset($cart[$id]);
        $this->session->set_userdata('cart', $cart);
        redirect('cart');
    }

    public function empty()
    {
        $this->session->unset_userdata('cart');
        redirect('cart');
    }
}
