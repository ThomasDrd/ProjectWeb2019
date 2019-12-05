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

	public function dealcreate()
	{
		if (!empty($_POST))
		{
			$nom = $_POST['nom'];
			$des = $_POST['description'];
			$cond = $_POST['conditions'];
			$img = $_POST['image'];

			if ( isset($_POST['dateexp']))
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

			$this->Deal_Model->addDeal($nom, $des, $cond, $_SESSION['idUser'] ,$img, $daexp, $dadeb);

		}
	}

	public function update($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('updateDeal', $select);
	}

	public function delete($id)
	{
		$select['deal'] = $this->Deal_Model->searchByid($id);
		$this->load->view('deleteDeal', $select);
	}
}
