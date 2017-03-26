<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        $dateNow = date("Y-m-d H:i:s");
        if($_SESSION['grade'] == 0){
            $sql = 'DELETE FROM peripherique WHERE NUM=:id AND NUM_USER=:id_user';
        }else{
            $sql = 'DELETE FROM peripherique WHERE NUM=:id AND NUM_PROF=:id_user';
        }
        
        $req = $bd->prepare($sql);
        $req->bindParam(':id', $_POST['id']);
        $req->bindParam(':id_user' , $_SESSION['user']['num']);

        $req->execute();

        $sql = 'INSERT INTO historique (id, nom, prenom, mac, date_historique, libelle) VALUES (null, :nom, :prenom, :mac, :dateNow, "supprimer")';
        $req = $bd->prepare($sql);
        $convert = convertMac($_POST['mac']);
        $req->bindParam(':nom', $_SESSION['user']['nom']);
        $req->bindParam(':prenom', $_SESSION['user']['prenom']);
        $req->bindParam(':mac', $convert);
        $req->bindParam(':dateNow', $dateNow);
        $req->execute();
        $response_array['response'] = "Périphérique supprimé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

    function convertMac($mac){
        $newmac = preg_replace("#[:-]#",'',$mac);
        return strtolower($newmac);
    }
?>