<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="vietpro shop";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if ($conn) {
	$setLang=mysqli_query($conn,"SET NAMES 'utf8'");
}
else {
	die("Kết nối thất bại".mysqli_connect_error());
}
?>