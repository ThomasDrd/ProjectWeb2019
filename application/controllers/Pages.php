<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controlleur gérant le chargement des vues
 */
class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Deal_Model');
		$this->load->model('User_Model');
   /*     $this->load->model('Comments_Model');*/
	}

	/*
	 * Chargement de la page d'accueil
	 */
	public function index()
	{
		$this->load->database();
		$select['deal'] = $this->Deal_Model->searchDealPosted();
		$this->load->view('index', $select);
	}

	################################################## DEAL ##################################################
	/*
	 * Chargement de la page de details d'un deal
	 */
	public function details($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('details', $select);

	}

	/*
	 * Chargement de la page de creation de deal
	 */
	public function createDeal()
	{
		$this->load->view('createDeal');
	}


	/*
 * Chargement de la page de modification d'un deal
 * Param : $id => id du deal
 */
	public function updateDeal($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('updateDeal', $select);
	}

	/*
	 * Chargement de la page de suppression de deal
	 * Param : $id => id du deal
	 */
	public function deleteDeal($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('deleteDeal', $select);
	}

	################################################## USER ##################################################
	/*
 	* chargement du panel admin
 	*/
	public function admin()
	{
		$this->load->database();
		$select['deal'] = $this->Deal_Model->searchDeal();
		$select['user'] = $this->User_Model->search();
		$this->load->view('adminPanel', $select);
	}



	/*
 	* Page de login
 	*/
	public function login()
	{
		$this->load->view('login');
	}


	/*
	 * Page de gestion des roles
	 */
	public function updateRole($id)
	{
		$select['roles'] = $this->User_Model->role();
		$this->load->view('updateRole', $select);
	}


	/*
	 * Information du compte
	 */
	public function compte()
	{
		session_start();
		$query['user'] = $this->User_Model->userInfo($_SESSION['idUser']);
		session_write_close();
		$this->load->view('users', $query);
	}

	/*
	 * Page de suppression d'un utilisateur
	 */
	public function deleteUser($id)
	{
		$select['user'] = $this->User_Model->userInfo($id);
		$this->load->view('deleteUser', $select);
	}

	/*
	 * Page de creation d'un utilisateur
	 */
	public function createUser()
	{
		$this->load->view('createUser');
	}




}
