<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_Model');
	}

	 	public function login()
	{	
		$this->load->view('login');
	}

    	public function loguser()
    {
    	session_start();
		$name = (isset($_POST['name'])) ? $_POST['name'] 	: "";
		$pwd  = (!empty($_POST['pwd'])) ? $_POST['pwd'] 	: "";
		$this->load->database();
		$query = $this->User_Model->search();
			foreach($query as $row) {
				if($row->pseudo == $name AND $pwd == $row->password){	//password_verify($pwd, $row->user_pwd)) {
					    $_SESSION['user'] = $row->pseudo;
					    $_SESSION['idUser'] = $row->user_id;
				} 
			}
		session_write_close();
		if(isset($_SESSION['user'])){
			$this->compte();
			header('Location: '.base_url('pages/index'));
		}else{
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

	public function update($id)
	{
		$select['user'] = $this->User_Model->searchByid($id);
		$this->load->view('updateUser', $select);
	}

	public function userUpdate($id)
	{
		if (!empty($_POST)) {
			$nom = $_POST['nom'];
			$pre = $_POST['prenom'];
			$mail = $_POST['mail'];
			$pwd = $_POST['password'];
			$pse = $_POST['pseudo'];
			$role = $_POST['role'];
		}
		$this->User_Model->updateUser($nom, $pre, $mail, $pwd, $pse, $role, $id);
		header('Location: '.base_url('pages/admin'));
	}

	public function delete($id)
	{
		$select['user'] = $this->User_Model->searchByid($id);
		$this->load->view('deleteDeal', $select);
	}

	public function deleteUser($idDeal)
	{
		$this->User_Model->deleteDeal($idDeal);
		header('Location: '.base_url('pages/admin'));
	}
}
