<?php

session_start();


require_once('../../bd.php');

$req = $bd->query('SELECT peripherique.num, libelle, mac, date_ajout, nom, prenom FROM peripherique INNER JOIN port_etudiant ON peripherique.num_user = port_etudiant.num WHERE ETAT = 1 ORDER BY NOM');

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

$req = $bd->query('SELECT peripherique.num, libelle, mac, date_ajout, nom, prenom FROM peripherique INNER JOIN port_professeur ON peripherique.num_prof = port_professeur.num WHERE ETAT = 1 ORDER BY NOM');

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