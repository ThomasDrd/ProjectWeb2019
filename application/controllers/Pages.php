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

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Deal_Model');
		$this->load->model('User_Model');
   /*     $this->load->model('Comments_Model');*/
	}

	public function index()
	{
		$this->load->database();
		$select['deal'] = $this->Deal_Model->searchDealPosted();
		$this->load->view('index', $select);
	}

	public function details($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('details', $select);

	}

	public function admin()
	{
		$this->load->database();
		$select['deal'] = $this->Deal_Model->searchDeal();
		$select['user'] = $this->User_Model->search();
		$this->load->view('adminPanel', $select);
	}


}
