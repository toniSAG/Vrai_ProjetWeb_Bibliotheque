<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class documentModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('security');
    }



    public function enregistrerLivre(){

        $type_document = $this->input->post('id_type_document');
      //  $type_document = $this->security->xss_clean($type_document);
        $type_document = $this->db->escape($type_document);

        $libelle_document = $this->input->post('libelle_type_document');
        //$libelle_document = $this->security->xss_clean($libelle_document);
        $libelle_document = $this->db->escape($libelle_document);

        $this->db->select($type_document);
        $this->db->from('type_document_bibliotheque');
        $this->db->where($libelle_document == 'livre');

      /*  $this->db->select('id_type_document');
        $this->db->from('type_document_bibliotheque');*/

        $ISBN = $this->input->post('ISBN_document');
        $titre = $this->input->post('titre_document');
        $date = $this->input->post('date_parrution_document');
        $type_document = $this->input->post('id_type_document');

        $data = array(
            'ISBN_document' => $this->db->escape_str($ISBN),
            'titre_document' => $this->db->escape_str($titre),
            'date_parrution_document' => $this->db->escape_str($date),
            'id_type_document' => $this->db->escape_str($type_document)
        );

        $this->db->insert('document_bibliotheque', $data);

    }

    public function createurLivre(){

        $type_createur = $this->input->post('id_type_createur');
       // $type_createur = $this->security->xss_clean($type_createur);
        $type_createur = $this->db->escape($type_createur);

        $libelle_createur = $this->input->post('libelle_type_createur');
      //  $libelle_createur = $this->security->xss_clean($libelle_createur);
        $libelle_createur = $this->db->escape($libelle_createur);

        $this->db->select($type_createur);
        $this->db->from('type_createur');
        $this->db->where($libelle_createur == 'auteur');

        $nom_createur = $this->input->post('nom_createur_bibliotheque');
        $prenom_createur = $this->input->post('prenom_createur_bibliotheque');

        $data = array(
            'nom_createur_bibliotheque' => $this->db->escape_str($nom_createur),
            'prenom_createur_bibliotheque' => $this->db->escape_str($prenom_createur),
            'id_type_createur' => $this->db->escape_str($type_createur),
        );

        $this->db->insert('createur_bibliotheque', $data);
    }

    public function joinCreaLivre(){

        $ISBN = $this->input->post('ISBN_document');
       // $ISBN = $this->security->xss_clean($ISBN);
        $ISBN = $this->db->escape($ISBN);

        $titre = $this->input->post('titre_document');
      //  $titre = $this->security->xss_clean($titre);
        $titre = $this->db->escape($titre);

        $id_createur = $this->input->post('id_createur_bibliotheque');
      //  $id_createur = $this->security->xss_clean($id_createur);
        $id_createur = $this->db->escape($id_createur);

        $nom_createur = $this->input->post('nom_createur_bibliotheque');
      //  $nom_createur = $this->security->xss_clean($nom_createur);
        $nom_createur = $this->db->escape($nom_createur);

        $prenom_createur = $this->input->post('prenom_createur_bibliotheque');
      //  $prenom_createur = $this->security->xss_clean($prenom_createur);
        $prenom_createur = $this->db->escape($prenom_createur);

        $this->db->select($ISBN);
        $this->db->from('document_bibliotheque');
        $this->db->where($titre == '?');

        $this->db->select($id_createur);
        $this->db->from('createur_bibliotheque');
        $this->db->where($nom_createur == '?', 'AND', $prenom_createur == '?');

        $data = array(
            'ISBN_document' => $this->db->escape_str($ISBN),
            'id_createur_bibliothheque_auteur' => $this->db->escape_str($id_createur)
        );

        $this->db->insert('createur_document_bibliotheque', $data);

    }

    public function enregistrerBD(){
        $type_document = $this->input->post('id_type_document');
      //  $type_document = $this->security->xss_clean($type_document);
        $type_document = $this->db->escape($type_document);

        $libelle_document = $this->input->post('libelle_type_document');
     //   $libelle_document = $this->security->xss_clean($libelle_document);
        $libelle_document = $this->db->escape($libelle_document);

        $this->db->select($type_document);
        $this->db->from('type_document_bibliotheque');
        $this->db->where($libelle_document = 'Bande dessinée');

        $ISBN = $this->input->post('ISBN_document');
        $titre = $this->input->post('titre_document');
        $date = $this->input->post('date_parrution_document');

        $data = array(
            'ISBN_document' => $this->db->escape_str($ISBN),
            'titre_document' => $this->db->escape_str($titre),
            'date_parrution_document' => $this->db->escape_str($date),
            'id_type_document' => $this->db->escape_str($type_document)
        );

        $this->db->insert('document_bibliotheque', $data);
    }

    public function createurBD(){

        $type_createur = $this->input->post('id_type_createur');
        $type_createur = $this->security->xss_clean($type_createur);
        $type_createur = $this->db->escape($type_createur);

        $type_createur2 = $this->input->post('id_type_createur');
        $type_createur2 = $this->security->xss_clean($type_createur);
        $type_createur2 = $this->db->escape($type_createur);

        $libelle_createur = $this->input->post('libelle_type_createur');
        $libelle_createur = $this->security->xss_clean($libelle_createur);
        $libelle_createur = $this->db->escape($libelle_createur);

        $this->db->select($type_createur);
        $this->db->from('type_createur');
        $this->db->where($libelle_createur = 'auteur');

        $this->db->select($type_createur2);
        $this->db->from('type_createur');
        $this->db->where($libelle_createur = 'dessinateur');

        $nom_createur = $this->input->post('nom_createur_bibliotheque');
        $prenom_createur = $this->input->post('prenom_createur_bibliotheque');

        $data = array(
            'nom_createur_bibliotheque' => $this->db->escape_str($nom_createur),
            'prenom_createur_bibliotheque' => $this->db->escape_str($prenom_createur),
            'id_type_createur' => $this->db->escape_str($type_createur),
        );

        $data = array(
            'nom_createur_bibliotheque' => $this->db->escape_str($nom_createur),
            'prenom_createur_bibliotheque' => $this->db->escape_str($prenom_createur),
            'id_type_createur' => $this->db->escape_str($type_createur2),
        );

        $this->db->insert('createur_bibliotheque', $data);
    }

    public function joinCreaBD(){

        
    }



