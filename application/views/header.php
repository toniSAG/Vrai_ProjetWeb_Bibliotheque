<!DOCTYPE html>

<html>
    <head>
        <title>Inscription des abbonés</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, user-scalable=no">        
        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "<?php echo css_url('Bibliotheque_Style')?>"/>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src = "https://code.jquery.com/jquery-3.6.0.min.js">
    
</script>
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
                    <a class = "nav-link" href = "<?= site_url('empruntController/emprunt')?>">Gestion des emprunts</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link" href = "<?= site_url('documentController/document')?>">Gestion des document</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link active" href = "<?= site_url('abonneController/abonne')?>">Gestion des abonnés</a>
                </li>

              </ul>
            </div>

           </nav>

         </header>
    </body>
</html>