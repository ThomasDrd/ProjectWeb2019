<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class comments_Model extends CI_Model
{

    public function searchByDeal($id)
    {
        return  $this->db->query('SELECT `pseudo`, `comment`, `date`, `comment_id` FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE deal_id = '.$id)->result();
    }

    public function addCommentToDeal($comment, $dealId, $user)
    {
        $this->db->query('INSERT INTO comments (comment, deal_id, user_id) VALUES ("'.$comment.'","'.$dealId.'","'.$user.'")');
    }

    public function deleteCommentToDeal($id)
    {
        $this->db->query('DELETE FROM comments WHERE comment_id = '.$id);
    }
}
