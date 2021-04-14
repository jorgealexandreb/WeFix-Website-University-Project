<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>WeFix Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}  
</style>

<body class="home">
<div class="navigation">    
  <img class="logo-container" src="images/weFixLogo.png"> </img>  
  <?php
        if(!$_SESSION['user_name']){
            echo '<label class="top-phrase">Já é utilizador? <a href="">Entrar </a>ou<a href=""> Registrar</a></label>';
        } else{
           echo '<label class="top-phrase">Olá '.$_SESSION['user_name'] .'! <a href="">Conta </a>ou<a href="logout.php"> Logout</a></label>';
        }
    ?>
</div> 

<br>
<br>
<br>

<div class="container" >
    <div class="searchHome">
      <h2>Resolva seus problemas em instantes! Busque um de nossos profissionais e agende o serviço em minutos!</h2>
          <label>Search for services!</label>
          <br>
          <br>
          <form action="searchResults.php" method="GET" enctype="multipart/form-data">
            <input class="searchBox" name="search" type="text" placeholder="Digite aqui..."> </input>  
            <input class="button" name="submit" type="submit" value="Buscar"></input>
          </form>    
          
    </div>
</div>

<div class="aboutUs">
  <div class="infoUs">
    <img class="mainPoints" src="images/light.jpg"> </img>
    <br>
    <br>
    <h4> Voce está buscando por um serviço -  ...</h4>
    <br>
    <p> Conectando com nossos profissionais - ...</p>
    <br>
    <p> Agendamento de serviço sem dor de cabeça - ...</p>
  </div>
</div>

<div class="footer">
  <p>&copy;WeFix 2021. All rights reserved. </p>
  <p>Find us on</p>
  <div class="media ">
    <i class="fa fa-facebook-official "></i>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-snapchat "></i>
    <i class="fa fa-pinterest-p"></i>
    <i class="fa fa-twitter "></i>
    <i class="fa fa-linkedin "></i>
    </div>
</div>

</body>
</html>
