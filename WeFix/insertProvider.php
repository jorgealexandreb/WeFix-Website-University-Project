<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli('localhost', 'root', '', 'pdsoft1');


$username = "'". $_POST["username"]. "'";
$mail = "'" . $_POST["email"]. "'";
$password = $_POST["password"];
$fName = "'". $_POST["firstName"]."'";
$lName = "'". $_POST["lastName"]."'";
$phone = $_POST["phone"];
$city = "'".$_POST["city"]."'";
$address = "'".$_POST["address"]."'";
$postalCode = $_POST["postalCode"];
$cc = $_POST["cc"];
$ccval = $_POST["ccval"];
$nif = $_POST["nif"];
$companyName = "'".$_POST["companyName"]."'";
$companyNif = $_POST["companyNif"];
$userType = 1;
$accAtive = 0;

$ccval = new DateTime($ccval);
$ccval = $ccval->format('Y-m-d');
$ccval = "'".$ccval."'";
echo $ccval."<br>";



if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection failed");
} else {
    $query = "SELECT MAX(userID) FROM user"; 
    $result = mysqli_query($conn,  $query);
    $row = mysqli_fetch_row($result);
    $row = $row[0]+1;
    echo $row . "<br>";
    $sql0 = "INSERT INTO user(username, firstName, lastName, userType, phone, email, password, accActive, personalNIF) VALUES($username, $fName, $lName, $userType, $phone, $mail, $password, $accAtive, $nif); ";
    $sql0 = $sql0 ." INSERT INTO userlocation(userID, addresss, city, postal_code ) VALUES($row, $address, $city, $postalCode);"; 
    $sql0 = $sql0 . " INSERT INTO `Restricted Info`(userID, creditCard, billingAddress, cardExp) VALUES($row, $cc, $address, $ccval);";
    $sql0 = $sql0 . " INSERT INTO `Service Provider`(userID, companyNIF, companyName) VALUES($row, $companyNif, $companyName);";
    if(mysqli_multi_query($conn, $sql0)){
        echo $row . "<>br". $sql0;
    }
    else{
        echo "Error: ".$sql0. "<br> ".mysqli_error($conn);
    }
    
 
   
}
    
    
        
    header("Location: registsucess.php");
  

?>