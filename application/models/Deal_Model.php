<?php
// Fichier de gestion des requetes SQL intervenants sur la table deal
defined('BASEPATH') OR exit('No direct script access allowed');


class Deal_Model extends CI_Model
{
	/*
	 * Rechcerche d'un deal par son id
	 * Retourne un deal sous la forme deal[[]]
	 */
	public function searchByid($id)
	{
		return  $this->db->query('SELECT * FROM deals WHERE deal_id = '.$id)->result();
	}

	/*
	 * Recherche de tous les deals posté
	 */
	public function searchDealPosted()
	{
		return  $this->db->query('SELECT * FROM deals WHERE posted')->result();
	}

	/*
	 * Recherche des deals selon les critères de filtres
	 */
	public function searchDealByResearch($search, $dateS, $dateE)
	{
		$where = '';
		$research = '';
		if(isset($search) AND !empty($search)){
			//$where .= "description REGEXP '";
			$research .= "'";
			foreach ($search as $key => $value) {
				if($key != 0){
					$research .= '|';
				}
				$research .= $value;
			}
			$research .= "' ";
			$where .= " CONCAT(description, nom, conditions) REGEXP ".$research." ";
		}

		if(isset($dateS) AND !empty($dateS)){
			if(isset($search) AND !empty($search)){
				$where .= ' AND ';
			}
			$where .= "date_ajout >= '". $dateS ."'";
		}

		if(isset($dateE) AND !empty($dateE)){
			if( (isset($search) AND !empty($search)) OR (isset($dateS) AND !empty($dateS)) ){
				$where .= ' AND ';
			}
			$where .= "date_ajout <= '". $dateE ."'";
		}

		if(empty($search) AND empty($dateE) AND empty($dateS)){
			$where = 1;
		}
		return  $this->db->query('SELECT * FROM deals WHERE posted AND '. $where)->result();
	
	}

	/*
	 * Recherche de tous les deals
	 */
	public function searchDeal()
	{
		return  $this->db->query('SELECT * FROM deals')->result();
	}

	/*
	 * Ajout d'un deal en base
	 */
	public function addDeal($nom, $des, $cond, $usr ,$ddeb, $dexp)
	{
		$this->db->query('INSERT INTO deals (nom, description, conditions,user_id, date_exp, date_deb) 
		VALUES ("'.$nom.'","'. $des .'", "'.$cond.'", '.$usr.', "'.$ddeb.'", "'.$dexp.'")');
	}

	/*
	 * Mise a jour du deal correspondant à l'$id en base
	 */
	public function updateDeal($nom, $des, $cond ,$ddeb, $dexp, $id)
	{
		$this->db->query('UPDATE deals SET nom = "'.$nom.'", description = "'. $des .'", conditions =  "'.$cond.'", date_exp =  "'.$dexp.'", date_deb = "'.$ddeb.'"
		WHERE deal_id ='.$id);
	}

	/*
	 * recherche des deal d'un utilisateur en fonction de son $id
	 */
	public function showUsersDeal($id)
	{
		return $this->db->query('SELECT * FROM deals WHERE user_id = '. $id)->result();
	}

	/*
	 * Suppression du deal d'$id
	 */
	public function deleteDeal($id)
	{
		$this->db->query('DELETE FROM deals WHERE deal_id = '.$id);
	}

	/*
	 * Passage du deal en mode publié
	 */
	public function enableDeal($id)
	{
		$this->db->query('UPDATE deals SET posted = 1 WHERE deal_id='.$id);
	}

	/*
	 * passage du deal en mode non publié
	 */
	public function disableDeal($id)
	{
		$this->db->query('UPDATE deals SET posted = 0 WHERE deal_id='.$id);
	}
}
