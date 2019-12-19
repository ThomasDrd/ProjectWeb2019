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
		return 	$this->db->query('SELECT * FROM users WHERE user_id = '. $user)->result();
	}

	public function update($nom, $pre, $mail, $pwd, $pseu ,$role, $user)
	{
		$this->db->query('UPDATE deals SET nom = "'.$nom.'", prenom = "'. $pre .'", mail =  "'.$mail.'", password = '.$pwd.' , pseudo = "'.$pseu.'", role_id =  "'.$role.'"
		WHERE user_id ='.$user);
	}


	public function delete($user)
	{
		return 	$this->db->query('DELETE FROM users WHERE user_id = '.$user);
	}

}
