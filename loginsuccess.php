<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body,h1,h2,h3,h4,h5,h6,p {background-color: #DEF2F1; text-align:center; font-family: "Raleway", Arial, Helvetica, sans-serif}
    div {padding-top: 14%;}
    i:hover {
        color: #3AAFA9;    
    }
    .media {padding-top: 0;}
    .footer {padding-top: 30px;}

    #first-btn {margin-right: 20px;}

    .btn{
        background: #2B7A78;
        color: #DEF2F1;
        margin-top: 15px;
        margin-bottom: 0px;
        display: inline-block;
        box-sizing: border-box;
        position: relative;
        padding: 12px 24px;
        border: 1px solid transparent;
        border-radius: 4px;
        font-weight: 600;
        font-size: 16px;
        line-height: 100%;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
      }
      
      .btn:hover{
        background: #17252A;
      }

      a {
        color: white;
        text-decoration: none;
      }
</style>

</head>
<body>
    <div>
        <h1>Bem vindo</h1>
        <img src="usericon.png" alt="" width=25% height=15%>
        <h2><?=$_SESSION['user_name']?></h2>

        <button id="first-btn" class="btn"><a href="index.php">Página inicial</a></button>
        <button class="btn"><a href="logout.php">Logout</a></button>




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