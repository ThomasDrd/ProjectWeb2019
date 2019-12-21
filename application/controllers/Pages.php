<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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

	/*
	 * Chargement de la page de details d'un deal
	 */
	public function details($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('details', $select);

	}

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


}
