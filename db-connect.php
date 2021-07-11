<?php
require_once __DIR__.'/config.php';  


$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if (!$mysqli) {

	die("Check Connection".mysql_error());

}

?>