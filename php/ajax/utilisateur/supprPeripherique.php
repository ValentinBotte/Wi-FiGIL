<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        
        if($_SESSION['grade'] == 0){
            $sql = 'DELETE FROM PERIPHERIQUE WHERE NUM=:id AND NUM_USER=:id_user';
        }else{
            $sql = 'DELETE FROM PERIPHERIQUE WHERE NUM=:id AND NUM_PROF=:id_user';
        }
        
        $req = $bd->prepare($sql);
        $req->bindParam(':id', $_POST['id']);
        $req->bindParam(':id_user' , $_SESSION['user']['num']);

        $req->execute();
        
        $response_array['response'] = "Périphérique supprimé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>