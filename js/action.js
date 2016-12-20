$(function() {
    
    //Chargement de la page
    refreshPeripheriquesTable();

});



    // Charge la liste des peripheriques
    
    function refreshPeripheriquesTable(){
        $.post( "../php/ajax/refreshPeripheriques.php")
          .done(function( data ) {
                $('tbody').html(data);
          });
    }
    

    // Suppression d'un peripherique

    function supprPeripherique(id, elem){   
        $.post( "../php/ajax/supprPeripherique.php", { id: id })
          .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    $(elem).parent("td").parent("tr").toggle();
                }else{
                    Materialize.toast(data.response, 4000);
                }  
          });
    }


    // Ajout d'un peripherique

    $("#bt_ajout").click(function() {
        if($('#libelle').val().length > 0 && $('#mac').val().length > 0){
            $.post( "../php/ajax/ajoutPeripherique.php", { libelle: $('#libelle').val(), mac: $('#mac').val() })
            .done(function( data ) {
            if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    refreshPeripheriquesTable();
                
                $('#libelle').val("");
                $('#mac').val("");
                }else{
                    Materialize.toast(data.response, 4000);
                }  
            });
        }else{
            Materialize.toast("Informations incorrect.", 4000);
        }
        
    });