/******************************************************************************************************************************************************************* */

//Requête SQL qui permet d'afficher les documents par ISBN, titre, date de parrution, type, nom et prénom de créateur et type de document

    public function print_Livre(){
        $this->db->select('*');
        $this->db->from('document_bibliotheque');
        $this->db->join('createur_document_bibliotheque', 'document_bibliotheque.ISBN_document = createur_document_bibliotheque.ISBN_document');
        $this->db->join('type_document_bibliotheque', 'document_bibliotheque.id_type_document = type_document_bibliotheque.id_type_document');
        $this->db->join('createur_bibliotheque', 'createur_document_bibliotheque.id_createur_bibliotheque_auteur = createur_bibliotheque.id_createur_bibliotheque');
        $this->db->join('type_createur', 'createur_bibliotheque.id_type_createur = type_createur.id_type_createur');
        $this->db->where('type_document_bibliotheque.id_type_document = 1');
        $this->db->order_by('document_bibliotheque.id_type_document', 'document_bibliotheque.date_parrution_document', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function print_BD(){
        $this->db->select('document_bibliotheque.ISBN_document, document_bibliotheque.titre_document,
        document_bibliotheque.date_parrution_document,
        auteur.nom_createur_bibliotheque AS nom_auteur, auteur.prenom_createur_bibliotheque AS prenom_auteur,
        dessinateur.nom_createur_bibliotheque AS nom_dessinateur, dessinateur.prenom_createur_bibliotheque AS prenom_dessinateur,
        type_createur.libelle_type_createur');
        $this->db->from('document_bibliotheque');
        $this->db->join('createur_document_bibliotheque', 'document_bibliotheque.ISBN_document = createur_document_bibliotheque.ISBN_document');
        $this->db->join('dessinateur_document_bibliotheque', 'document_bibliotheque.ISBN_document = dessinateur_document_bibliotheque.ISBN_document', 'left');
        $this->db->join('type_document_bibliotheque', 'document_bibliotheque.id_type_document = type_document_bibliotheque.id_type_document');
        $this->db->join('createur_bibliotheque AS auteur', 'createur_document_bibliotheque.id_createur_bibliotheque_auteur = auteur.id_createur_bibliotheque');
        $this->db->join('type_createur', 'auteur.id_type_createur = type_createur.id_type_createur');
        $this->db->join('createur_bibliotheque AS dessinateur', 'dessinateur_document_bibliotheque.id_createur_bibliotheque_dessinateur = dessinateur.id_createur_bibliotheque', 'left');
        $this->db->where('type_document_bibliotheque.id_type_document = 2');
        $this->db->order_by('document_bibliotheque.id_type_document, document_bibliotheque.date_parrution_document', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>