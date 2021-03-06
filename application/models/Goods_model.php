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

    public function cname($id = false)
    {
        if ($id === false) {
            $res = $this->db->get('gcate')->result_array();
            foreach ($res as $r) {
                $data[$r['id']] = $r['name'];
            }
        } else {
            $data = $this->db->get_where('gcate', array('pid' => $id))->result_array();
        }

        return $data;
    }

    public function getcate($id)
    {
        $data = array();
        $res = $this->db->get_where('gcate', array('pid' => $id))->result_array();
        foreach ($res as $r) {
            array_push($data, $r['id']);
            $data = array_merge($data, $this->getcate($r['id']));
        }

        return $data;
    }

    public function cget($id)
    {
        $data = $this->db->get_where('goods', array('cid' => $id))->result_array();
        foreach ($this->getcate($id) as $r) {
            $data = array_merge($data, $this->db->get_where('goods', array('cid' => $r))->result_array());
        }
        usort($data, function ($a, $b) {
            return (new DateTime($b['pubtime']))->getTimestamp() - (new DateTime($a['pubtime']))->getTimestamp();
        });

        return $data;
    }

    public function get($id = false, $limit = false)
    {
        if ($id === false) {
            $this->db->select('a.*,b.name as cname');
            $this->db->join('gcate b', 'a.cid = b.id', 'left');
            $this->db->order_by('pubtime', 'DESC');
            $query = $this->db->get('goods a', $limit);

            return $query->result_array();
        }
        $query = $this->db->get_where('goods', array('id' => $id));

        return $query->row_array();
    }

    public function view($id)
    {
        $this->db->set('views','views + 1', FALSE);

        return $this->db->update('goods', NULL, array('id' => $id));
    }
}
