<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>
    <?php
        if(!$_SESSION['user_name']){
            echo "You're not logged in";
        } else{
            header("Location: choosing.php");
        }
    ?>
    </h1>
</body>
</html>