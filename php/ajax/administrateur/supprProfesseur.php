<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        
        $req = $bd->prepare("DELETE FROM port_professeur WHERE NUM=:id_user");
        $req->bindParam(':id_user' , $_POST['id']);

        $req->execute();
        
        $response_array['response'] = "Utilisateur supprimé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>