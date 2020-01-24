<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model
{
	public function search()
	{
		return  $this->db->query('SELECT u.user_id, u.nom, u.prenom, u.mail, u.password, u.pseudo, u.role_id, r.role FROM users u JOIN roles r WHERE u.role_id LIKE r.role_id ')->result();
	}

	public function searchBymail($mail)
	{
		return  $this->db->query('SELECT u.user_id, u.nom, u.prenom, u.mail, u.password, u.pseudo, u.role_id FROM users u WHERE u.mail LIKE "'.$mail.'"')->result();
	}

	public function role()
	{
		return $this->db->query('SELECT role, role_id from roles')->result();
	}

	public function userInfo($user)
	{
		return 	$this->db->query('SELECT u.user_id, u.nom, u.prenom, u.mail, u.password, u.pseudo, u.role_id, r.role FROM users u JOIN roles r WHERE u.role_id LIKE r.role_id AND u.user_id = '. $user)->result();
	}

	public function update($pseu, $nom, $prenom, $mail, $pwd, $user)
	{
		$this->db->query('UPDATE users SET  mail =  "'.$mail.'", pseudo = "'.$pseu.'", nom ="'.$nom.'", prenom = "'.$prenom.'", password = "'.$pwd.'"
		WHERE user_id ='.$user);
	}

	public function createUser($nom, $prenom, $mail, $pwd, $pseudo)
	{
		$this->db->query('INSERT INTO users (nom, prenom, mail, password, pseudo, role_id) VALUES ("'.$nom.'", "'.$prenom.'", "'.$mail.'", "'.$pwd.'", "'.$pseudo.'", 2)');
	}

	public function delete($user)
	{
		return 	$this->db->query('DELETE FROM users WHERE user_id = '.$user);
	}

	public function updateRole($user, $idRole)
	{
		return 	$this->db->query('UPDATE users SET role_id = '.$idRole.' WHERE user_id = '.$user);
	}

}
