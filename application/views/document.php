

         <div class = "erreur"><?php //echo $erreur;?></div>
         
         <p>
          <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#Createur" arie-expanded = "false" aria-controls = "Document">Enregistrer des createurs</button>
         </p>

         <p>
            <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#Document" aria-expanded = "false" aria-controls = "Document">
                Enregistrer des Livres
            </button>
         </p>

    <div class = "container collapse" id = "Createur">

      <div class = "justify-content-*-center">

        <?= form_open('enregistrer-createur');?>

        <label>Enregistrer des créateurs</label>
        <input class = "form-control" id = "nom" name = "nom" type = "text" placeholder = "nom" minlenght = "13" maxlenght = "13"/>
        <input class = "form-control" id = "prenom" name = "prenom" type = "text" placeholder = "prenom" minlenght = "13" maxlenght = "13"/>
        <select class = "form-select" id = "type_createur" name = "type_createur">
          <?php foreach($types_createur as $type):?>
          <option value = "<?php echo $type['id_type_createur']?>"><?php echo htmlspecialchars($type['libelle_type_createur']);?></option>
          <?php endforeach;?>
        </select>
        <input class = "btn btn-primary" type = "submit" name = "enregistrer_livre" value="Enregistrer">
        <?= form_close();?>
      </div>
    </div>

    <div class = "container collapse" id = "Document">

    <div class = "Form" name = "fo" method = "post" action = "">
        
            

          <div class = "row">

            <div class = "justify-content-*-center">
              <?= form_open('enregistrer-livre');?>
              
            <label>Enregistrer des Livres</label>
            
              <input class = "form-control" id = "ISBN" type = "text" name = "ISBN" placeholder = "ISBN" minlength = "13" maxlength = "13"/>
              <input class = "form-control" id = "titre" type = "text" name = "titre" placeholder = "Titre"/>
              <input class = "form-control" id = "date" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date" placeholder = "Année de publication"/>
              <label for = "type_document">Type de document</label>
              <select class = "form-select" id = "type_document" name = "type_document">
              
              <option value = "1">livre</option>
              
              </select>

              <select class = "form-select" id = "id_auteur" name = "id_auteur">
              <?php foreach($auteurs as $auteur):?>
                
              <option value = "<?php echo $auteur['id_createur_bibliotheque']?>"><?php echo htmlspecialchars($auteur['prenom_createur_bibliotheque']);echo " "; echo htmlspecialchars($auteur['nom_createur_bibliotheque']);?></option>
              <?php endforeach;?>
              </select>
              <label for = "role_createur">Rôle du créateur</label>
              <select class = "form-select" id = "type_createur" name = "type_createur">
              
              <option value = "1">auteur</option>

              </select>

              <input class = "btn btn-primary" type = "submit" name = "enregistrer_livre" value="Enregistrer">

              <?= form_close();?>
            </div>

          </div>

              </div>

    </div>

          
         <p>
            <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#BD" aria-expanded = "false" aria-controls = "BD">
                Enregistrer des Bandes Dessinées
            </button>
         </p>

    <div class = "container collapse" id = "BD">

        <div class = "Form" name = "fo" method = "post" action = "">
            

          <div class = "row">

            <div class = "justify-content-*-center">

            <?= form_open('enregistrer-BD');?>
            <label>Enregistrer des Bandes Dessinées</label>
            
              <input class = "form-control" type = "text" name = "ISBN" placeholder = "ISBN"/>
              <input class = "form-control" type = "text" name = "titre" placeholder = "Titre"/>
              <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date" placeholder = "Année de publication"/>
              <select class = "form-select" id = "type_document" name = "type_document">
              
              <option value = "2">BD</option>
              
              </select>

              <label for = "role_createur">Auteur</label>
              

              <select class = "form-select" id = "id_auteur" name = "id_auteur">
              <?php foreach($auteurs as $auteur):?>
                
              <option value = "<?php echo $auteur['id_createur_bibliotheque']?>"><?php echo htmlspecialchars($auteur['prenom_createur_bibliotheque']);echo " "; echo htmlspecialchars($auteur['nom_createur_bibliotheque']);?></option>
              <?php endforeach;?>
              </select>
              <label for = "role_createur">dessinateur</label>
              

              <select class = "form-select" id = "id_dessinateur" name = "id_dessinateur">
              <?php foreach($dessinateurs as $dessinateur):?>
                
              <option value = "<?php echo $dessinateur['id_createur_bibliotheque']?>"><?php echo htmlspecialchars($dessinateur['prenom_createur_bibliotheque']);echo " "; echo htmlspecialchars($dessinateur['nom_createur_bibliotheque']);?></option>
              <?php endforeach;?>
              </select>
              

              <input class = "btn btn-primary" type = "submit" name = "enregistrer_BD" value="Enregistrer">

              <?= form_close();?>
            </div>

          </div>

              </div>

    </div>
        
      
            

            <div class = "container-fluid">

            

                    <table class = "table table-striped table-bordered">
                        <label>Tableau des livres:</label>
                        <thead>
                            <tr>
                                <th class = "table-primary">ISBN du document</th>
                                <th class = "table-primary">Titre du document</th>
                                <th class = "table-primary">Date de parrution</th>
                                <th class = "table-primary">Auteur</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($livre_bibliotheque as $donnees):?>
                                <tr class = "scroll_container">
                                    <td class = "table-primary"><?php echo htmlspecialchars($donnees["ISBN_document"]);?></td>
                                    <td class = "table-primary"><?php echo htmlspecialchars($donnees["titre_document"]);?></td>
                                    <td class = "table-primary"><?php echo date('d-m-Y', strtotime($donnees["date_parrution_document"]));?></td>
                                    <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_createur_bibliotheque"]);echo " "; echo htmlspecialchars($donnees["nom_createur_bibliotheque"]);?></td>
                                    
                                </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>

                    <table class = "table table-striped table-bordered">
                        <label>Tableau des Bandes dessinées:</label>
                        <thead>
                            <tr>
                                <th class = "table-primary">ISBN du document</th>
                                <th class = "table-primary">Titre du document</th>
                                <th class = "table-primary">Date de parrution</th>
                                <th class = "table-primary">Auteur</th>
                                <th class = "table-primary">Dessinateur</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($BD_bibliotheque as $BD):?>
                                <tr class = "scroll_container">
                                    <td class = "table-primary"><?php echo htmlspecialchars($BD["ISBN_document"]);?></td>
                                    <td class = "table-primary"><?php echo htmlspecialchars($BD["titre_document"]);?></td>
                                    <td class = "table-primary"><?php echo date('d-m-Y', strtotime($BD["date_parrution_document"]));?></td>
                                    <td class = "table-primary"><?php echo htmlspecialchars($BD["prenom_auteur"]);echo " "; echo htmlspecialchars($BD["nom_auteur"]);?></td>
                                    <td class = "table-primary"><?php echo htmlspecialchars($BD["prenom_dessinateur"]);echo " "; echo htmlspecialchars($BD["nom_dessinateur"]);?></td>
                                    
                                </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>
            

            </div>
         

         </div>


       <!--  <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>-->


       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

       
       <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>