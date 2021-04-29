<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O seu perfil</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="top-container"><h1 class="uwu">Bem vindo ao seu perfil!</h1>
    <p class="backmain">Olá <?php echo $_SESSION['user_name']?>! <a href="home.php">Página inicial.</a> <a href="logout.php">Logout.</a></p>
    <a href="home.php"><img class="logo-top" src="images/weFixLogo.png" alt=""></a>
    </div>

    <div class="side-container">

        <nav>
            <ul>
              <li>
                <a href="userprofile.php">Informação</a>
                <span></span><span></span><span></span><span></span>
              </li>
              <li>
                <a href="payinfo.php">Pagamento</a>
                <span></span><span></span><span></span><span></span>
              </li>
              <li>
                <a href="location.php">Localização</a>
                <span></span><span></span><span></span><span></span>
              </li>
              <li>
                <a href="security.php">Privacidade</a>
                <span></span><span></span><span></span><span></span>
              </li>
            </ul>
          </nav>

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
    </div>

    <div class="title"><h1>Informação de pagamento</h1></div>
    <img class="pi-img" src="images/payment.png" alt="">

    <div class="info-container">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      include "db_conn.php";
      $user_name = $_SESSION['user_name'];
      $query = "SELECT userID FROM user WHERE userName = '".$user_name."'"; 
      $result = mysqli_query($conn,  $query);
      $userID = mysqli_fetch_row($result);
      $userID = $userID[0];
      #echo $userID;
      $sql = "SELECT creditCard, billingAddress, cardExp 
      FROM `Restricted Info`
      WHERE userID = ".$userID;
      $result = $conn->query($sql);     
      if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {  
        echo "<h3> Número de Cartão de Crédito: " . $row["creditCard"]. " </p>
        <p>Morada: " . $row["billingAddress"]. "</p>
        <p> Validade do Cartão de Crédito: " . $row["cardExp"]. "</p>";
        
        }
      }
      else {
        echo "Error: ".$sql0. "<br> ".mysqli_error($conn);;
      }
      
    }else {
      echo "Please log in first to see this page.";
  }
              
    ?>      



    </div>


</body>
</html>