<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Oform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        if ($this->member_model->vsession()) {
            redirect('login');
        }
        $this->load->model('goods_model');
        $this->load->model('oform_model');
        $this->load->model('ogoods_model');
    }

    public function index()
    {
        $data['oform'] = $this->oform_model->get($this->session->member);
        $data['title'] = '订单信息';
        $this->load->view('oform', $data);
    }

    public function ogoods($id)
    {
        $data['ogoods'] = $this->ogoods_model->get($id);
        $data['title'] = '订单详情';
        $data['subtitle'] = $id;
        $this->load->view('ogoods', $data);
    }

    public function commit()
    {
        $cart = $this->session->cart;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('receiver', '收货人', 'trim|required');
        $this->form_validation->set_rules('address', '收货地址', 'trim|required');
        $this->form_validation->set_rules('tel', '联系电话', 'trim|required');
        $this->form_validation->set_rules('pmethod', '付款方式', 'trim|required');
        if ($this->form_validation->run() === false) {
            $data['goods'] = array();
            $data['amount'] = 0;
            if (isset($cart)) {
                foreach ($cart as $k => $v) {
                    $g = $this->goods_model->get($k);
                    if ($v > $g['stocks']) {
                        $v = $g['stocks'];
                        $cart[$k] = $v;
                        $this->session->set_userdata('cart', $cart);
                    }
                    $g['num'] = $v;
                    $data['amount'] += $g['sprice'] * $v;
                    array_push($data['goods'], $g);
                }
            }
            $data['pmethod'] = array('0' => '意念支付');
            $data['title'] = '提交订单';
            $this->load->view('commit', $data);
        } else {
            if (isset($cart)) {
                $_POST['amount'] = 0;
                $_POST['quantity'] = 0;
                foreach ($cart as $k => $v) {
                    $_POST['quantity'] += 1;
                    $g = $this->goods_model->get($k);
                    if ($v > $g['stocks']) {
                        $v = $g['stocks'];
                        $cart[$k] = $v;
                        $this->session->set_userdata('cart', $cart);
                    }
                    $_POST['amount'] += $g['sprice'] * $v;
                }
                $_POST['mname'] = $this->session->member;
                $_POST['status'] = 0;
                $_POST['note'] = '';
                $this->oform_model->add();
                $_POST['oid'] = $this->db->insert_id();
                foreach ($cart as $k => $v) {
                    $g = $this->goods_model->get($k);
                    $_POST['gid'] = $g['id'];
                    $_POST['quantity'] = $v;
                    $_POST['price'] = $g['sprice'];
                    $_POST['subtotal'] = $g['sprice'] * $v;
                    $_POST['discount'] = 1;
                    $this->ogoods_model->add();
                }
            }
            $this->session->unset_userdata('cart');
            redirect('oform');
        }
    }
}
