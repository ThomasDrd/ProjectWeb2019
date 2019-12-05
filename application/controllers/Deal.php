<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal extends CI_Controller
{

	public function create()
	{
		$this->load->view('createDeal');
	}
}
