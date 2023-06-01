<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class documentModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('security');
    }


    //selection du type de createur pour la base de donnée
    public function selectTypeCreateur(){

        $query = $this->db->select('id_type_createur, libelle_type_createur')
                          ->from('type_createur')
                          ->get();

                          if($query->num_rows() > 0){
                            $result = $query->result_array();
                            return $result;
         
                         }
    }

    //selection du tyoe de document pour la base de données

    public function getIDLivre(){

        $query = $this->db->select('id_type_document')
                          ->from('type_document_bibliotheque')
                          ->where('libelle_type_document', 'livre')
                          ->get();
        
                          if($query->num_rows() > 0){
                            $row = $query->row();
                            return $row->id_type_document;
                          }

    }

    //sélection de 
    /*public function createurLivre(){


        $query = $this->db->select('id_type_createur')
                          ->from('type_createur')
                          ->where('libelle_type_createur', 'auteur')
                          ->get();
        
                          if($query->num_rows() > 0){
                            $row = $query->row();
                            return $row->id_type_createur;
                          }
    }*/

    public function getISBN(){

        $titre_document = '?';

        $query = $this->db->select('ISBN_document')
                      ->from('document_bibliotheque')
                      ->where('titre_document', $titre_document)
                      ->get();

                      if($query->num_rows() > 0){
                        $row = $query->row();
                        return $row->ISBN_document;
    }

}

public function getIDAuteur(){

    $nom_createur_bibliotheque = '?';
    $prenom_createur_bibliotheque = '?';

    $query = $this->db->select('id_createur_bibliotheque')
                  ->from('createur_bibliotheque')
                  ->where('nom_createur_bibliotheque', $nom_createur_bibliotheque)
                  ->where('prenom_createur_bibliotheque', $prenom_createur_bibliotheque)
                  ->get();

                  if($query->num_rows() > 0){
                    $row = $query->row();
                    return $row->id_createur_bibliotheque;
}

}

    public function selectAuteur(){
       $query = $this->db->select('id_createur_bibliotheque, nom_createur_bibliotheque, prenom_createur_bibliotheque')
                 ->from('createur_bibliotheque')
                 ->where('id_type_createur', 1)
                 ->get();
                 if($query->num_rows() > 0){
                    $result = $query->result_array();
                    return $result;
                  }
    }

    public function selectDessinateur(){
        $query = $this->db->select('id_createur_bibliotheque, nom_createur_bibliotheque, prenom_createur_bibliotheque')
                  ->from('createur_bibliotheque')
                  ->where('id_type_createur', 2)
                  ->get();
                  if($query->num_rows() > 0){
                     $result = $query->result_array();
                     return $result;
                   }
     }

    public function enregistrerBD(){

    }

    public function createurBD(){

      
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