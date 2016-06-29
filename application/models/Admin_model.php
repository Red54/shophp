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
        $row = $this->db->get_where('admin', $user)->row_array();

        return 1 != $row['status'];
    }

    public function validation()
    {
        $sha1 = sha1($this->input->post('pass'));
        $user = array('user' => $this->input->post('user'));
        $row = $this->db->get_where('admin', $user)->row_array();
        $pass = $row['pass'];
        $status = $row['status'];

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
            'status' => $this->input->post('status'),
        );

        return $this->db->insert('admin', $data);
    }

    public function edit($id)
    {
        $data = array(
                'user' => $this->input->post('user'),
                'tel' => $this->input->post('tel'),
                'qq' => $this->input->post('qq'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
            );

        if (1 == $id) {
            $data['status'] = 1;
        }

        return $this->db->update('admin', $data, array('id' => $id));
    }

    public function passwd($id)
    {
        $data['pass'] = sha1($this->input->post('pass'));

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
