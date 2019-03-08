<?php

function doDB() {
	global $con;
$servername = "localhost";
$username = "root";
$password = "";
$db = "se_project";


$con = mysqli_connect($servername, $username, $password, $db) or die("Connection Failed");
}

?>
