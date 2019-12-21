<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_Model');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	 	public function login()
	{	
		$this->load->view('login');
	}

    	public function loguser()
    {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('pwd', 'Pwd', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}

		else{
			session_start();
			$name = (isset($_POST['name'])) ? $_POST['name'] 	: "";
			$pwd  = (!empty($_POST['pwd'])) ? $_POST['pwd'] 	: "";
			$this->load->database();
			$query = $this->User_Model->search();
			foreach($query as $row) {
				if($row->pseudo == $name AND $pwd == $row->password){	//password_verify($pwd, $row->user_pwd)) {
					$_SESSION['user'] = $row->pseudo;
					$_SESSION['idUser'] = $row->user_id;
					$_SESSION['role'] = $row->role_id;
				}
			}
			session_write_close();
			$this->compte();
			header('Location: '.base_url('pages/index'));
		}

		
    }
    	public function logout()
	{	
		$this->load->helper('url');
		session_start();
		session_destroy();
		header('Location: '.base_url('pages/index'));
	}

		public function compte()
	{
		session_start();
		$query['user'] = $this->User_Model->userInfo($_SESSION['idUser']);
		session_write_close();
		$this->load->view('users', $query);
	}

	public function updateRole($id)
	{
		$select['roles'] = $this->User_Model->role();
		$this->load->view('updateRole', $select);
	}

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
			$pwd = $_POST['pwd'];

			$this->User_Model->update($pseudo, $nom, $prenom, $mail, $pwd, $id);
			session_write_close();
			session_start();
			$_SESSION['user'] = $_POST['pseudo'];
			header('Location: '.base_url('pages/index'));
		}

	}

	public function delete($id)
	{
		$select['user'] = $this->User_Model->userInfo($id);
		$this->load->view('deleteUser', $select);
	}

	public function deleteUser($id)
	{
		$this->User_Model->delete($id);
		header('Location: '.base_url('pages/admin'));
	}

	public function create()
	{
		$this->load->view('createUser');
	}

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
			header('Location: '.base_url('users/create'));
		}

		else{

			$pseu = $_POST['pseudo'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mail = $_POST['mail'];
			$pwd = $_POST['pwd'];
			$this->User_Model->createUser($nom, $prenom, $mail, $pwd, $pseu);
			header('Location: '.base_url('users/login'));
		}
	}
}
