<?php

require_once "Database.php";

$db = new Database();
echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if( !$db->isConnected() ){
	echo $db->getError();
	die("Unable to connect to DB");
}

/*$db->query("SELECT * FROM admin_tb");
var_dump( $db->resultset() );
echo "Rows: " . $db->rowCount();
var_dump( $db->single() );

$db->query("SELECT * FROM admin_tb where id = :id");
$db->bind(':id', 1);
var_dump( $db->single() );*/
