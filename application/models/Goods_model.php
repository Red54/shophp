<?php

class Goods_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add()
    {
        $data = array(
            'cid' => $this->input->post('cid'),
            'name' => $this->input->post('name'),
            'spec' => $this->input->post('spec'),
            'img' => $this->input->post('img'),
            'intro' => $this->input->post('intro'),
            'brand' => $this->input->post('brand'),
            'mprice' => $this->input->post('mprice'),
            'sprice' => $this->input->post('sprice'),
            'stocks' => $this->input->post('stocks'),
            'status' => $this->input->post('status'),
        );

        return $this->db->insert('goods', $data);
    }

    public function edit($id)
    {
        $data = array(
            'cid' => $this->input->post('cid'),
            'name' => $this->input->post('name'),
            'spec' => $this->input->post('spec'),
            'intro' => $this->input->post('intro'),
            'brand' => $this->input->post('brand'),
            'mprice' => $this->input->post('mprice'),
            'sprice' => $this->input->post('sprice'),
            'stocks' => $this->input->post('stocks'),
            'status' => $this->input->post('status'),
            );
        if ($this->input->post('img')) {
            $data['img'] = $this->input->post('img');
        }

        return $this->db->update('goods', $data, array('id' => $id));
    }

    public function del($id)
    {
        return $this->db->delete('goods', array('id' => $id));
    }

    public function cname()
    {
        $res = $this->db->get('gcate')->result_array();
        foreach ($res as $r) {
            $data[$r['id']] = $r['name'];
        }

        return $data;
    }

    public function get($id = false)
    {
        if ($id === false) {
            $this->db->select('a.*,b.name as cname');
            $this->db->join('gcate b', 'a.cid = b.id', 'left');
            $query = $this->db->get('goods a');

            return $query->result_array();
        }
        $query = $this->db->get_where('goods', array('id' => $id));

        return $query->row_array();
    }
}
