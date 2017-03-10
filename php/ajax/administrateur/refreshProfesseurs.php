<?php

    session_start();

    //if($_SESSION['grade'] == 2){
        
          require_once('../../bd.php');

          $req = $bd->query('SELECT * FROM port_professeur ORDER BY NOM');    

          foreach($req->fetchAll() as $professeur){

            if($professeur['valide'] == "O"){ //En attente
                $etat = '<i class="material-icons">done</i>';
            }else{ //Valide
                $etat = '<i class="material-icons">hourglass_empty</i>';
            }

            if($professeur['niveau'] == 1){
                $niveau = 'ADMIN';
            }else{
                $niveau = 'PROF';
            }

            echo "<tr>
                    <td>$professeur[num]</td>
                    <td>$professeur[nom]</td>
                    <td>$professeur[prenom]</td>
                    <td>$professeur[mel]</td>
                    <td>$niveau</td>
                    <td>$etat</td>
                    <td></td>
                  </tr>";
          }

    //}

?>