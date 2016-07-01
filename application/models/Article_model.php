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

    public function cname($id = false)
    {
        if ($id === false) {
            $res = $this->db->get('acate')->result_array();
            foreach ($res as $r) {
                $data[$r['id']] = $r['name'];
            }
        } else {
            $data = $this->db->get_where('acate', array('pid' => $id))->result_array();
        }

        return $data;
    }

    public function getcate($id)
    {
        $data = array();
        $res = $this->db->get_where('acate', array('pid' => $id))->result_array();
        foreach ($res as $r) {
            array_push($data, $r['id']);
            $data = array_merge($data, $this->getcate($r['id']));
        }

        return $data;
    }

    public function cget($id)
    {
        $data = $this->db->get_where('article', array('cid' => $id))->result_array();
        foreach ($this->getcate($id) as $r) {
            $data = array_merge($data, $this->db->get_where('article', array('cid' => $r))->result_array());
        }
        usort($data, function ($a, $b) {
            return (new DateTime($b['pubtime']))->getTimestamp() - (new DateTime($a['pubtime']))->getTimestamp();
        });

        return $data;
    }

    public function get($id = false, $limit = false)
    {
        if ($id === false) {
            $this->db->select('a.*,b.name');
            $this->db->join('acate b', 'a.cid = b.id', 'left');
            $this->db->order_by('pubtime', 'DESC');
            $query = $this->db->get('article a', $limit);

            return $query->result_array();
        }
        $query = $this->db->get_where('article', array('id' => $id));

        return $query->row_array();
    }
}
