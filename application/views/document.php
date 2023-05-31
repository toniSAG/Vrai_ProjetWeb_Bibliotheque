

         <div class = "erreur"><?php //echo $erreur;?></div>
         

         <p>
            <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#Document" aria-expanded = "false" aria-controls = "Document">
                Enregistrer des Livres
            </button>
         </p>

    <div class = "container collapse" id = "Document">

        
            

          <div class = "row">

            <div class = "justify-content-*-center">
              <?= form_open('enregistrer-livre');?>
              
            <label>Enregistrer des Livres</label>
            
              <input class = "form-control" type = "text" name = "ISBN_document" placeholder = "ISBN" minlength = "13" maxlength = "13"/>
              <input class = "form-control" type = "text" name = "titre_document" placeholder = "Titre"/>
              <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_parrution_document" placeholder = "Année de publication"/>
              <label for = "type_document">Type de document</label>
              <select class = "form-select" id = "type_document" name = "libelle_type_document">
              
              <option>livre</option>
              
              </select>

              <input class = "form-control" type = "text" name = "nom_createur_bibliotheque" placeholder = "Nom du créateur"/>
              <input class = "form-control" type = "text" name = "prenom_createur_bibliotheque" placeholder = "Prénom du créateur"/>
              <label for = "role_createur">Rôle du créateur</label>
              <select class = "form-select" id = "role_createur" name = "libelle_type_createur">
              
              <option>auteur</option>

              </select>

              <input class = "btn btn-primary" type = "submit" name = "enregistrer_livre" value="Enregistrer">

              <?= form_close();?>
            </div>

          </div>

        </form>

    </div>

          
         <p>
            <button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#BD" aria-expanded = "false" aria-controls = "BD">
                Enregistrer des Bandes Dessinées
            </button>
         </p>

    <div class = "container collapse" id = "BD">

        <form class = "Form" name = "fo" method = "post" action = "">
            

          <div class = "row">

            <div class = "justify-content-*-center">
            <label>Enregistrer des Bandes Dessinées</label>
            
              <input class = "form-control" type = "text" name = "ISBN_document" placeholder = "ISBN"/>
              <input class = "form-control" type = "text" name = "titre_document" placeholder = "Titre"/>
              <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_parrution_document" placeholder = "Année de publication"/>
              <label for = "type_document">Type de document</label>
              <select class = "form-select" id = "type_document" name = "libelle_type_document">
              <option>Bande dessinée</option>
              </select>

              <input class = "form-control" type = "text" name = "nom_createur_bibliotheque_auteur" placeholder = "Nom du créateur"/>
              <input class = "form-control" type = "text" name = "prenom_createur_bibliotheque_auteur" placeholder = "Prénom du créateur"/>
              <label for = "role_createur">Rôle du créateur</label>
              <select class = "form-select" id = "role_createur" name = "id_type_createur_auteur">
              <option>auteur</option>
              </select>

              <input class = "form-control" type = "text" name = "nom_createur_bibliotheque_dessinateur" placeholder = "Nom du créateur"/>
              <input class = "form-control" type = "text" name = "prenom_createur_bibliotheque_dessinateur" placeholder = "Prénom du créateur"/>
              <label for = "role_createur">Rôle du créateur</label>
              <select class = "form-select" id = "role_createur" name = "id_type_createur_dessinateur">
              <option>dessinateur</option>
              </select>

              <input class = "btn btn-primary" type = "submit" name = "enregistrer_BD" value="Enregistrer">

            </div>

          </div>

        </form>

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
                                    <td class = "table-primary"><?php echo htmlspecialchars($donnees["date_parrution_document"]);?></td>
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
                                    <td class = "table-primary"><?php echo htmlspecialchars($BD["date_parrution_document"]);?></td>
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