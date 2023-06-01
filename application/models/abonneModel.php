<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class abonneModel extends CI_Model{

   

    public function __construct(){
        parent::__construct();
    }

    /*
code pour ajouter les abonnés
*/

    public function enregistrer_abonne(){
        $nom = $this->input->post('nom_abonne_bibliotheque');
        $prenom = $this->input->post('prenom_abonne_bibliotheque');
        $email = $this->input->post('mail_abonne_bibliotheque');

        $data = array(
            'nom_abonne_bibliotheque' => $this->db->escape_str($nom),
            'prenom_abonne_bibliotheque' => $this->db->escape_str($prenom),
            'mail_abonne_bibliotheque' => $this->db->escape_str($email)
        );

        $this->db->insert('abonne_bibliotheque', $data);
    }

/*
*Code PHP et requêtes SQL
*Pour la supression d'abonnés
*existants dans la BDD 
*/
public function supprimer_abonne($id){
    $this->db->where('id_abonne_bibliotheque', $id);
    $this->db->delete('abonne_bibliotheque');


    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}



public function print_abonne(){

$query = $this->db->get('abonne_bibliotheque');
return  $query->result_array();

}

}
?>