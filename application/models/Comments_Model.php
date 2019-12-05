<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class comments_Model extends CI_Model{

    public function searchByid($id)
    {
        $contenucomments = $_POST['contenuComments'];
        $deal_id = $_POST['deal_id'];
        $user_id = $_SESSION['user_id'];
        return  $this->db->query('SELECT user_id FROM user WHERE pseudo = 'pseudo''->result();
    }

    public function searchDeal()
    {
        return  $this->db->query('INSERT INTO comments(CONTENUCOMMENTS, DEAL_ID, USER_ID) VALUES(:contenuComments, :deal_id, :user_id')->result();
    }
}