<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class empruntModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('security');
    }

    public function empruntSave(){

        $idAbonne = $this->input->post('id_abonne_bibliotheque');
     //   $idAbonne = $this->security->xss_clean($idAbonne);
        $idAbonne = $this->db->escape($idAbonne);

        $nomAbonne = $this->input->post('nom_abonne_bibliotheque');
      //  $nomAbonne = $this->security->xss_clean($nomAbonne);
        $nomAbonne = $this->db->escape($nomAbonne);

        $prenomAbonne = $this->input->post('prenom_abonne_bibliotheque');
        $prenomAbonne = $this->security->xss_clean($prenomAbonne);
        $prenomAbonne = $this->db->escape($prenomAbonne);

      /*  $this->db->select($idAbonne);
        $this->db->from('abonne_bibliotheque');
        $this->db->where($nomAbonne = '?', 'AND', $prenomAbonne = '?');*/

        $this->db->select('id_abonne_bibliotheque');
        $this->db->from('abonne_bibliotheque');
        $this->db->where("nom_abonne_bibliotheque = '$nomAbonne' AND prenom_abonne_bibliotheque = '$prenomAbonne'");

        $idEmploye = $this->input->post('id_employe_bibliotheque');
       // $idEmploye = $this->security->xss_clean($idEmploye);
        $idEmploye = $this->db->escape($idEmploye);

        $nomEmploye = $this->input->post('nom_employe_bibliotheque');
        $nomEmploye = $this->security->xss_clean($nomEmploye);
        $nomEmploye = $this->db->escape($nomEmploye);

        $prenomEmploye = $this->input->post('prenom_employe_bibliotheque');
        $prenomEmploye = $this->security->xss_clean($prenomEmploye);
        $prenomEmploye = $this->db->escape($prenomEmploye);

        $this->db->select('id_employe_bibliotheque');
        $this->db->from('employe_bibliotheque');
        $this->db->where("nom_employe_bibliotheque = '$nomEmploye' AND prenom_employe_bibliotheque = '$prenomEmploye'");

        $ISBN = $this->input->post('ISBN_document');
       // $ISBN = $this->security->xss_clean($ISBN);
        $ISBN = $this->db->escape($ISBN);

        $titre = $this->input->post('titre_document');
        $titre = $this->security->xss_clean($titre);
        $titre = $this->db->escape($titre);

        $this->db->select('ISBN_document');
        $this->db->from('document_bibliotheque');
        $this->db->where("titre_document = '$titre'");

        $dateEmprunt = $this->input->post('date_emprunt');
        $dateEmprunt = $this->security->xss_clean($dateEmprunt);
        $dateEmprunt = $this->db->escape($dateEmprunt);

        $dateRetour = $this->input->post('date_retour');
        $dateRetour = $this->security->xss_clean($dateRetour);
        $dateRetour = $this->db->escape($dateRetour);

        $data = array(
            'date_emprunt' => $dateEmprunt,
            'date_retour' => $dateRetour,
            'id_abonne_bibliotheque' => $idAbonne,
            'id_employe_bibliotheque' => $idEmploye,
            'ISBN_document' => $ISBN
        );

        $this->db->insert('emprunt', $data);
    }



public function print_emprunt(){
    $this->db->select('abonne_bibliotheque.nom_abonne_bibliotheque, abonne_bibliotheque.prenom_abonne_bibliotheque,
    employe_bibliotheque.nom_employe_bibliotheque, employe_bibliotheque.prenom_employe_bibliotheque, document_bibliotheque.titre_document,
    emprunt.ISBN_document, emprunt.date_emprunt, emprunt.date_retour');
    $this->db->from('emprunt');
    $this->db->join('abonne_bibliotheque', 'emprunt.id_abonne_bibliotheque = abonne_bibliotheque.id_abonne_bibliotheque');
    $this->db->join('employe_bibliotheque', 'emprunt.id_employe_bibliotheque = employe_bibliotheque.id_employe_bibliotheque');
    $this->db->join('document_bibliotheque', 'emprunt.ISBN_document = document_bibliotheque.ISBN_document');
    $this->db->order_by('emprunt.id_emprunt');
    $query = $this->db->get();
    return $query->result_array();
}

}
?>