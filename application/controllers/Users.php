<?php 
defined('BASEPATH') OR exit('No direct script access allowed');




class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_Model');
		$this->load->model('Deal_Model');
		$this->load->model('Comments_Model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->config->set_item('language', 'french');
	}


	########################### Gestion de l'ecriture en bd ###########################


	/*
	 * Connexion de l'utilisateur, vérifie le mot de passe pour l'addresse mail donnée. Redirection sur l'index en cas de réussite, sinon retour à la page login avec les erreurs en questions.
	 */
    	public function loguser()
    {
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('pwd', 'Password', 'required');

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
				$data['message_display'] = 'Aucun utilisateur pour cet Email';
				$this->load->view('login', $data);
			}

			session_write_close();
		}
    }

    /*
     * Deconnexion de l'utilisateur, suppression des variables sessions et redirection à l'index
     */
    	public function logout()
	{	
		$this->load->helper('url');
		session_start();
		session_destroy();
		header('Location: '.base_url('pages/index'));
	}


	/*
	 * Modification de l'utilisateur vérification du respect de règles des champs. Si erreur, renvoie sur la page de l'utilisateur, sinon, les champs sont mis à jour avec une redirection à l'index.
	 */
	public function userUpdate($id)
	{
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('pwd', 'Password', 'required');
		$this->form_validation->set_rules('pwdc', 'Password Confirmation', 'required|matches[pwd]');

		if ($this->form_validation->run() == FALSE)
		{
			session_start();
			$data = array(
				'user' => $this->User_Model->userInfo($_SESSION['idUser']),
				'message_display' => validation_errors()
			);
			session_write_close();
			$this->load->view('users', $data);
		}

		else{
			$pseudo = $_POST['pseudo'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

			$this->User_Model->update($pseudo, $nom, $prenom, $pwd, $id);
			session_write_close();
			session_start();
			$_SESSION['user'] = $_POST['pseudo'];
			header('Location: '.base_url('pages/index'));
		}

	}

	/*
	 * Suppression de l'utilisateur, délétion de tout ses commentaires, ainsi que tout ses deal, puis de l'utilisateur.
	 */
	public function deleteUser($id)
	{
		$deals = $this->Deal_Model->showUsersDeal($id);
		$coms = $this->Comments_Model->searchByUser($id);

		foreach ($coms as $com)
		{
			$this->Comments_Model->deleteCommentToDeal($com->comment_id);
		}

		foreach ($deals as $deal)
		{
			$this->Deal_Model->deleteDeal($deal->deal_id);
		}

		$this->User_Model->delete($id);
		header('Location: '.base_url('pages/admin'));
	}

	/*
	 * creation d'un utilisateur, si tout les champs requis sont validés, alors l'utilisateur est crée, si il y a une erreur, redirection sur la page de création avec les erreurs en question.
	 */
	public function userCreate()
	{
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('mail', 'mail', 'required|valid_email|is_unique[users.mail]');
		$this->form_validation->set_rules('pwd', 'Password', 'required');
		$this->form_validation->set_rules('pwdc', 'Password Confirmation', 'required|matches[pwd]');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$data['message_display'] = validation_errors();
			$this->load->view('createUser', $data);
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

	/*
	 * Fonction qui permet de update le rôle d'un utilisateur. Le paramètre est l'id de l'utilisateur /!\ A savoir qu'un admin ne peut être rétrogradé que depuis la base de données pour des raisons évidentes de sécurité. 
	 */
	public function updateRole($id)
	{
		$role = $_POST['selectRole'];
		$this->User_Model->updateRole($id, $role);
		header('Location: '. base_url('pages/admin'));
	}
}
