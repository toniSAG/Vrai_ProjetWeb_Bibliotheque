<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mainController extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        //require 'abonneController';
        //$this->load->database();
    }
    public function acceuil(){
        $this->load->helper('url');

       /* $lien_emprunt = base_url('emprunt');
        $lien_document = base_url('document');
        $lien_abonne = base_url('abonne');


        $emprunt = base_url('AcceuilBibliotheque/emprunt');
        $document = base_url('AcceuilBibliotheque/document');
        $abonne = base_url('AcceuilBibliotheque/abonne');

        echo "Emprunt: $emprunt<br>";
        echo "Document: $document<br>";
        echo "Abonne: $abonne<br>";

        $data = array(
            'emprunt' => $emprunt,
            'document' => $document,
            'abonne' => $abonne
        );*/

    $this->load->view('acceuil');


  /*  $this->load->view('emprunt');
    $this->load->view('document');
    $this->load->view('abonne');*/
    }

    public function emprunt(){
        $this->load->view('emprunt');
    }

    public function document(){
        $this->load->view('document');
    }

    public function abonne(){
        
        $this->load->view('abonne');
    }
}
?>