<!DOCTYPE html>
<html>
<title>Search Results</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}  
</style>

<body>
<?php
include "menu.php";
?>


<br>
<br>
<br>
<div class="container" >
    <div class="searchHome">
      <h2>Resolva seus problemas em instantes! Procure um dos nossos profissionais e agende o serviço em minutos!</h2>
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
    <h3> Quem somos?</h3>
    <p> A WeFix é uma plataforma online que permite ligar facilmente clientes a prestadores de serviços.
      Nunca mais terá problema em encontrar um profissional de confiança, de forma simples e eficaz!
      Contamos com uma rede de profissionais de Norte a Sul do país, que primam pela qualidade nos seus serviços. <p>
    <br>
    
  </div>
</div>
<br>
<div class="aboutUs">
  <div class="infoUs">
    <br>
    <br>
    <h3> Os Nossos Valores</h3>
    <br>
    <table border=solid align=center>
      <tr>
        <th style=>INICIATIVA</th>
        <th>TRANSPARÊNCIA</th>
      </tr>
      <tr>
        <th>SIMPLICIDADE</th>
        <th>QUALIDADE</th>
      </tr>
    </table>
  </div>
</div>
<br>

<?php
    include "footer.php";
?>


