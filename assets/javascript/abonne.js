function supprimerAbonne(){
    console.log("supprimerAbonne() appelée avec l'ID" );
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('abonneController/deleteAbonne')?>",
        data: {action: "supprimer_abonne", id: id_abonne},
        success: function(result){
            if(result == "success"){
                alert("Abonné supprimé avec succès");
                window.location.reload();
            }else{
                alert("Une erreur est survenue lors de la supression de l'abonné");
            }
        }
    })
}