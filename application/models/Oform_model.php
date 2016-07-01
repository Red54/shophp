<?php

class Oform_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add()
    {
        $data = array(
            'mname' => $this->input->post('mname'),
            'quantity' => $this->input->post('quantity'),
            'amount' => $this->input->post('amount'),
            'receiver' => $this->input->post('receiver'),
            'address' => $this->input->post('address'),
            'tel' => $this->input->post('tel'),
            'pmethod' => $this->input->post('pmethod'),
            'status' => $this->input->post('status'),
            'note' => $this->input->post('note'),
        );

        return $this->db->insert('oform', $data);
    }

    public function del($id)
    {
        $this->db->delete('ogoods', array('oid' => $id));

        return $this->db->delete('oform', array('id' => $id));
    }

    public function get($mname = false)
    {
        if ($mname === false) {
            $query = $this->db->get('oform');

            return $query->result_array();
        }
        $query = $this->db->get_where('oform', array('mname' => $mname));

        return $query->result_array();
    }
}
