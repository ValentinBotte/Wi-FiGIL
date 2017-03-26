<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        $dateNow = date("Y-m-d H:i:s");
        $req = $bd->prepare("UPDATE peripherique SET ETAT = 1 WHERE NUM=:id_peripherique");
        $req->bindParam(':id_peripherique' , $_POST['id']);

        $req->execute();

        $sql = 'INSERT INTO historique (id, nom, prenom, mac, date_historique, libelle) VALUES (null, :nom, :prenom, :mac, :dateNow, "demande validée")';
        $req = $bd->prepare($sql);
        $req->bindParam(':nom', $_POST['mac']);
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':mac', $_POST['nom']);
        $req->bindParam(':dateNow', $dateNow);
        $req->execute();

        $secureKey = "WPA2-PSK(AES)";
        $ssid = "SIOSIOSIO";
        $mdp = "2016-BONA-SIO";

        $messageAdmin="Bonjour,\n\n Vous avez activé l'accès aux bornes Wi-Fi de ".$_SESSION['user']['nom']." ".$_SESSION['user']['prenom']." le ".date("Y-m-d");
        mail("valentin.botte@outlook.fr","Validation peripherique",$messageAdmin);
        $messageUtilisateur="Bonjour ".$_SESSION['user']['prenom'].",\n\nVotre demande d'accès aux bornes Wi-Fi a été validé.\nVous pouvez vous connecter en utilisant les informations ci dessous :\n\n- $secureKey\n- SSID (non diffusé) : $ssid\n- Passphrase : $mdp\n\nCordialement";
        mail("valentin.botte@outlook.fr","Validation peripherique",$messageUtilisateur);
        $response_array['response'] = "Peripherique validé.";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>