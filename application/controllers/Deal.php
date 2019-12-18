<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Deal_Model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}


	public function create()
	{
		$this->load->view('createDeal');
	}

	public function dealcreate()
	{

		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('conditions', 'Conditions', 'required');
		$this->form_validation->set_rules('image', 'Images', 'required');
		$this->form_validation->set_rules('user', 'User', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('createDeal');
		}

		else
		{
			$nom = $_POST['nom'];
			$des = $_POST['description'];
			$cond = $_POST['conditions'];
			$img = $_POST['image'];
			$usr = $_POST['user'];

			$daexp = $_POST['dateexp'];
			$dadeb = $_POST['datedeb'];


			$this->Deal_Model->addDeal($nom, $des, $cond, $usr, $img, $daexp, $dadeb);
			header('Location: '.base_url('pages/admin'));
		}
	}

	public function update($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('updateDeal', $select);
	}

	public function dealUpdate($id)
	{
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('conditions', 'Conditions', 'required');
		$this->form_validation->set_rules('image', 'Images', 'required');
		$this->form_validation->set_rules('user', 'User', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('updateDeal/'. $id);
		}

		else
		{
			$nom = $_POST['nom'];
			$des = $_POST['description'];
			$cond = $_POST['conditions'];
			$img = $_POST['image'];
			$usr = $_POST['user'];

			if (isset($_POST['dateexp']))
			{
				$daexp = $_POST['dateexp'];
			}
			else
			{
				$daexp = null;
			}

			if ( isset($_POST['datedeb']))
			{
				$dadeb = $_POST['datedeb'];
			}
			else
			{
				$daexp = null;
			}

			$this->Deal_Model->updateDeal($nom, $des, $cond, $usr, $img, $daexp, $dadeb, $id);
			header('Location: '.base_url('pages/admin'));
		}
	}

	public function delete($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('deleteDeal', $select);
	}

	public function deleteDeal($idDeal)
	{
		$this->Deal_Model->deleteDeal($idDeal);
		header('Location: '.base_url('pages/admin'));
	}


	public function enable($id)
	{
		$this->Deal_Model->enableDeal($id);
		header('Location: '.base_url('pages/admin'));
	}

	public function disable($id)
	{
		$this->Deal_Model->disableDeal($id);
		header('Location: '.base_url('pages/admin'));
	}
}
