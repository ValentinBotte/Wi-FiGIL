$(function() {
    
    //Chargement de la page
    refreshUtilisateursTable();
    refreshProfesseursTable();
    refreshPeripheriqueTable();
    refreshPeripheriqueValideTable();
    refreshHistorique();
    // Gestion affichage mobile du menu
    $(".button-collapse").sideNav();
});


// Charge la liste des utilisateurs

    function refreshPeripheriqueTable(){
    $.post( "../php/ajax/administrateur/refreshPeripherique.php")
        .done(function( data ) {
            $('#peri').html(data);
        });
    }

    function refreshPeripheriqueValideTable(){
        $.post( "../php/ajax/administrateur/refreshPeripheriqueValide.php")
            .done(function( data ) {
                $('#periValide').html(data);
            });
    }

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

    // Charge l'historique

    function refreshHistorique(){
        $.post( "../php/ajax/administrateur/refreshHistorique.php")
            .done(function( data ) {
                $('#historique').html(data);
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
    // Change l'etat d'un professeur

    function changeEtatProfesseur($elem, $id){
        $.post( "../php/ajax/administrateur/etatProfesseur.php", { etat: $($elem).is(':checked'), id_user: $id })
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

    // Suppression d'un péripherique

    function supprPeripherique(id, mac, nom, prenom, elem){
        $.post( "../php/ajax/administrateur/supprPeripherique.php", { id: id, mac: mac, nom: nom, prenom: prenom})
            .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    $(elem).parent("td").parent("tr").toggle();
                }else{
                    Materialize.toast(data.response, 4000);
                }
            });
    }

    // Suppression d'un professeur

    function supprProfesseur(id, elem){
        $.post( "../php/ajax/administrateur/supprProfesseur.php", { id: id })
            .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    $(elem).parent("td").parent("tr").toggle();
                }else{
                    Materialize.toast(data.response, 4000);
                }
            });
    }

    function openModal(ip, mac, nom, prenom, groupe){
        $.post( "../php/ajax/administrateur/openModal.php", { ip: ip, mac: mac, nom: nom, prenom: prenom, groupe: groupe})
            .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 10000);
                }else{
                    Materialize.toast(data.response, 10000);
                }
            });
    }

function openModal2(ip, mac, nom, prenom){
    $.post( "../php/ajax/administrateur/openModal.php", { ip: ip, mac: mac, nom: nom, prenom: prenom})
        .done(function( data ) {
            if(data.status === "success"){
                Materialize.toast(data.response, 10000);
            }else{
                Materialize.toast(data.response, 10000);
            }
        });
}

    // validation d'un peripherique

    function validePeripherique(id, nom, mac, prenom, elem){
        $.post( "../php/ajax/administrateur/validePeripherique.php", { id: id, nom: nom, mac: mac, prenom: prenom})
            .done(function( data ) {
                if(data.status === "success"){
                    Materialize.toast(data.response, 4000);
                    $(elem).parent("td").parent("tr").toggle();
                }else{
                    Materialize.toast(data.response, 4000);
                }
            });
    }

