$(function() {
    
    //Chargement de la page
    refreshUtilisateursTable();
    refreshProfesseursTable();

});



    // Charge la liste des utilisateurs
    
    function refreshUtilisateursTable(){
        $.post( "../php/ajax/administrateur/refreshUtilisateurs.php")
          .done(function( data ) {
                $('#utilisateurs').html(data);
          });
    }

    // Charge la liste des professeurs
    
    function refreshProfesseursTable(){
        $.post( "../php/ajax/administrateur/refreshProfesseurs.php")
          .done(function( data ) {
                $('#professeurs').html(data);
          });
    }

    // Change l'etat d'un utilisateur

    function changeEtatUtilisateur($elem, $id){
        $.post( "../php/ajax/administrateur/etatUtilisateur.php", { etat: $($elem).is(':checked'), id_user: $id })
          .done(function( data ) {
              if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                }else{
                    Materialize.toast(data.response, 4000);
                }  
          });
    }


    // Suppression d'un utilisateur

    function supprUtilisateur(id, elem){   
        $.post( "../php/ajax/administrateur/supprUtilisateur.php", { id: id })
          .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    $(elem).parent("td").parent("tr").toggle();
                }else{
                    Materialize.toast(data.response, 4000);
                }  
          });
    }
    
