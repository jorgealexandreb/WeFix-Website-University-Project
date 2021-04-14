<?php
 
$conn = new mysqli('localhost', 'root', '', 'pdsoft');

$username = $_POST["username"];
$mail = $_POST["email"];
$password = $_POST["password"];
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$phone = $_POST["phone"];
$city = $_POST["city"];
$address = $_POST["address"];
$postalCode = $_POST["postalCode"];
$cc = $_POST["cc"];
$ccval = $_POST["ccval"];
$nif = $_POST["nif"];


if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection failed");
} else {
    $stmt = $conn->prepare("INSERT INTO User(userName, firstName, lastName, phone, email, password, city, adress, poscode, cc, ccval, nif) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt ->bind_param("ssssssssssss", $username, $fName, $lName, $phone, $mail, $password, $city, $address, $postalCode, $cc, $ccval, $nif);
    $execval = $stmt->execute();
    echo $execval;
    $stmt.close();
    $conn.close();
}
?>