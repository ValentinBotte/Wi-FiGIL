<?php

    include ('dumper.php');

    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"sauvegarde.sql\"");

try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => '127.0.0.1',
		'username' => 'raimon',
		'password' => 'ohngaT6ahf',
		'db_name' => 'raimon',
	));

	$world_dumper->dump('sauvegarde.sql');
    readfile("sauvegarde.sql");

} catch(Shuttle_Exception $e) {
	echo "erreur: " . $e->getMessage();
}