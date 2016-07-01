<?php

class Member_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function vsession()
    {
        $name = array('name' => $this->session->member);
        $row = $this->db->get_where('member', $name)->row_array();
        return 1 != $row['status'] || $row['id'] != $this->session->mid;
    }

    public function vstatus()
    {
        $user = array('name' => $this->input->post('name'));
        $row = $this->db->get_where('member', $name)->row_array();
        return 1 == $row['status'];
    }

    public function vpass()
    {
        $sha1 = sha1($this->input->post('pass'));
        $name = array('name' => $this->input->post('name'));
        $row = $this->db->get_where('member', $name)->row_array();

        return $sha1 == $row['pass'];
    }

    public function add()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'pass' => sha1($this->input->post('pass')),
            'passq' => $this->input->post('passq'),
            'passa' => sha1($this->input->post('passa')),
            'tel' => $this->input->post('tel'),
            'qq' => $this->input->post('qq'),
            'mail' => $this->input->post('mail'),
            'address' => $this->input->post('address'),
            'pcode' => $this->input->post('pcode'),
            'status' => $this->input->post('status'),
        );

        return $this->db->insert('member', $data);
    }

    public function edit($id)
    {
        $data = array(
            'tel' => $this->input->post('tel'),
            'qq' => $this->input->post('qq'),
            'mail' => $this->input->post('mail'),
            'address' => $this->input->post('address'),
            'pcode' => $this->input->post('pcode'),
            'status' => $this->input->post('status'),
            );

        return $this->db->update('member', $data, array('id' => $id));
    }

    public function passwd($id)
    {
        $data['pass'] = sha1($this->input->post('pass'));

        return $this->db->update('member', $data, array('id' => $id));
    }

    public function passpt($id)
    {
        $data['passq'] = $this->input->post('passq');
        $data['passa'] = sha1($this->input->post('passa'));

        return $this->db->update('member', $data, array('id' => $id));
    }

    public function del($id)
    {
        return $this->db->delete('member', array('id' => $id));
    }

    public function get($id = false)
    {
        if ($id === false) {
            $query = $this->db->get('member');

            return $query->result_array();
        }
        $query = $this->db->get_where('member', array('id' => $id));

        return $query->row_array();
    }
}
