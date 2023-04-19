<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');

class empruntController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('empruntModel');
        $this->load->view('header');
        
    }

    public function emprunt(){
        $this->load->view('emprunt');
    }
}
?>