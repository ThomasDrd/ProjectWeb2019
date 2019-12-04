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

	}



}
