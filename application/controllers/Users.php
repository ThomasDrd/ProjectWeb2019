<?php 
defined('BASEPATH') OR exit('No direct script access allowed');




class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_Model');
		$this->load->model('Deal_Model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}


	########################### Gestion de l'ecriture en bd ###########################


	/*
	 * Connexion de l'utilisateur
	 */
    	public function loguser()
    {
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email', array('valid_email' => 'Veuillez entrer un mail valide'));
		$this->form_validation->set_rules('pwd', 'Pwd', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['message_display'] = validation_errors();
			$this->load->view('login', $data);
		}

		else{
			$mail = $_POST['mail'];
			$pwd  = $_POST['pwd'];
			$query = $this->User_Model->searchBymail($mail);
			if (sizeof($query) > 0) {
				if(password_verify($pwd, $query[0]->password)) {
					session_start();
					$_SESSION['user'] = $query[0]->pseudo;
					$_SESSION['idUser'] = $query[0]->user_id;
					$_SESSION['role'] = $query[0]->role_id;

					header('Location: '.base_url('pages/index'));
				}
				else{
					$data['message_display'] = 'Mauvais mot de passe';
					$this->load->view('login', $data);
				}
			}
			else{
				$data['message_display'] = 'Aucun utilisateurs pour cet Email';
				$this->load->view('login', $data);
			}

			session_write_close();
		}
    }

    /*
     * Deconnexion de l'utilisateur
     */
    	public function logout()
	{	
		$this->load->helper('url');
		session_start();
		session_destroy();
		header('Location: '.base_url('pages/index'));
	}


	/*
	 * Modification de l'utilisateur
	 */
	public function userUpdate($id)
	{
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('mail', 'mail', 'required');
		$this->form_validation->set_rules('pwd', 'Pwd', 'required');
		$this->form_validation->set_rules('pwdconf', 'pwd conf', 'required|matches[pwd]');

		if ($this->form_validation->run() == FALSE)
		{
			header('Location: '.base_url('users/compte'));
		}

		else{
			$pseudo = $_POST['pseudo'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mail = $_POST['mail'];
			$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

			$this->User_Model->update($pseudo, $nom, $prenom, $mail, $pwd, $id);
			session_write_close();
			session_start();
			$_SESSION['user'] = $_POST['pseudo'];
			header('Location: '.base_url('pages/index'));
		}

	}

	/*
	 * Suppression de l'utilisateur
	 */
	public function deleteUser($id)
	{
		$this->User_Model->delete($id);
		header('Location: '.base_url('pages/admin'));
	}
	/*
	 * creation d'un utilisateur
	 */
	public function userCreate()
	{
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('pwd', 'Pwd', 'required');
		$this->form_validation->set_rules('pwdC', 'pwd conf', 'required|matches[pwd]');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required|is_unique[users.pseudo]');

		if ($this->form_validation->run() == FALSE)
		{
			header('Location: '.base_url('pages/createUser'));
		}

		else{

			$pseu = $_POST['pseudo'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mail = $_POST['mail'];
			$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
			$this->User_Model->createUser($nom, $prenom, $mail, $pwd, $pseu);
			header('Location: '.base_url('pages/login'));
		}
	}

	public function myDeals()
	{
		session_start();
		$user = $_SESSION['idUser'];
		session_write_close();
		$this->load->database();
		$select['deal'] = $this->Deal_Model->showUsersDeal($user);
		$this->load->view('myDeals', $select);
	}
}
