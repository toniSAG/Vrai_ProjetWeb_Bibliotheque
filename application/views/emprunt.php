<?php?>
<!DOCTYPE html>

<html>
    <head>
        <title>Gestion des emprunts et des retours</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, user-scalable=no">
        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

        <link rel = "stylesheet" href = "<?php echo css_url('Bibliotheque_Style')?>"/>
    </head>

    <body>

    <header>
           <nav class = "navbar navbar-expand-sm bg-light navbar-light">

            <div class = "container-fluid">

              <ul class = "navbar-nav">

                <li class = "nav-item">
                  <a class = "nav-link active" href="acceuil">Retourner à l'acceuil</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link active" href = "emprunt">Gestion des emprunts</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link" href = "document">Gestion des document</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link" href = "abonne">Gestion des abonnés</a>
                </li>

              </ul>
            </div>

           </nav>

         </header>

<div class = "row">



<p>
<button class = "btn btn-primary" type = "button" data-bs-toggle = "collapse" data-bs-target = "#formulaireEmprunt" aria-expanded = "false" aria-controls = "formulaireEmprunt">
    Emprunt de document
</button>
</p>
    <div class = "container collapse" id = "formulaireEmprunt">

           
           <form class = "Form" name = "fo" method = "post" action = "">

           

           <div class = "row">
            
             <div class = "justify-content-*-center">
             <label for = "emprunt">Emprunt de document</label>
              
                 <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_emprunt">
                 <input class = "form-control" type = "date" required pattern = "\d{4}-\d{2}-\d{2}" name = "date_retour">
                 <input id = "emprunt" class = "form-control" type = "text" name = "nom_abonne_bibliotheque" placeholder = "Nom de l'abonné">
                 <input id = "emprunt" class = "form-control" type = "text" name = "prenom_abonne_bibliotheque" placeholder = "Prénom de l'abonné">
                 <input id = "emprunt" class = "form-control" type = "text" name = "nom_employe_bibliotheque" placeholder = "Nom de l'employé">
                 <input id = "emprunt" class = "form-control" type = "text" name = "prenom_employe_bibliotheque" placeholder = "Prénom de l'employé">
                 <input id = "emprunt" class = "form-control" type = "text" name = "titre_document" placeholder = "Document emprunté">
            

                 <button class = "btn btn-success" type = "submit" name = "emprunt">Valider l' emprunt</button>

             </div>

            </div>

               </form>
    
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

                <?php while($donnees = $listEmprunt->fetch()){?>
                    <tr class = "scroll_container">
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_abonne_bibliotheque"]); echo " "; echo htmlspecialchars($donnees["nom_abonne_bibliotheque"]);?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["titre_document"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["ISBN_document"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["date_emprunt"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["date_retour"]); ?></td>
                        <td class = "table-primary"><?php echo htmlspecialchars($donnees["prenom_employe_bibliotheque"]); echo " "; echo htmlspecialchars($donnees["nom_employe_bibliotheque"]);?></td>
                        
                    </tr>
                
                <?php } ?>

                </tbody>
                </table>
        </form>
                
</div>



<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>