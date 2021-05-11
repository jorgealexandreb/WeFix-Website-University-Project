<?php  


$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "pdsoft1";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

#if (!$conn) {
#	echo "Connection failed!";
#	exit();
#}else{
#	echo("You are connected!");
#}