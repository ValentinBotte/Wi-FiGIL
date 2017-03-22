<?php

          session_start();
    
       
          require_once('../../bd.php');
    
          $req = $bd->query('SELECT * FROM port_etudiant ORDER BY NOM');

          foreach($req->fetchAll() as $etudiant){

            if($etudiant['valide'] == "O"){ //En attente
                $etat = true;
            }else{ //Valide
                $etat = false;
            }

            echo "<tr>
                    <td>$etudiant[numGroupe]</td>
                    <td>$etudiant[nom]</td>
                    <td>$etudiant[prenom]</td>
                    <td>$etudiant[mel]</td>
                    <td>$etudiant[numexam]</td>
                    <td>" . getSwitch($etat, $etudiant['num']) . "</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes-vous sûr?\"))supprUtilisateur($etudiant[num], this)'>delete</i></td>
                  </tr>";
          }


         // Changement d'état d'un utilisateur

         function getSwitch($bool, $id){
                if($bool){
                    return "<div class=\"switch\">
                            <label>
                              N
                              <input type=\"checkbox\" onChange=\"changeEtatUtilisateur(this, $id)\" checked>
                              <span class=\"lever\"></span>
                              O
                            </label>
                          </div>";
                }else{
                    return "<div class=\"switch\">
                            <label>
                              N
                              <input type=\"checkbox\" onChange=\"changeEtatUtilisateur(this, $id)\">
                              <span class=\"lever\"></span>
                              O
                            </label>
                          </div>";
                }
          }
    
    
?>