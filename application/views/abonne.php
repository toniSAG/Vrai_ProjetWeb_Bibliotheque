


    

    <div class = "row">

    <!-- Formulaire pour ajouter de nouveaux abonnés -->

    <p>
        <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#AbonneSave" aria-expanded = "false" aria-controls = "AbonneSave">
            Ajouter de nouveaux abonnés
        </button>
    </p>

    <div class = "container collapse" id = "AbonneSave">

  <!--  <form class = "Form" name = "enregistrerAbonne" method = "post" action = "<?//= base_url('enregistrer-abonne');?>">-->

   <div class = "row">

    <div class = "justify-content-*-center">    
        <?= form_open('enregistrer-abonne');?>

        <label>Ajouter de nouveaux abonnés</label>
          <input class = "form-control" type = "text" name = "nom_abonne_bibliotheque" placeholder = "Nom de l'abonné">
          <input class = "form-control" type = "text" name = "prenom_abonne_bibliotheque" placeholder = "Prénom de l'abonné">
          <input class = "form-control" type = "mail" name = "mail_abonne_bibliotheque" placeholder = "Email de l'abonné">
          <input class = "btn btn-primary" type = "submit" name = "enregistrer" placeholder="Enregistrer">
       
          <?= form_close()?>
    </div>

   </div>

  <!-- </form>-->

    </div>

    <!-- Formulaire pour supprimer des abonnés -->

   

</div>

<!-- Panneau qui affiche les abonnés de la bibliothèque -->

<div class = "container-fluid">

    
        

    <table class = "table table-striped table-bordered">
        <label>Tableau des abonnés</label>
            <thead>
                <tr>
                    <th class = "table-primary">Prénom</th>
                    <th class = "table-primary">nom</th>
                    <th class = "table-primary">email</th>
                </tr>
            </thead>
            <tbody>

            
                <?php foreach ($abonne_bibliotheque as $abonne):?>
                    
            

                <tr class = "scroll_container">
                    
                    <td class = "table-primary"><?php echo htmlspecialchars($abonne['prenom_abonne_bibliotheque']);?></td>
                    <td class = "table-primary"><?php echo htmlspecialchars($abonne['nom_abonne_bibliotheque']);?></td>
                    <td class = "table-primary"><?php echo htmlspecialchars($abonne['mail_abonne_bibliotheque']);?></td>
                    <td class = "table-primary text-center">
                        <input class = "btn btn-danger btn-sm" type = "submit" value ="<?php  $abonne['id_abonne_bibliotheque'];?>" onclick = "supprimerAbonne (this)" placeholder = "Supprimer">
                    </td>
                </tr>
        
        <?php endforeach;?>

        </tbody>
    </table>
    

</div>

    </body>

</html>