
<?php 
   // $this->load->view('empruntController');
?>

<div class = "row">



<p>
<button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#formulaireEmprunt" aria-expanded = "false" aria-controls = "formulaireEmprunt">
    Emprunt de document
</button>
</p>
    <div class = "container collapse" id = "formulaireEmprunt">

           
           

           

           <div class = "row">
            
             <div class = "justify-content-*-center">
                <?= form_open('enregistrer-emprunt');?>
             <label for = "emprunt">Emprunt de document</label>
              
                 <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_emprunt">
                 <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_retour">
                 <input id = "emprunt" class = "form-control" type = "text" name = "nom_abonne_bibliotheque" placeholder = "Nom de l'abonné">
                 <input id = "emprunt" class = "form-control" type = "text" name = "prenom_abonne_bibliotheque" placeholder = "Prénom de l'abonné">
                 <input id = "emprunt" class = "form-control" type = "text" name = "nom_employe_bibliotheque" placeholder = "Nom de l'employé">
                 <input id = "emprunt" class = "form-control" type = "text" name = "prenom_employe_bibliotheque" placeholder = "Prénom de l'employé">
                 <input id = "emprunt" class = "form-control" type = "text" name = "titre_document" placeholder = "Document emprunté">
            

                 <input class = "btn btn-success" type = "submit" name = "enregistrer" placeholder = "Valider l' emprunt">

                 <?= form_close();?>

             </div>

            </div>

               
    
    </div>

    <p>
    <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#formulaireRetour" aria-expanded = "false" aria-controls = "formulaireRetour">
    Retour de document
    </button></p>

    <div class = "container collapse" id = "formulaireRetour">
        
            <form id = "retour" class = "Form" name = "fo" method = "post" action = "">

            <div class = "row">

                <div class = "justify-content-*-center">

            <label for = "retour">Retour de document</label>
                <input class = "form-control" type = "text" name = "titre_document" placeholder = "Document retourné">
                <input class = "form-control" type = "text" name = "ISBN_document" placeholder = "ISBN du document">
                <input class = "form-control" type = "text" name = "nom_abonne_bibliotheque" placeholder = "Nom de l'abonné">
                <input class = "form-control" type = "text" name = "prenom_abonne_bibliotheque" placeholder = "Prénom de l'abonné">
                
                <button class = "btn btn-primary" type = "submit" name = "retour">Valider le retour</button>

                </div>
            </div>

            </form>
    </div>

</div>

<div class = "container-fluid">
  
                <table class="table table-striped table-bordered">
                    <label>Tableau des emprunts:</label>
                <thead>
                    <tr>
                        <th class = "table-primary">Abonné</th>
                        <th class = "table-primary">titre du document</th>
                        <th class = "table-primary">ISBN du document</th>
                        <th class = "table-primary">date d'emprunt</th>
                        <th class = "table-primary">date de retour</th>
                        <th class = "table-primary">Employé</th>
                        
                        
                    </tr>
                </thead>
                <tbody>

                <?php foreach($emprunt as $donnees):?>
                    <tr class = "scroll_container">
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_abonne_bibliotheque"]); echo " "; echo htmlspecialchars($donnees["nom_abonne_bibliotheque"]);?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["titre_document"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["ISBN_document"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["date_emprunt"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["date_retour"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_employe_bibliotheque"]); echo " "; echo htmlspecialchars($donnees["nom_employe_bibliotheque"]);?></td>
                        
                    </tr>
                
                <?php endforeach; ?>

                </tbody>
                </table>
        </form>
                
</div>



<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>