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
		$this->load->model('Comments_Model');
	}


	########################### Execution de methodes du model pour ecriture en bd ###########################

	/*
	 * Execution création d'un deal
	 */
	public function dealcreate()
	{

		$this->form_validation->set_rules('nom', 'Nom', 'required', array('required' => 'Veuillez entrer un nom de deal'));
		$this->form_validation->set_rules('description', 'Description', 'required', array('required' => 'Veuillez entrer une description'));
		$this->form_validation->set_rules('conditions', 'Conditions', 'required', array('required' => 'Veuillez entrer des conditions'));
		$this->form_validation->set_rules('user', 'User', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['message_display'] = validation_errors();
			$this->load->view('createDeal', $data);
		}

		else
		{
			$nom = $_POST['nom'];
			$description = $_POST['description'];
			$conditions = $_POST['conditions'];
			$user = $_POST['user'];

			$dateExpiration = $_POST['dateexp'];
			$dateDebut = $_POST['datedeb'];


			$this->Deal_Model->addDeal($nom, $description, $conditions, $user, $dateExpiration, $dateDebut);
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

		if ($this->form_validation->run() == FALSE)
		{
			header('Location: '.base_url('pages/updateDeal/'.$id));
		}

		else
		{
			$nom = $_POST['nom'];
			$descrition = $_POST['description'];
			$conditions = $_POST['conditions'];
			$dateExpiration = $_POST['dateexp'];
			$dateDebut = $_POST['datedeb'];


			$this->Deal_Model->updateDeal($nom, $descrition, $conditions, $dateExpiration, $dateDebut, $id);
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
		//header('Location: '.base_url('pages/admin'));
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

	public function addComment()
	{
		if(isset($_POST['commentAdd']) AND !empty($_POST['commentAdd'])){
			$comment = $_POST['commentAdd'];
			$dealId = $_POST['dealId'];
			session_start();
			$user = $_SESSION['idUser'];
			session_write_close();
			$this->Comments_Model->addCommentToDeal($comment, $dealId, $user);	
			header('Location: '.base_url('pages/details/'.$dealId));
		}
	}

	public function deleteComment($id)
	{	
		$this->Comments_Model->deleteCommentToDeal($id);
		header('Location: '.base_url('pages/details/'.$_GET['deal']));
	}
}
