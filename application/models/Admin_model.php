<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function strange()
    {
        $user = array('user' => $this->session->admin);
        $query = $this->db->get_where('admin', $user);

        return 1 != $query->row()->status;
    }

    public function oldpass()
    {
        $sha1 = sha1($this->input->post('oldp'));
        $user = array('user' => $this->input->post('user'));
        $query = $this->db->get_where('admin', $user);

        return $sha1 == $query->row()->pass;
    }

    public function validation()
    {
        $sha1 = sha1($this->input->post('pass'));
        $user = array('user' => $this->input->post('user'));
        $query = $this->db->get_where('admin', $user);
        $pass = $query->row()->pass;
        $status = $query->row()->status;

        return $sha1 == $pass && 1 == $status;
    }

    public function add()
    {
        $data = array(
            'user' => $this->input->post('user'),
            'pass' => sha1($this->input->post('pass')),
            'tel' => $this->input->post('tel'),
            'qq' => $this->input->post('qq'),
            'email' => $this->input->post('email'),
        );

        return $this->db->insert('admin', $data);
    }

    public function set($id)
    {
        $data = array(
            'user' => $this->input->post('user'),
            'tel' => $this->input->post('tel'),
            'qq' => $this->input->post('qq'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
        );

        return $this->db->update('admin', $data, array('id' => $id));
    }

    public function del($id)
    {
        return $this->db->delete('admin', array('id' => $id));
    }

    public function get($id = false)
    {
        if ($id === false) {
            $query = $this->db->get('admin');

            return $query->result_array();
        }
        $query = $this->db->get_where('admin', array('id' => $id));

        return $query->row_array();
    }
}
