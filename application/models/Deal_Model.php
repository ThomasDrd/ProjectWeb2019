<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal_Model extends CI_Model
{
	public function searchByid($id)
	{
		return  $this->db->query('SELECT * FROM deals WHERE deal_id = '.$id)->result();
	}

	public function searchDeal()
	{
		return  $this->db->query('SELECT * FROM deals')->result();
	}
}
