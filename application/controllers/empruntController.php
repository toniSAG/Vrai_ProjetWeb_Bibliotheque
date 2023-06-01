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

        $this->empruntModel->getIDAbonne();
        $this->empruntModel->getIDEmploye();
        $this->empruntModel->getISBN();

        $date_emprunt = $this->input->post('date_emprunt');
        $date_retour = $this->input->post('date_retour');


        $id_abonne = $this->input->post('id_abonne');
        $id_employe = $this->input->post('id_employe');
        $ISBN = $this->input->post('ISBN');

        $data = array(
            'date_emprunt' => $date_emprunt,
            'date_retour' => $date_retour,
            'id_abonne_bibliotheque' => $id_abonne,
            'id_employe_bibliotheque' => $id_employe,
            'ISBN_document' => $ISBN
        );

        $this->db->insert('emprunt', $data);

                redirect('EmpruntController/emprunt');
            
        }

        public function deleteEmprunt($id){
            $this->load->empruntModel->retourDoc($id);
            redirect('EmpruntController/emprunt');
        }
    

    public function emprunt(){
        $data = array();
        $data['abonnes'] = $this->empruntModel->getAbonne();
        $data['employes'] = $this->empruntModel->getEmploye();
        $data['documents'] = $this->empruntModel->getTitre();

        $data['emprunt'] = $this->empruntModel->print_emprunt();
        $this->load->view('emprunt', $data);
    }
}
?>