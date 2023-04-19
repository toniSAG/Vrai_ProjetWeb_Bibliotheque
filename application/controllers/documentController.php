<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');

class documentController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('documentModel');
        $this->load->view('header');
    }

    public function document(){
        $data = array();
        $data['livre_bibliotheque'] = $this->documentModel->print_Livre();
        $data['BD_bibliotheque'] = $this->documentModel->print_BD();
        $this->load->view('document', $data);
    }
}
?>