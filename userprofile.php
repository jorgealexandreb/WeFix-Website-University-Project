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

  <div class="title"><h1>Informação pessoal</h1></div>
  <img class="pi-img" src="images/personalinfo.png" alt="">

  <div class="info-container"><h1></h1>
  
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      include "db_conn.php";

      $user_name = $_SESSION['user_name'];
      $query = "SELECT userType FROM user WHERE userName = '".$user_name."'"; 
      $result = mysqli_query($conn,  $query);
      $userType = mysqli_fetch_row($result);
      $userType = $userType[0];
      #echo $userID;
      
      echo "Welcome to the member's area, " . $user_name . "!";
    
      if($userType==0){
          $sql = "SELECT firstName, lastName, phone, email, personalNIF 
          FROM user
          WHERE userName = '".$user_name."'";
          $result = $conn->query($sql);     
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {  
            echo "<h3> Nome: " . $row["firstName"]. " </p>
            <p>Sobrenome: " . $row["lastName"]. "</p>
            <p> Número de telemovel: " . $row["phone"]. "</p>
            <p> E-mail: " . $row["email"]. "</p>
            <p> NIF Pessoal: " . $row["personalNIF"]. "</p>";
            }
          }
          else {
            echo "Error: ".$sql. "<br> ".mysqli_error($conn);
          }
      }else{
        $query2 = "SELECT userID FROM user WHERE userName = '".$user_name."'"; 
        $result = mysqli_query($conn,  $query2);
        $userID = mysqli_fetch_row($result);
        $userID = $userID[0];
        $sql = "SELECT user.firstName, user.lastName, user.phone, user.email, user.personalNIF, `Service Provider`.companyName, `Service Provider`.companyNIF FROM user INNER JOIN `Service Provider` ON user.userID=`Service Provider`.`userID` where user.userID= ".$userID;
        $result = $conn->query($sql);     
        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {  
          echo "<h3> Nome: " . $row["firstName"]. " </p>
          <p>Sobrenome: " . $row["lastName"]. "</p>
          <p> Número de telemovel: " . $row["phone"]. "</p>
          <p> E-mail: " . $row["email"]. "</p>
          <p> Nome da empresa: " . $row["companyName"]. "</p>
          <p> NIF da Empresa: " . $row["companyNIF"]. "</p>";
          }
        }
        else {
          echo "Error: ".$sql. "<br> ".mysqli_error($conn);
        }
      }   
    }else {
      echo "Please log in first to see this page.";
    }
              
    ?>
  
  
  </div>

</body>
</html>