<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Deal_Model');
	}


	public function create()
	{
		$this->load->view('createDeal');
	}

	public function update($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('updateDeal', $select);
	}
}
