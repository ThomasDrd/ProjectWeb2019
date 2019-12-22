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


	########################### Execution de methodes du model pour ecriture en bd ###########################

	/*
	 * Execution création d'un deal
	 */
	public function dealcreate()
	{

		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('conditions', 'Conditions', 'required');
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
			header('Location: '.base_url('pages/index'));
		}
	}


	/*
	 * Execution modification d'un deal
	 * Param : $id => id du deal
	 */
	public function dealUpdate($id)
	{
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('conditions', 'Conditions', 'required');
		$this->form_validation->set_rules('user', 'User', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			header('Location: '.base_url('pages/updateDeal/'.$id));
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


			$this->Deal_Model->updateDeal($nom, $des, $cond, $usr, $img, $daexp, $dadeb, $id);
			header('Location: '.base_url('pages/admin'));
		}
	}


	/*
	 * Exection suppression d'un deal
	 * Param : $id => id du deal
	 */
	public function dealDelete($idDeal)
	{
		$this->Deal_Model->deleteDeal($idDeal);
		header('Location: '.base_url('pages/admin'));
	}


	/*
	 * Execution mise en ligne d'un deal (visible des utilisateurs)
	 * Param : $id => id du deal
	 */
	public function dealEnable($id)
	{
		$this->Deal_Model->enableDeal($id);
		header('Location: '.base_url('pages/admin'));
	}


	/*
	 * Exectuion mise hors ligne du deal
	 * Param : $id => id du deal
	 */
	public function dealDisable($id)
	{
		$this->Deal_Model->disableDeal($id);
		header('Location: '.base_url('pages/admin'));
	}
}
