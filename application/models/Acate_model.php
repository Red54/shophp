<?php

class Acate_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add()
    {
        $data = array(
            'pid' => $this->input->post('pid'),
            'name' => $this->input->post('name'),
            'intro' => $this->input->post('intro'),
        );

        return $this->db->insert('acate', $data);
    }

    public function edit($id)
    {
        $data = array(
            'pid' => $this->input->post('pid'),
            'name' => $this->input->post('name'),
            'intro' => $this->input->post('intro'),
            );

        return $this->db->update('acate', $data, array('id' => $id));
    }

    public function del($id)
    {
        return $this->db->delete('acate', array('id' => $id));
    }

    public function pname($id = false)
    {
        $res = $this->db->get('acate')->result_array();
        $data['0'] = '无';
        foreach ($res as $r) {
            if ($id != $r['id']) {
                $data[$r['id']] = $r['name'];
            }
        }

        return $data;
    }

    public function get($id = false)
    {
        if ($id === false) {
            $this->db->select('a.*,b.name as pname');
            $this->db->join('acate b', 'a.pid = b.id', 'left');
            $query = $this->db->get('acate a');

            return $query->result_array();
        }
        $query = $this->db->get_where('acate', array('id' => $id));

        return $query->row_array();
    }
}
