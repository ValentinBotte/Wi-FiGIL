<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        
        $req = $bd->prepare("DELETE FROM peripherique WHERE NUM=:id_peripherique");
        $req->bindParam(':id_peripherique' , $_POST['id']);

        $req->execute();
        
        $response_array['response'] = "Peripherique supprimé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>