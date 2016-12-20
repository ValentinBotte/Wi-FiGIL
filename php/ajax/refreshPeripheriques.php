<?php

    session_start();
    require_once('../bd.php');
       
       
      $req = $bd->prepare('SELECT * FROM PERIPHERIQUE WHERE NUM_USER=:id');
      $req->bindParam(':id', $_SESSION['user']['num']);
      $req->execute();    

      foreach($req->fetchAll() as $peripherique){

        echo "<tr>
                <td>$peripherique[num]</td>
                <td>$peripherique[libelle]</td>
                <td>$peripherique[mac]</td>
                <td>$peripherique[date_ajout]</td>
                <td>$peripherique[etat]</td>
                <td><i class='material-icons red900' onClick='supprPeripherique($peripherique[num], this)'>clear</i></td>
              </tr>";
      }



?>