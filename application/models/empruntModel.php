<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class empruntModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('security');
    }

    public function getIDAbonne(){

        $prenom_abonne_bibliotheque = '?';
        $nom_abonne_bibliotheque = '?';

        $query = $this->db->select('id_abonne_bibliotheque')
                          ->from('abonne_bibliotheque')
                          ->where('prenom_abonne_bibliotheque', $prenom_abonne_bibliotheque)
                          ->where('nom_abonne_bibliotheque', $nom_abonne_bibliotheque)
                          ->get();
        
                          if($query->num_rows() > 0){
                            $row = $query->row();
                            return $row->id_abonne_bibliotheque;
                          }
    }

    public function getIDEmploye(){

        $prenom_employe_bibliotheque = '?';
        $nom_employe_bibliotheque = '?';

        $query = $this->db->select('id_employe_bibliotheque')
                          ->from('employe_bibliotheque')
                          ->where('prenom_employe_bibliotheque', $prenom_employe_bibliotheque)
                          ->where('nom_employe_bibliotheque', $nom_employe_bibliotheque)
                          ->get();
        
                          if($query->num_rows() > 0){
                            $row = $query->row();
                            return $row->id_employe_bibliotheque;
                          }
                          
    }

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

    public function getAbonne(){

        $query = $this->db->select('id_abonne_bibliotheque, nom_abonne_bibliotheque, prenom_abonne_bibliotheque')
                 ->from('abonne_bibliotheque')
                 ->get();
                 if($query->num_rows() > 0){
                    $result = $query->result_array();
                    return $result;
                  }
    }

    public function getEmploye(){

        $query = $this->db->select('id_employe_bibliotheque, nom_employe_bibliotheque, prenom_employe_bibliotheque')
                 ->from('employe_bibliotheque')
                 ->where('id_fonction_employe', 3)
                 ->get();
                 if($query->num_rows() > 0){
                    $result = $query->result_array();
                    return $result;
                  }
    }

    public function getTitre(){

        $query = $this->db->select('ISBN_document, titre_document')
        ->from('document_bibliotheque')
        ->get();
        if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
         }
        
    }


    public function retourDoc($id){
      $this->db->where('id_emprunt', $id);
    $this->db->delete('emprunt');


    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
    }

public function print_emprunt(){
    $this->db->select('abonne_bibliotheque.nom_abonne_bibliotheque, abonne_bibliotheque.prenom_abonne_bibliotheque,
    employe_bibliotheque.nom_employe_bibliotheque, employe_bibliotheque.prenom_employe_bibliotheque, document_bibliotheque.titre_document, emprunt.id_emprunt,
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