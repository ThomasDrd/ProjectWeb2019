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
			//header('Location: /ProjectWeb2019/pages/users.php');
			$this->load->view('users');
		}else{
			//header('Location: /ProjectWeb2019/index.php'); 
			$this->index();
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
		$query = $this->User_Model->user($_SESSION['idUser']);
		$this->load->view('users', $query);
	}

}