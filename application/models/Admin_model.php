<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function validation()
    {
        $sha1 = sha1($this->input->post('pass'));
        $user = array('user' => $this->input->post('user'));
        $query = $this->db->get_where('admin', $user);
        $pass = $query->row()->pass;

        return $sha1 == $pass;
    }
    public function add()
    {
        $data = array(
            'user' => $this->input->post('user'),
            'pass' => sha1($this->input->post('pass')),
            'tel' => $this->input->post('tel'),
            'tel' => $this->input->post('tel'),
            'qq' => $this->input->post('qq'),
            'email' => $this->input->post('email'),
        );
        return $this->db->insert('news', $data);
    }
}
