<!DOCTYPE html>

<html>
    <head>
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
                    <a class = "nav-link <?php if($active_page == 'emprunt') echo 'active';?>" href = "<?= site_url('EmpruntController/emprunt')?>">Gestion des emprunts</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link <?php if($active_page == 'document') echo 'active';?>" href = "<?= site_url('documentController/document')?>">Gestion des document</a>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link <?php if($active_page == 'abonne') echo 'active';?>" href = "<?= site_url('abonneController/abonne')?>">Gestion des abonnés</a>
                </li>

              </ul>
            </div>

           </nav>

         </header>
    </body>
</html>