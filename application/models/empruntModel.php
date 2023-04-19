<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class empruntModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

/*
@$date_emprunt = $_POST["date_emprunt"];
@$date_retour = $_POST["date_retour"];
@$id_abonne_bibliotheque = $_POST["id_abonne_bibliotheque"];
@$nom_abonne_bibliotheque = $_POST["nom_abonne_bibliotheque"];
@$prenom_abonne_bibliotheque = $_POST["prenom_abonne_bibliotheque"];
@$id_employe_bibliotheque = $_POST["id_employe_bibliotheque"];
@$nom_employe_bibliotheque = $_POST["nom_employe_bibliotheque"];
@$prenom_employe_bibliotheque = $_POST["prenom_employe_bibliotheque"];
@$ISBN_document = $_POST["ISBN_document"];
@$titre_document = $_POST["titre_document"];


@$emprunt = $_POST["emprunt"];
@$retour = $_POST["retour"];

@$afficher = $_POST["afficher"];

$erreur = "";

if(isset($emprunt)){

    //selection des abonnes pour insertion de l'id abonne dans la table emprunt

    $queryAbonne = "SELECT id_abonne_bibliotheque FROM abonne_bibliotheque
    WHERE nom_abonne_bibliotheque = ? 
    AND prenom_abonne_bibliotheque = ?";
    $selectAbonne = $pdo->prepare($queryAbonne);
    $selectAbonne->execute([
     $nom_abonne_bibliotheque, $prenom_abonne_bibliotheque
    ]);
    $row_abonne = $selectAbonne->fetch(PDO::FETCH_ASSOC);

    if($row_abonne !== FALSE){

        $id_abonne_bibliotheque = $row_abonne["id_abonne_bibliotheque"];

    }else{
        echo "Aucun abonné trouvé avec les informations spécifiés.";
    }

    


    //selection des employes pour insertion de l'id employe dans la table emprunt

    $queryEmploye = "SELECT id_employe_bibliotheque FROM employe_bibliotheque
    WHERE nom_employe_bibliotheque = ?
    AND prenom_employe_bibliotheque = ?";
    $selectEmploye = $pdo->prepare($queryEmploye);
    $selectEmploye->execute([
    $nom_employe_bibliotheque, $prenom_employe_bibliotheque
    ]);
    $row_employe = $selectEmploye->fetch(PDO::FETCH_ASSOC);

    if($row_employe !== FALSE){

        $id_employe_bibliotheque = $row_employe["id_employe_bibliotheque"];

    }else{
        echo "Aucun employé trouvé avec les informations spécifiés";
    }


    //selection des documents pour insertion de l'ISBN document dans la table emprunt

    $queryDocument = "SELECT ISBN_document FROM document_bibliotheque
    WHERE titre_document = ?";
    $selectDocument = $pdo->prepare($queryDocument);
    $selectDocument->execute([$titre_document]);
    $row_document = $selectDocument->fetch(PDO::FETCH_ASSOC);

    if($selectDocument->rowCount() > 0){

        $ISBN_document = $row_document["ISBN_document"];

    }else{
        echo "Aucun document trouvé avec les informations spécifiés";
    }

    
    
    $queryEmprunt = "INSERT INTO emprunt (date_emprunt, date_retour, id_abonne_bibliotheque, id_employe_bibliotheque, ISBN_document)
    VALUES (:date_emprunt, :date_retour, :id_abonne_bibliotheque, :id_employe_bibliotheque, :ISBN_document)";
    $insertEmprunt = $pdo->prepare($queryEmprunt);
    $insertEmprunt ->execute([
        ':date_emprunt' => $date_emprunt,
        ':date_retour' => $date_retour,
        ':id_abonne_bibliotheque' => $id_abonne_bibliotheque,
        ':id_employe_bibliotheque' => $id_employe_bibliotheque,
        ':ISBN_document' => $ISBN_document
    ]);
    $execute = $insertEmprunt->fetchAll();
    
    if($insertEmprunt){
        echo "<script>alert('Nouvel emprunt enregistré avec succès.')</script>";
    }else{
        echo "<script>alert('Erreur d'enregistrement de l'emprunt.')</script>";
    }




 

}

if(isset($retour)){
    $retourEmprunt = $pdo->prepare("DELETE FROM emprunt WHERE ISBN_document = $ISBN_document");
    $retourEmprunt ->execute();
    $tab = $retourEmprunt->fetchAll();

    
}



    $queryPrintEmprunt = "SELECT abonne_bibliotheque.nom_abonne_bibliotheque, abonne_bibliotheque.prenom_abonne_bibliotheque,
    employe_bibliotheque.nom_employe_bibliotheque, employe_bibliotheque.prenom_employe_bibliotheque, document_bibliotheque.titre_document,
    emprunt.ISBN_document, emprunt.date_emprunt, emprunt.date_retour
    FROM emprunt
    JOIN abonne_bibliotheque
    ON emprunt.id_abonne_bibliotheque = abonne_bibliotheque.id_abonne_bibliotheque
    JOIN employe_bibliotheque
    ON emprunt.id_employe_bibliotheque = employe_bibliotheque.id_employe_bibliotheque
    JOIN document_bibliotheque
    ON emprunt.ISBN_document = document_bibliotheque.ISBN_document
    ORDER BY emprunt.id_emprunt";
    $listEmprunt = $pdo->query($queryPrintEmprunt);
    
$pdo = null;*/

public function print_emprunt(){
    $this->db->select('*');
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