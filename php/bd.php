<?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=acceswifi', 'root', 'root');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}