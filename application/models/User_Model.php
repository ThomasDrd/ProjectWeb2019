<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model
{
	public function search()
	{
		return  $this->db->query('SELECT * FROM users')->result();
	}

	public function userInfo($user)
	{
		return 	$this->db->query('SELECT * FROM users WHERE user_id = '.$user);
	}

}
