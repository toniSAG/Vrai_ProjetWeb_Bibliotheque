<?php?>

<!DOCTYPE html>
<html>
    <head>
        <title>Acceuil de la Bibliothèque</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, user-scalable=no">
        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "<?php echo css_url('Bibliotheque_Style')?>"/>
        
    </head>

    <body>

    <!-- Page d'acceuil avec  un panneau contenant 3 boutons : 
         - Un bouton Emprunt/retour menant au clic à une page pour gérer les emprunts et les retours de documents
         - Un bouton Ajout de documents menant au clic à une page pour ajouter de nouveaux documents livre ou BD
         - Un bouton Ajout d'abonnés menant au clic à une page pour ajouter de nouveaux abonnés
         - D'autres boutons ? 
-->

<div class = "Bloc_Principal">

<div class = "Panneau_Acceuil">
    <div class = "Bouton_content">
         
    <a class = "btn btn-primary"  value = "Emprunt/retour" href = "<?= 'emprunt' ?>" >Emprunt/retour</a>
    <a class = "btn btn-primary"  value = "Gestion des documents" href = "<?= 'document'?>">Gestion des documents</a>
    <a class = "btn btn-primary"  value = "Gestion des abonnés" href = "<?= 'abonne'?>">Gestion des abonnés</a>

</div>



</div>

</div>
    </body>
</html>