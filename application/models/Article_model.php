<?php

class Article_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add()
    {
        $data = array(
            'cid' => $this->input->post('cid'),
            'title' => $this->input->post('title'),
            'abstract' => $this->input->post('abstract'),
            'content' => $this->input->post('content'),
            'status' => $this->input->post('status'),
        );

        return $this->db->insert('article', $data);
    }

    public function edit($id)
    {
        $data = array(
            'cid' => $this->input->post('cid'),
            'title' => $this->input->post('title'),
            'abstract' => $this->input->post('abstract'),
            'content' => $this->input->post('content'),
            'status' => $this->input->post('status'),
            );

        return $this->db->update('article', $data, array('id' => $id));
    }

    public function del($id)
    {
        return $this->db->delete('article', array('id' => $id));
    }

    public function cname()
    {
        $res = $this->db->get('acate')->result_array();
        foreach ($res as $r) {
                $data[$r['id']] = $r['name'];
        }

        return $data;
    }

    public function get($id = false)
    {
        if ($id === false) {
            $this->db->select('a.*,b.name');
            $this->db->join('acate b', 'a.cid = b.id', 'left');
            $query = $this->db->get('article a');

            return $query->result_array();
        }
        $query = $this->db->get_where('article', array('id' => $id));

        return $query->row_array();
    }
}
