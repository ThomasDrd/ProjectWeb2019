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

		/*
		 * Je vérifie chaque variable pour écrire la conditions WHERE au fur et à mesure, pour chaque variable de recherche définie
		 */

		if(isset($search) AND !empty($search)){
			$research .= "'";			
			foreach ($search as $key => $value) {  // $value représente chaque mot qui à été écrit séparé par un espace, il peut y en avoir 1 ou plusieurs.
				if($key != 0){
					$research .= '|';    //Ecrit le caractère de séparation | si il y a plus d'un mot, pour séparer chaque mot de recherche.
				}	
				$research .= $value;	//Ecrit le mot avec lequel on aimerait rechercher les deals.
			}
			$research .= "' ";
			$where .= " CONCAT(description, nom, conditions) REGEXP ".$research." ";  //Concatène la description, le nom et les conditions pour rechercher dans tout ces champs, puis j'utilise la fonction REGEXP pour rechercher tout les mots qui sont stocker dans la variable $research vu précédemment.
		}

		
		if(isset($dateS) AND !empty($dateS)){
			if(isset($search) AND !empty($search)){
					// Si l'utilisateur à utiliser plusieurs paramètre de recherche alors on ajoute un 'AND' pour rajouter cette conditions à la précédente.
				$where .= ' AND ';
			}
			$where .= "date_ajout >= '". $dateS ."'"; //Ajoute la condition de date antérieur à celle de l'ajout du deal.
		}

		if(isset($dateE) AND !empty($dateE)){
			if( (isset($search) AND !empty($search)) OR (isset($dateS) AND !empty($dateS)) ){
				 // Si l'utilisateur à utiliser plusieurs paramètre de recherche alors on ajoute un 'AND' pour rajouter cette conditions à la précédente
				$where .= ' AND ';
			}
			$where .= "date_ajout <= '". $dateE ."'"; //Ajoute la condition de date ultérieur à celle de l'ajout du deal.
		}

		if(empty($search) AND empty($dateE) AND empty($dateS)){
			$where = 1;	//Si toute les variables sont vide alors il n'y a pas de conditions donc j'écris 1 pour chercher tout les deals
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
	 * recherche des deal posté d'un utilisateur en fonction de son $id
	 */
	public function showUsersDealOnline($id)
	{
		return $this->db->query('SELECT * FROM deals WHERE user_id = '. $id .' AND posted LIKE 1')->result();
	}

	/*
	 * recherche des deal non posté d'un utilisateur en fonction de son $id
	 */
	public function showUsersDealOffline($id)
	{
		return $this->db->query('SELECT * FROM deals WHERE user_id = '. $id .' AND posted LIKE 0')->result();
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
