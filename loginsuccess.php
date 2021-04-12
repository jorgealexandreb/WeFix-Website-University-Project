<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/loginsucess.css" rel="stylesheet">
</head>
<body>
    <h1>Bem vindo.</h1>
    <i class="fas fa-user"></i>
    <p><?=$_SESSION['user_name']?></p>
    
</body>
</html>