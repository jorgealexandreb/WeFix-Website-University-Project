<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>WeFix Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}  
</style>

<body>
<div class="navigation">    
  <img class="logo-container" src="images/weFixLogo.png"> </img>  
  <div class="topnav" >
  <a href="home.php">Home</a>
  <a href="searchResults.php">Pesquisa</a>
  <a href="expressService.php">Serviço de Urgência </a>
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {        
      echo '<a href="userprofile.php">A Minha Conta</a>';      
    }
    else{
      echo '<a href="login.php">Entrar/Registar</a>';
    }
  ?> 
  </div>

  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {        
      echo '<label class="top-phrase">Olá '.$_SESSION['user_name'] .'! <a href="logout.php"> Logout</a></label>';    
    }?>
</div>




</body>
</html>
