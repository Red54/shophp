<?php
class Admin_model extends CI_Model {

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
}

