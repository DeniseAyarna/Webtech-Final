<?php
require("database_credentials.php");

$connect = new mysqli(SERVERNAME,USERNAME,PASSWORD,DATABASE);
if($connect -> connect_error){
	die("connection failed".$connect -> connect_error);	
}

?>
