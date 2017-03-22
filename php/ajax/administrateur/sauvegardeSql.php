<?php

$DBUSER="root";
$DBPASSWD="";
$DATABASE="acceswifi";

$filename = "backup-" . date("d-m-Y") . ".sql";
$mime = "application/x-gzip";

header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

$cmd = 'c:\xampp\mysql\bin\mysqldump -u '.$DBUSER.' -p '.$DBPASSWD.' '.$DATABASE.' | gzip --best';
exec( $cmd );

?>