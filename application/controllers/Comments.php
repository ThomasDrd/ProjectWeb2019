<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Comments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Comments_Model');
    }


    public function create()
    {
        $this->load->view('createComments');
    }

    public function update($id)
    {
        $select['comments'] = $this->Comments_Model->searchByid($id);
        $this->load->view('updateComments', $select);
    }
}
