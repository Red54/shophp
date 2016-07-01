<?php

class Ogoods_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add()
    {
        $data = array(
            'oid' => $this->input->post('oid'),
            'gid' => $this->input->post('gid'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity'),
            'discount' => $this->input->post('discount'),
            'subtotal' => $this->input->post('subtotal'),
        );

        return $this->db->insert('ogoods', $data);
    }

    public function get($oid)
    {
        $this->db->select('a.*,b.name,b.img,b.mprice');
        $this->db->join('goods b', 'a.gid = b.id', 'left');
        $query = $this->db->get_where('ogoods a', array('oid' => $oid));

        return $query->result_array();
    }
}
