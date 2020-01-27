<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model
{
	/*
	 * Permet de rechercher tout les utilisateur et leur rôle
	 */
	public function search() 
	{
		return  $this->db->query('SELECT u.user_id, u.nom, u.prenom, u.mail, u.password, u.pseudo, u.role_id, r.role FROM users u JOIN roles r ON u.role_id = r.role_id ')->result();
	}

	/*
	 * Permet de rechercher un utilisateur par son mail
	 */
	public function searchBymail($mail)
	{
		return  $this->db->query('SELECT user_id, nom, prenom, mail, password, pseudo, role_id FROM users WHERE mail LIKE "'.$mail.'"')->result();
	}

	/*
	 * Permet de rechercher tout les rôles
	 */
	public function role()
	{
		return $this->db->query('SELECT role, role_id from roles')->result();
	}

	/*
	 * Permet de rechercher tout les infos d'un seul utilisateur grâce a son ID
	 */
	public function userInfo($user)
	{
		return 	$this->db->query('SELECT u.user_id, u.nom, u.prenom, u.mail, u.password, u.pseudo, u.role_id, r.role FROM users u JOIN roles r ON u.role_id = r.role_id WHERE u.user_id = '. $user)->result();
	}

	/*
	 * Permet d'update les données d'un utilisateur
	 */
	public function update($pseu, $nom, $prenom, $pwd, $user)
	{
		$this->db->query('UPDATE users SET   pseudo = "'.$pseu.'", nom ="'.$nom.'", prenom = "'.$prenom.'", password = "'.$pwd.'"
		WHERE user_id ='.$user);
	}

	/*
	 * Permet de créer un utilisateur
	 */
	public function createUser($nom, $prenom, $mail, $pwd, $pseudo)
	{
		$this->db->query('INSERT INTO users (nom, prenom, mail, password, pseudo, role_id) VALUES ("'.$nom.'", "'.$prenom.'", "'.$mail.'", "'.$pwd.'", "'.$pseudo.'", 2)');
	}

	/*
	 * Permet de supprimer un utilisateur
	 */
	public function delete($user)
	{
		return 	$this->db->query('DELETE FROM users WHERE user_id = '.$user);
	}


	/*
	 * Permet d'update le rôle d'un utilisateur
	 */
	public function updateRole($user, $idRole)
	{
		return 	$this->db->query('UPDATE users SET role_id = '.$idRole.' WHERE user_id = '.$user);
	}

}
