<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /deals.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();
		$select['deal'] = $this->db->query('SELECT * FROM deals')->result();
		$this->load->view('index', $select);
	}

	public function details($id)
	{	
		$this->load->database();
		$select['deal'] = $this->db->query('SELECT * FROM deals WHERE deal_id = '.$id)->result();
		$this->load->view('details', $select);

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
		$query = $this->db->query('SELECT * FROM users');
			foreach($query->result_array() as $row) {
				if($row['pseudo'] == $name AND $pwd == $row['password']){	//password_verify($pwd, $row['user_pwd'])) {
					    $_SESSION['user'] = $row['pseudo'];
					    $_SESSION['idUser'] = $row['user_id'];
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
		session_start();
		session_destroy();
		$this->index();
	}


}
