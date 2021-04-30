<?php 
    include 'randomnr.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pdsoft";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT Price.pricePerHr FROM Price INNER JOIN Service ON Price.serviceID = Service.serviceID WHERE Price.serviceID = '".$data-id."';";
    $resultone = $conn->query($sql);

    $sqltwo = "SELECT `name` FROM `Service` WHERE `Service`.id='".$data-id."'";
    $resultstwo = $conn->query($sqltwo);

    $sqlthree = "SELECT companyName from `Service Provider` INNER JOIN Service on `Service Provider`.serviceID=Service.serviceID where Service.serviceID='".$data-id."';";
    $resultsthree = $conn->query($sqlthree);

    $sqlfour = "SELECT locomotionPrice FROM Service WHERE serviceID='".$data-id."';"
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirme o seu pedido.</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <style>

        body {
            font-family: "Raleway", Arial, Helvetica, sans-serif;
            background-color: #FFFFFF;
            margin: 0px;
        }

        .cont-one {
            position: absolute;
            color: white;
            background-color: #3AAFA9;
            width:600px;
            height: 350px;
            margin-left: 22%;
            border: 5px solid;
            border-color: #17252A;
            padding: 10px;
            margin-top: 28px;
            margin-bottom: 28px;
            border-radius: 50px;
        }

        .cont-one:hover {
            position: absolute;
            color: white;
            background-color: #3AAFA9;
            width:600px;
            height: 350px;
            margin-left: 22%;
            border: 7px solid;
            border-color: #17252A;
            padding: 10px;
            margin-top: 28px;
            margin-bottom: 28px;
            border-radius: 50px;
        }

        .cont-two {
            background-color:#FFFFFF;
            width: 400px;
            height: 350px;
            margin-left: 67%;
            padding: 10px;
            margin-top: 28px;
            margin-bottom: 28px;
        }

        a {
            text-decoration: none;
            color: white;
        }


        p {
            font-size: 20px;
            margin-right: 0px;
            margin-left: 50px;
        }

        .logo{
            width: 16%;
            height: 10%;
            margin-top: 23px;
            margin-left: 23px;
        }

        .btn{
            background: #2B7A78;
            color: #DEF2F1;
            margin-top: 15px;
            margin-left: 20px;
            margin-right: 20px;

            position: relative;
            padding: 12px 24px;
            border: 1px solid;
            border-color:#17252A;
            border-radius: 200px;
            font-weight: 600;
            font-size: 16px;
            line-height: 100%;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
          }
          
          .btn:hover{
            background: #17252A;
            border: 3px solid;
            border-color:#2B7A78;
          }

          .btone {
            margin-left: 33%;
          }

          .big-title {
              position: absolute;
              left: 25%;
              margin: 0px;
              margin-top: 100px;
              font-size: 45px;
          }

          .cont-three {
              position: absolute;
              width: 95%;
              height: 80%;
              top: 10%;
              left: 20px;
          }

          .hthree { 
              font-size: 25px;
          }

          .footer {

              position: absolute;
              height: 25%;
              bottom: 45%;
              left: 2%;
              width: 18%;
          }

          .media {
              text-align: center;
          }
        i:hover { 
              color: #3AAFA9;
          }


    </style>


    <body>
        
        <h1 class="big-title">Confirme o seu pedido.</h1>
        <a href="home.php"><img class="logo" src="images/weFixLogo.jpg" alt=""></a>
        <div class="cont-one">
           <div class="cont-three">

                <h3 class="hthree"><?php
                    if ($resultstwo->num_rows > 0) {
                        // output data of each row
                        while($lll = $resultstwo->fetch_assoc()) {
                        echo  $lll["name"];
                        }
                    } else {
                        echo "0 results";
                    } ?></h3>

                <h3 class="hthree">Provedor do serviço: <?php
                    if ($resultsthree->num_rows > 0) {
                        // output data of each row
                        while($sss = $resultsthree->fetch_assoc()) {
                        echo  $sss["companyName"];
                        }
                    } else {
                        echo "0 results";
                    } ?></h3>

                <h3 class="hthree">Preço p/ hora:      <?php
                    if ($resultone->num_rows > 0) {
                        // output data of each row
                        while($row = $resultone->fetch_assoc()) {
                        echo  $row["pricePerHr"];
                        }
                    } else {
                        echo "0 results";
                    } ?> €</h3>
                <h3 class="hthree">Preço de deslocação: </h3>
            </div>
        </div>

        <div class="cont-two">
            <br><br><br><br><br>
          
            <p>O número do seu pedido será: <br> <?php randomgenerator(); ?> <br></p>
        </div>

        <div class="footer">
            <p>&copy;WeFix 2021. All rights reserved. </p>
            <p>Find us on</p>
            <div class="media">
            <i class="fa fa-facebook-official "></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-snapchat "></i>
            <i class="fa fa-pinterest-p"></i>
            <i class="fa fa-twitter "></i>
            <i class="fa fa-linkedin "></i>
            </div>

        </div>

        <button class="btn btone"><a href="home.php">Cancele o pedido</a></button>
        <button class="btn bttwo"><a href="ordercompleted.php">Confirmar pedido</a></button>
          <?php echo $result;?>

      
    </body>

</html>