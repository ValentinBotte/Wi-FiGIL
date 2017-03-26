<?php

    session_start();

    //if($_SESSION['grade'] == 2){
        
          require_once('../../bd.php');

          $req = $bd->query('SELECT * FROM historique ORDER BY date_historique');

          foreach($req->fetchAll() as $historique){

            echo "<tr>
                    <td>$historique[nom]</td>
                    <td>$historique[prenom]</td>
                    <td>$historique[mac]</td>
                    <td>$historique[date_historique]</td>
                    <td>$historique[libelle]</td>
                  </tr>";
          }
    //}

?>