<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');

class EmpruntController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('empruntModel');
        $this->load->view('header');
        
    }

    public function enregistrerEmprunt(){
        if($this->input->post('enregistrer')){
            $dateEmprunt = $this->input->post('date_emprunt');
            $dateRetour = $this->input->post('date_retour');
            $nomAbonne = $this->input->post('nom_abonne_bibliotheque');
            $prenomAbonne = $this->input->post('prenom_abonne_bibliotheque');
            $nomEmploye = $this->input->post('nom_employe_bibliotheque');
            $prenomEmploye = $this->input->post('prenom_employe_bibliotheque');
            $titre = $this->input->post('titre_document');

            if(isset($this->empruntModel)){
                

                $this->empruntModel->empruntSave($dateEmprunt, $dateRetour, $nomAbonne, $prenomAbonne, $nomEmploye, $prenomEmploye, $titre);

                redirect('EmpruntController/emprunt');
            }
        }
    }

    public function emprunt(){
        $data = array();
        $data['emprunt'] = $this->empruntModel->print_emprunt();
        $this->load->view('emprunt', $data);
    }
}
?>