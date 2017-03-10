<?php

    session_start();
    header('Content-type: application/json');

   // if($_SESSION['grade'] == 2){
        
        require_once('../../bd.php');

        try{
            
            $req = $bd->prepare('UPDATE port_etudiant SET VALIDE=:etat WHERE NUM=:id_user');
            
            if($_POST['etat'] == 'true'){
                $etat = 'O';
            }else{
                $etat = 'N';
            }
        
            $req->bindParam(':etat', $etat);
            $req->bindParam(':id_user', $_POST['id_user']);
            $req->execute();
            
            $response_array['response'] = "Utilisateur modifié.";   // Si ok
            $response_array['status'] = 'success';
        
        }catch(PDOException $ex){
            $response_array['response'] = "Une erreur est survenu.";   // Si erreur
            $response_array['status'] = 'error';
        }
        

        echo json_encode($response_array);
        
    //}

?>