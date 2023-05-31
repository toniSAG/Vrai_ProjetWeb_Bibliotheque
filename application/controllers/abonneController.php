<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class abonneController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation', 'input');
        $this->load->database();
        $this->load->model('abonneModel');
        $this->load->view('header');
        
    }


     

    public function enregistrerAbonne(){
        if($this->input->post('enregistrer')){
            $nom = $this->input->post('nom_abonne_bibliotheque');
            $prenom = $this->input->post('prenom_abonne_bibliotheque');
            $email = $this->input->post('mail_abonne_bibliotheque');

            if(empty($nom) || empty($prenom) || empty($email)){

                echo "tous les champs sont obligatoires";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                echo "L'adresse mail n'est pas valide";
            } else{
            if(isset($this->abonneModel)){
                $nom = $this->db->escape_str($nom);
                $prenom = $this->db->escape_str($prenom);
                $email = $this->db->escape_str($email);
                
                $this->abonneModel->enregistrer_abonne($nom, $prenom, $email);
                }

            }
           // $this->abonneModel->enregistrer_abonne($nom, $prenom, $email);
            redirect('abonneController/abonne');
        }
    }

    

    /*public function deleteAbonne(){
        if(isset($_POST['action']) && $_POST['action'] == 'supprimerAbonne'){
            $abonne = $_POST['id'];
            if($this->abonneModel->supprimer_abonne($abonne)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }*/

    public function deleteAbonne(){
        $id = $this->input->post('id_abonne_bibliotheque');

        

        $deleted = $this->abonneModel->supprimer_abonne($id);

        if ($deleted) {

            echo json_encode(array('success' =>true));
        } else {

            echo json_encode(array('success' => false, 'message' => 'Echec de la suppression des données.'));
        }
    }

    public function abonne(){
        $data = array();
        $data['abonne_bibliotheque'] = $this->abonneModel->print_abonne();
       
        $this->load->view('abonne', $data);
    }

}

?>