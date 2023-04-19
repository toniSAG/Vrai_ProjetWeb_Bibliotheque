<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class documentModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    
    public function enregistrerLivre(){
        $ISBN = $this->input->post('ISBN_document_bibliotheque');
        $id_createur = $this->input->post('id_createur_bibliotheque');
        $type_document = $this->input->post('id_type_document');
        $type_createur  = $this->input->post('id_type_createur');
        $titre = $this->input->post('titre_document_bibliotheque');
        $date = $this->input->post('date_parrution_document');
        $libelle_document = $this->input->post('libelle_type_document');
        $nom_createur = $this->input->post('nom_createur_bibliotheque');
        $prenom_createur = $this->input->post('prenom_createur_bibliotheque');
        $libelle_createur = $this->input->post('libelle_type_createur');


        $data = array(
            'ISBN_document_bibliotheque' => $this->db->escape_str($ISBN),
            'titre_document_bibliotheque' => $this->db->escape_str($titre),
            'date_parrution_document' => $this->db->escape_str($date),
            'libelle_type_document' => $this->db->escape_str($libelle_document),
            'nom_createur_bibliotheque' => $this->db->escape_str($nom_createur),
            'prenom_createur_bibliotheque' => $this->db->escape_str($prenom_createur),
            'libelle_type_createur' => $this->db->escape_str($libelle_createur)
        );

        $this->db->insert('document_bibliotheque', $data);

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

   /* $queryPrintBD = "SELECT document_bibliotheque.ISBN_document, document_bibliotheque.titre_document,
    document_bibliotheque.date_parrution_document,
    auteur.nom_createur_bibliotheque AS nom_auteur, auteur.prenom_createur_bibliotheque AS prenom_auteur,
    dessinateur.nom_createur_bibliotheque AS nom_dessinateur, dessinateur.prenom_createur_bibliotheque AS prenom_dessinateur,
    type_createur.libelle_type_createur
    FROM document_bibliotheque
    JOIN createur_document_bibliotheque
    ON document_bibliotheque.ISBN_document = createur_document_bibliotheque.ISBN_document
    LEFT JOIN dessinateur_document_bibliotheque
    ON document_bibliotheque.ISBN_document = dessinateur_document_bibliotheque.ISBN_document
    JOIN type_document_bibliotheque
    ON document_bibliotheque.id_type_document = type_document_bibliotheque.id_type_document
    JOIN createur_bibliotheque AS auteur
    ON createur_document_bibliotheque.id_createur_bibliotheque_auteur = auteur.id_createur_bibliotheque
    JOIN type_createur
    ON auteur.id_type_createur = type_createur.id_type_createur
    LEFT JOIN createur_bibliotheque AS dessinateur
    ON dessinateur_document_bibliotheque.id_createur_bibliotheque_dessinateur = dessinateur.id_createur_bibliotheque
    WHERE type_document_bibliotheque.id_type_document = 2
    ORDER BY document_bibliotheque.id_type_document, document_bibliotheque.date_parrution_document ASC";
    $listBD = $pdo->query($queryPrintBD);*/

    public function print_BD(){
        $this->db->select('document_bibliotheque.ISBN_document, document_bibliotheque.titre_document,
        document_bibliotheque.date_parrution_document,
        auteur.nom_createur_bibliotheque AS nom_auteur, auteur.prenom_createur_bibliotheque AS prenom_auteur,
        dessinateur.nom_createur_bibliotheque AS nom_dessinateur, dessinateur.prenom_createur_bibliotheque AS prenom_dessinateur,
        type_createur.libelle_type_createur');
        $this->db->from('document_bibliotheque');
        $this->db->join('createur_document_bibliotheque', 'document_bibliotheque.ISBN_document = createur_document_bibliotheque.ISBN_document');
        $this->db->join('dessinateur_document_bibliotheque', 'document_bibliotheque.ISBN_document = dessinateur_document_bibliotheque.ISBN_document');
        $this->db->join('type_document_bibliotheque', 'document_bibliotheque.id_type_document = type_document_bibliotheque.id_type_document');
        $this->db->join('createur_bibliotheque AS auteur', 'createur_document_bibliotheque.id_createur_bibliotheque_auteur = auteur.id_createur_bibliotheque');
        $this->db->join('type_createur', 'auteur.id_type_createur = type_createur.id_type_createur');
        $this->db->join('createur_bibliotheque AS dessinateur', 'dessinateur_document_bibliotheque.id_createur_bibliotheque_dessinateur = dessinateur.id_createur_bibliotheque');
        $this->db->where('type_document_bibliotheque.id_type_document = 2');
        $this->db->order_by('document_bibliotheque.id_type_document', 'document_bibliotheque.date_parrution_document', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //$pdo = null;

}

?>