<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');

class documentController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->database();
        $this->load->model('documentModel');
        $data['active_page'] = 'document';
        $this->load->view('header', $data);
    }

    public function enregistrerCreateur(){
        $this->documentModel->selectTypeCreateur();

        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $type_createur = $this->input->post('type_createur');

        $data = array(
            'nom_createur_bibliotheque' => $nom,
            'prenom_createur_bibliotheque' =>$prenom,
            'id_type_createur' => $type_createur
        );

        $this->db->insert('createur_bibliotheque', $data);

        redirect('documentController/document');
    }

    public function enregistrerLivre(){
        $this->documentModel->getIDLivre();
        //$this->documentModel->createurLivre();
        $this->documentModel->getISBN();
        $this->documentModel->getIDAuteur();

        $ISBN = $this->input->post('ISBN');
        
        $titre = $this->input->post('titre');
        
        $date = $this->input->post('date');
        $type_document = $this->input->post('type_document');

        $data = array(
            'ISBN_document' => $ISBN,
            'titre_document' => $titre,
            'date_parrution_document' => $date,
            'id_type_document' => $type_document
        );
        

        $this->db->insert('document_bibliotheque', $data);



        $ISBN = $this->input->post('ISBN');
        $id_auteur = $this->input->post('id_auteur');
        

        $data = array(
            'ISBN_document' => $ISBN,
            'id_createur_bibliotheque_auteur' => $id_auteur
        );

        $this->db->insert('createur_document_bibliotheque', $data);

        redirect('documentController/document');
    }

    

    public function enregistrerBD(){
        $this->documentModel->enregistrerBD();
        $this->documentModel->createurBD();
        $this->documentModel->getISBN();
        $this->documentModel->getIDAuteur();

        $ISBN = $this->input->post('ISBN');
        
        $titre = $this->input->post('titre');
        
        $date = $this->input->post('date');
        $type_document = $this->input->post('type_document');

        $data = array(
            'ISBN_document' => $ISBN,
            'titre_document' => $titre,
            'date_parrution_document' => $date,
            'id_type_document' => $type_document
        );
        

        $this->db->insert('document_bibliotheque', $data);



        $ISBN = $this->input->post('ISBN');
        $id_auteur = $this->input->post('id_auteur');
        $id_dessinateur = $this->input->post('id_dessinateur');
        

        $data = array(
            'ISBN_document' => $ISBN,
            'id_createur_bibliotheque_auteur' => $id_auteur
        );

        $this->db->insert('createur_document_bibliotheque', $data);

        $data = array(
            'ISBN_document' => $ISBN,
            'id_createur_bibliotheque_dessinateur' => $id_dessinateur
        );

        $this->db->insert('dessinateur_document_bibliotheque', $data);

        redirect('documentController/document');
    

    }

    public function document(){
        $data = array();
        $data['types_createur'] = $this->documentModel->selectTypeCreateur();
        $data['auteurs'] = $this->documentModel->selectAuteur();
        $data['dessinateurs'] = $this->documentModel->selectDessinateur();
        
        $data['livre_bibliotheque'] = $this->documentModel->print_Livre();
        $data['BD_bibliotheque'] = $this->documentModel->print_BD();
      /*  var_dump($this->documentModel->selectAuteur());
        exit;*/
        $this->load->view('document', $data);
    }
}
?>