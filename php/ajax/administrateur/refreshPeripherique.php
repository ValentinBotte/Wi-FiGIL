<?php

session_start();


require_once('../../bd.php');

$req = $bd->query('SELECT peripherique.num, libelle, mac, date_ajout, nom, prenom FROM PERIPHERIQUE INNER JOIN port_etudiant ON PERIPHERIQUE.num_user = port_etudiant.num WHERE ETAT = 0 ORDER BY NOM');

foreach($req->fetchAll() as $peripherique) {


    echo "<tr>
                    <td>$peripherique[nom]</td>
                    <td>$peripherique[prenom]</td>
                    <td>$peripherique[libelle]</td>
                    <td>$peripherique[mac]</td>
                    <td>$peripherique[date_ajout]</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes - vous sûr ? \"))supprPeripherique($peripherique[num], this)'>delete</i></td>
                    <td><i class='material-icons' onClick='if(confirm(\"êtes - vous sûr ? \"))validePeripherique($peripherique[num], this)'>done</i></td>
                    <td><a class='waves-effect waves-light btn modal-trigger' href=\"#modal1\">Modal</a></td>
                  </tr>";

}

$req = $bd->query('SELECT peripherique.num, libelle, mac, date_ajout, nom, prenom FROM PERIPHERIQUE INNER JOIN port_professeur ON PERIPHERIQUE.num_prof = port_professeur.num WHERE ETAT = 0 ORDER BY NOM');

foreach($req->fetchAll() as $peripherique) {


    echo "<tr>
                    <td>$peripherique[nom]</td>
                    <td>$peripherique[prenom]</td>
                    <td>$peripherique[libelle]</td>
                    <td>$peripherique[mac]</td>
                    <td>$peripherique[date_ajout]</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes - vous sûr ? \"))supprPeripherique($peripherique[num], this)'>delete</i></td>
                  </tr>";

}


?>