
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
            
                 <select class = "form-select" id = "id_abonne" name = "id_abonne">
              <?php foreach($abonnes as $abonne):?>
              <option value = "<?php echo $abonne['id_abonne_bibliotheque']?>"><?php echo htmlspecialchars($abonne['prenom_abonne_bibliotheque']);echo " "; echo htmlspecialchars($abonne['nom_abonne_bibliotheque']);?></option>
              <?php endforeach;?>
              </select>

              <select class = "form-select" id = "id_employe" name = "id_employe">
              <?php foreach($employes as $employe):?>
              <option value = "<?php echo $employe['id_employe_bibliotheque']?>"><?php echo htmlspecialchars($employe['prenom_employe_bibliotheque']);echo " "; echo htmlspecialchars($employe['nom_employe_bibliotheque']);?></option>
              <?php endforeach;?>
              </select>

              <select class = "form-select" id = "ISBN" name = "ISBN">
              <?php foreach($documents as $document):?>
              <option value = "<?php echo $document['ISBN_document']?>"><?php echo htmlspecialchars($document['titre_document']);?></option>
              <?php endforeach;?>
              </select>

                 <input class = "btn btn-success" type = "submit" name = "enregistrer" placeholder = "Valider l' emprunt">

                 <?= form_close();?>

             </div>

            </div>

               
    
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
                        <td class = "table-primary"><?php echo date('d-m-Y', strtotime($donnees["date_emprunt"])); ?></td>
                        <td class = "table-primary"><?php echo date('d-m-Y', strtotime($donnees["date_retour"])); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_employe_bibliotheque"]); echo " "; echo htmlspecialchars($donnees["nom_employe_bibliotheque"]);?></td>
                        <td class = "table-primary text-center">
                    <form method="POST" action="<?php echo site_url('EmpruntController/deleteEmprunt/' . $donnees['id_emprunt']); ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir retourner ce document ?')">
                    <button type="submit" class="btn btn-danger btn-sm" name="supprimer">Supprimer</button>
                    </form>  
                    </td>
                        
                    </tr>
                
                <?php endforeach; ?>

                </tbody>
                </table>
        </form>
                
</div>



<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>