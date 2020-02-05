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
		$this->config->set_item('language', 'french');
	}


	########################### Execution de methodes du model pour ecriture en bd ###########################

	/*
	 * Execution création d'un deal
	 */
	public function dealcreate()
	{
		$this->form_validation->set_rules('nom', 'Nom', 'required|max_length[50]');
		$this->form_validation->set_rules('description','Description', 'max_length[255]');
		$this->form_validation->set_rules('conditions','Conditions', 'max_length[50]');

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
			header('Location: '.base_url('pages/myDeals'));
		}
	}


	/*
	 * Execution modification d'un deal
	 * Param : $id => id du deal
	 */
	public function dealUpdate($id)
	{
		$this->form_validation->set_rules('nom', 'Nom', 'required|max_length[50]');
		$this->form_validation->set_rules('description','Description', 'max_length[255]');
		$this->form_validation->set_rules('conditions','Conditions', 'max_length[50]');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'deal' => $this->Deal_Model->searchByid($id),
				'message_display' => validation_errors()
			);

				$this->load->view('updateDeal', $data);
		}

		else
		{
			$nom = $_POST['nom'];
			$descrition = $_POST['description'];
			$conditions = $_POST['conditions'];
			$dateExpiration = $_POST['dateexp'];
			$dateDebut = $_POST['datedeb'];


			$this->Deal_Model->updateDeal($nom, $descrition, $conditions, $dateExpiration, $dateDebut, $id);
			header('Location: '.base_url('pages/myDeals'));
		}
	}


	/*
	 * Execution suppression d'un deal
	 * Param : $id
	 */
	public function dealDelete($id)
	{
		$comments = $this->Comments_Model->searchByDeal($id);
		foreach ($comments as $com)
		{
			$this->Comments_Model->deleteCommentToDeal($com->comment_id);
		}

		$this->Deal_Model->deleteDeal($id);
		header('Location: '.base_url('pages/myDeals'));
	}


	/*
	 * Execution mise en ligne d'un deal (visible des utilisateurs)
	 * Param : $id => id du deal
	 */
	public function dealEnable($id)
	{
		$this->Deal_Model->enableDeal($id);
		header('Location: '.base_url('pages/modo'));
	}

	/*
	 * Exectuion mise hors ligne du deal
	 * Param : $id => id du deal
	 */
	public function dealDisable($id)
	{
		$this->Deal_Model->disableDeal($id);
		header('Location: '.base_url('pages/modo'));
	}

	/*
	 * Méthode gérant l'ajout de commentaire sur un deal
	 * Param : $id => id du deal
	 */
	public function addComment($id)
	{

		$dealId = $_POST['dealId'];

		$this->form_validation->set_rules('commentAdd','Commentaire', 'required|max_length[255]');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'deal' => $this->Deal_Model->searchByid($id),
				'comments' => $this->Comments_Model->searchByDeal($id),
				'message_display' => validation_errors() );

			$this->load->view('details', $data);
		}

		else
		{
			$comment = $_POST['commentAdd'];
			$dealId = $_POST['dealId'];
			session_start();
			$user = $_SESSION['idUser'];
			session_write_close();
			$this->Comments_Model->addCommentToDeal($comment, $dealId, $user);
			header('Location: '.base_url('pages/details/'.$dealId));

		}
	}

	/*
	 * Méthode de suppression d'un commentaire
	 * Param : $id => id du commentaire
	 */
	public function deleteComment($id)
	{	
		$this->Comments_Model->deleteCommentToDeal($id);
		header('Location: '.base_url('pages/details/'.$_GET['deal']));
	}
}
