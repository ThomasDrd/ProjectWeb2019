<?php
// Fichier de gestion des requetes SQL intervenants sur la table comments
defined('BASEPATH') OR exit('No direct script access allowed');


class comments_Model extends CI_Model
{

	/*
	 * Recherche des commentaires d'un deal en fonction de l'$id du deal
	 */
    public function searchByDeal($id)
    {
        return  $this->db->query('SELECT `pseudo`, `comment`, `date`, `comment_id`, comments.user_id FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE deal_id = '.$id)->result();
    }

	/*
	 * Recherche des commentaires d'un utilisateurs
	 * Param : $id => id de l'utilisateur
	 */
	public function searchByUser($id)
	{
		return  $this->db->query('SELECT `comment_id` FROM comments JOIN users WHERE comments.user_id = '.$id)->result();
	}

	/*
	 * Ajout d'un commentaire en base
	 */
    public function addCommentToDeal($comment, $dealId, $user)
    {
        $this->db->query('INSERT INTO comments (comment, deal_id, user_id) VALUES ("'.$comment.'","'.$dealId.'","'.$user.'")');
    }

    /*
     * Suppression d'un deal
     * Param : $id => id du commentaire
     */
    public function deleteCommentToDeal($id)
    {
        $this->db->query('DELETE FROM comments WHERE comment_id = '.$id);
    }

    public function deleteAllCommentFromDeal($id)
    {
        $this->db->query('DELETE FROM comments WHERE deal_id = '.$id);
    }
}
 