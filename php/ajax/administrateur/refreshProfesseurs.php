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
                    <td>$professeur[nom]</td>
                    <td>$professeur[prenom]</td>
                    <td>$professeur[mel]</td>
                    <td>$niveau</td>
                    <td>" . getSwitch($etat, $professeur['num']) . "</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes-vous sûr?\"))supprProfesseur($professeur[num], this)'>delete</i></td>
                  </tr>";
          }

    function getSwitch($bool, $id){
        if($bool){
            return "<div class=\"switch\">
                                <label>
                                  N
                                  <input type=\"checkbox\" onChange=\"changeEtatProfesseur(this, $id)\" checked>
                                  <span class=\"lever\"></span>
                                  O
                                </label>
                              </div>";
        }else{
            return "<div class=\"switch\">
                                <label>
                                  N
                                  <input type=\"checkbox\" onChange=\"changeEtatProfesseur(this, $id)\">
                                  <span class=\"lever\"></span>
                                  O
                                </label>
                              </div>";
        }
    }
    //}

?>