<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        
        $req = $bd->prepare("UPDATE PERIPHERIQUE SET ETAT = 1 WHERE NUM=:id_peripherique");
        $req->bindParam(':id_peripherique' , $_POST['id']);

        $req->execute();
        
        $response_array['response'] = "Peripherique validé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>