<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal_Model extends CI_Model
{
	public function searchByid($id)
	{
		return  $this->db->query('SELECT * FROM deals WHERE deal_id = '.$id)->result();
	}

	public function searchDealPosted()
	{
		return  $this->db->query('SELECT * FROM deals WHERE posted')->result();
	}


	public function searchDeal()
	{
		return  $this->db->query('SELECT * FROM deals')->result();
	}

	public function addDeal($nom, $des, $cond, $usr ,$ddeb, $dexp)
	{
		$this->db->query('INSERT INTO deals (nom, description, conditions,user_id, date_exp, date_deb) 
		VALUES ("'.$nom.'","'. $des .'", "'.$cond.'", '.$usr.', "'.$ddeb.'", "'.$dexp.'")');
	}

	public function updateDeal($nom, $des, $cond, $usr ,$ddeb, $dexp, $id)
	{
		$this->db->query('UPDATE deals SET nom = "'.$nom.'", description = "'. $des .'", conditions =  "'.$cond.'",user_id = '.$usr.' , date_exp =  "'.$dexp.'", date_deb = "'.$ddeb.'"
		WHERE deal_id ='.$id);
	}

	public function showUsersDeal($id)
	{
		return $this->db->query('SELECT * FROM deals WHERE user_id = '. $id)->result();
	}

	public function deleteDeal($id)
	{
		$this->db->query('DELETE FROM deals WHERE deal_id = '.$id);
	}

	public function enableDeal($id)
	{
		$this->db->query('UPDATE deals SET posted = 1 WHERE deal_id='.$id);
	}

	public function disableDeal($id)
	{
		$this->db->query('UPDATE deals SET posted = 0 WHERE deal_id='.$id);
	}
}
