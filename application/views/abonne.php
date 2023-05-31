


    

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
                    
                    <td class = "table-primary text-center"><?php echo htmlspecialchars($abonne['prenom_abonne_bibliotheque']);?></td>
                    <td class = "table-primary text-center"><?php echo htmlspecialchars($abonne['nom_abonne_bibliotheque']);?></td>
                    <td class = "table-primary text-center"><?php echo htmlspecialchars($abonne['mail_abonne_bibliotheque']);?></td>
                    <td class = "table-primary text-center"><button class = "btn btn-danger btn-sm supprimer"  id = "deleteButton" data-id ="<?php echo $abonne['id_abonne_bibliotheque'];?>">Supprimer</button>      
                </td>
                  <!--  <td class = "table-primary text-center">
                        <input class = "btn btn-danger btn-sm supprimer" type = "submit" data-id ="<?php// echo $abonne['id_abonne_bibliotheque'];?>" placeholder = "Supprimer">
                    </td>-->
                </tr>
        
        <?php endforeach;?>

        </tbody>
    </table>
    

</div>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.supprimer').click(function() {
            var id = $(this).data('id');
            if (confirm("Voulez vous vraiment supprimer cer élément ?")) {
                $.ajax({
                    url: '<?php echo base_url("abonneController/deleteAbonne");?>',
                    type: 'POST',
                    data: {action: "supprimer_abonne", id: id_abonne_bibliotheque},
                    success: function(response){

                        if(response.success){
                            alert("Données supprimées avec succès !");
                            location.reload();
                        }else{
                            alert("Erreur lors de la suppression des données : " + response.message);

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert("Erreur lors de la suppression des données : " + thrownError);
                    }
                });
            }
        });
    });
</script>

    </body>

</html>