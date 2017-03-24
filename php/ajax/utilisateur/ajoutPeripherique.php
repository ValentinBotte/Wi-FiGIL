<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');

    if(checkMac($_POST['mac'])){
        try{
            $dateNow = date("Y-m-d");
            if($_SESSION['grade'] == 0){
                $sql = 'INSERT INTO peripherique (num, num_user, num_prof, libelle, mac, date_ajout, etat) VALUES (null, :id_user, null, :libelle, :mac, :dateNow, 0)';
                $param = ':id_user';
            }else{
                $sql = 'INSERT INTO peripherique (num, num_user, num_prof, libelle, mac, date_ajout, etat) VALUES (null, null, :id_prof, :libelle, :mac, :dateNow, 0)';
                $param = ':id_prof';
            }
            $convert = convertMac($_POST['mac']);
            $req = $bd->prepare($sql);
            $req->bindParam($param, $_SESSION['user']['num']);
            $req->bindParam(':libelle', $_POST['libelle']);
            $req->bindParam(':mac', $convert);
            $req->bindParam(':dateNow', $dateNow);

            $req->execute();

            $messageAdmin = "Bonjour,\n\n Vous avez reçu une nouvelle demande d'accès aux bornes Wi-Fi envoyé par : ".$_SESSION['user']['nom']." ".$_SESSION['user']['prenom'] ." le ".date("Y-m-d");
            mail("valentin.botte@outlook.fr","Ajout peripherique",$messageAdmin);
            $messageUtilisateur = "Bonjour ".$_SESSION['user']['prenom']." ,\n\nNous vous confirmons que vous avez effectué une demande d'accès aux bornes Wi-Fi du BTS SIO.\nRappel de vos informations :\n\nNom : ".$_SESSION['user']['nom']." \nPrénom : ".$_SESSION['user']['prenom']." \nEmail : ".$_SESSION['user']['mel']." \nGroupe d'utilisateur : ".$_SESSION['user']['numGroupe']." \nAdresse MAC : ".$_POST['mac']." \n\nDès lors que votre demande sera traité, vous recevrez un email de confirmation avec les informations de connexion.\nCordialement.";
            mail($_SESSION['user']['mel'],"Ajout peripherique",$messageUtilisateur);
            $response_array['response'] = 'Périphérique ajouté.';   // Si ok
            $response_array['status'] = 'success';


        }catch(PDOException $e){
            $response_array['response'] = 'Une erreur est survenu.';   // Si erreur
            $response_array['status'] = 'error';
        }
    }else{
          $response_array['response'] = 'Adresse MAC invalide.';   // Si erreur
            $response_array['status'] = 'error';
    }

    echo json_encode($response_array);

    function checkMac($mac){
        if(preg_match("#^([0-9a-fA-F]{2}[:-]){5}[0-9a-fA-F]{2}$#", $mac)){
            return true;
        }else{
            return false;
        }
    }

     function convertMac($mac){
        $newmac = preg_replace("#[:-]#",'',$mac);
        return strtolower($newmac);
     }
 
    

?>