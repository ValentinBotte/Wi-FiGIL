<?php

    session_start();
    require_once('../../bd.php');
    

    // Connexion
        
    if($_SESSION['grade'] == 0){
        $sql = 'SELECT * FROM peripherique WHERE NUM_USER=:id ORDER BY ETAT DESC';
    }else{
        $sql = 'SELECT * FROM peripherique WHERE NUM_PROF=:id ORDER BY ETAT DESC';
    }

    $req = $bd->prepare($sql);
    $req->bindParam(':id', $_SESSION['user']['num']);
    $req->execute();   


      foreach($req->fetchAll() as $peripherique){

        if($peripherique['etat'] == 1){ //En attente
            $etat = '<i class="material-icons">done</i>';
        }else{ //Valide
            $etat = '<i class="material-icons">hourglass_empty</i>';
        }
          
        echo "<tr>
                <td>$peripherique[libelle]</td>
                <td>$peripherique[mac]</td>
                <td>$peripherique[date_ajout]</td>
                <td>$etat</td>
                <td><i class='material-icons red900' onClick='if(confirm(\"êtes-vous sûr?\"))supprPeripherique($peripherique[num], \"$peripherique[mac]\", this)'>delete</i></td>
              </tr>";
      }


?>