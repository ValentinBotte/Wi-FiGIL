<?php
    session_start();

    require_once('../bd.php');
    header('Content-type: application/json');

    if(checkMac($_POST['mac'])){
        try{
            $req = $bd->prepare('INSERT INTO PERIPHERIQUE (num, num_user, libelle, mac, date_ajout, etat) VALUES (null, :id_user, :libelle, :mac, null, 0)');
            $req->bindParam(':id_user' , $_SESSION['user']['num']);
            $req->bindParam(':libelle', $_POST['libelle']);
            $req->bindParam(':mac', convertMac($_POST['mac']));

            $req->execute();
        
            $response_array['response'] = "Périphérique ajouté.";   // Si ok
            $response_array['status'] = 'success';
      
        }catch(PDOException $e){
            $response_array['response'] = "Une erreur est survenu.";   // Si erreur
            $response_array['status'] = 'error';
        }
    }else{
          $response_array['response'] = "Adresse MAC invalide.";   // Si erreur
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