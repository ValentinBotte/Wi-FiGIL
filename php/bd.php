<?php

    require_once('config.php');

    try {
        $bd = new PDO($host . ';dbname=' . $nomBase, $ndc, $mdp);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

?>