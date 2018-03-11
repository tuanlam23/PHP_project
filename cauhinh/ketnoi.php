<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="vietpro shop";

$conn=mysqli_connect($dbHost, $dbUser,$dbPass,$dbName);
mysqli_set_charset($conn, 'UTF8');
if($conn){
	$setLang=mysqli_query($conn," SET NAMES 'utf8");
}
else {
	die("KET NOT THAT BAI".mysqli_connect_error());
}




?>