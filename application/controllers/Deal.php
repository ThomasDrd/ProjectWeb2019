<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal extends CI_Controller
{
	public function create()
	{
		$this->load->view('createDeal');
	}

	public function update($id)
	{
		$this->load->database();
		$select['deal'] = $this->db->query('SELECT * FROM deals WHERE deal_id = '.$id)->result();
		$this->load->view('updateDeal', $select);
	}
}
