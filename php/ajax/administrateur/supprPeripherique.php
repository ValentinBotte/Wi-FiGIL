<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        $dateNow = date("Y-m-d H:i:s");
        $req = $bd->prepare("DELETE FROM peripherique WHERE NUM=:id_peripherique");
        $req->bindParam(':id_peripherique' , $_POST['id']);

        $req->execute();

        $sql = 'INSERT INTO historique (id, nom, prenom, mac, date_historique, libelle) VALUES (null, :nom, :prenom, :mac, :dateNow, "supprimer")';
        $req = $bd->prepare($sql);
        $req->bindParam(':nom', $_POST['mac']);
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':mac', $_POST['nom']);
        $req->bindParam(':dateNow', $dateNow);
        $req->execute();
        
        $response_array['response'] = "Peripherique supprimé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>