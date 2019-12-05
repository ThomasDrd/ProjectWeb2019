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

	public function addDeal($nom, $des, $cond, $usr, $img ,$ddeb, $dexp)
	{
		$this->db->query('INSERT INTO deals (nom, description, conditions,user_id, img, date_exp, date_deb) 
		VALUES ("'.$nom.'","'. $des .'", "'.$cond.'", '.$usr.',"'.$img.'", "'.$ddeb.'", "'.$dexp.'")');
	}


	public function deleteDeal($id)
	{
		$this->db->query('DELETE FROM deals WHERE deal_id = '. $id);
	}
}
