<?php
session_start();
require_once('../../bd.php');
$req = $bd->query('SELECT peripherique.num, numGroupe, libelle, mac, date_ajout, nom, prenom FROM `peripherique` INNER JOIN port_etudiant ON peripherique.num_user = port_etudiant.num WHERE ETAT = 0 ORDER BY date_ajout');
foreach($req->fetchAll() as $peripherique) {
    echo "<tr>
                    <td>$peripherique[nom]</td>
                    <td>$peripherique[prenom]</td>
                    <td>$peripherique[libelle]</td>
                    <td>$peripherique[mac]</td>
                    <td>$peripherique[date_ajout]</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes - vous sûr ? \"))supprPeripherique($peripherique[num], \"$peripherique[nom]\", \"$peripherique[mac]\", \"$peripherique[prenom]\", this)'>delete</i></td>
                    <td><i class='material-icons btn-flat ' onClick='if(confirm(\"êtes - vous sûr ? \"))validePeripherique($peripherique[num], \"$peripherique[nom]\", \"$peripherique[mac]\", \"$peripherique[prenom]\", this)'>add</i></td>
                    <td><a class='waves-effect waves-light btn modal-trigger' onClick='openModal($peripherique[num], \"$peripherique[mac]\", \"$peripherique[nom]\", \"$peripherique[prenom]\", $peripherique[numGroupe])'>COMMANDES</a></td>
                  </tr>";
}
$req = $bd->query('SELECT peripherique.num, libelle, mac, date_ajout, nom, prenom FROM `peripherique` INNER JOIN port_professeur ON peripherique.num_prof = port_professeur.num WHERE ETAT = 0 ORDER BY date_ajout');
foreach($req->fetchAll() as $peripherique) {
    echo "<tr>
                    <td>$peripherique[nom]</td>
                    <td>$peripherique[prenom]</td>
                    <td>$peripherique[libelle]</td>
                    <td>$peripherique[mac]</td>
                    <td>$peripherique[date_ajout]</td>
                    <td><i class='material-icons red900' onClick='if(confirm(\"êtes - vous sûr ? \"))supprPeripherique($peripherique[num], \"$peripherique[nom]\", \"$peripherique[mac]\", \"$peripherique[prenom]\", this)'>delete</i></td>
                    <td><i class='material-icons btn-flat ' onClick='if(confirm(\"êtes - vous sûr ? \"))validePeripherique($peripherique[num], \"$peripherique[nom]\", \"$peripherique[mac]\", \"$peripherique[prenom]\", this)'>add</i></td>
                    <td><a class='waves-effect waves-light btn modal-trigger' onClick='openModal2($peripherique[num], \"$peripherique[mac]\", \"$peripherique[nom]\", \"$peripherique[prenom]\")'>COMMANDES</a></td>
                  </tr>";
}
?>