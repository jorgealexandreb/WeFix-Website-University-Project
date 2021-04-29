<?

?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WeFix Registo</title>
        <link rel="icon" href="images/weFixLogo.png">
        <link rel="stylesheet" href="css/choosing.css">

    </head>

    <body>
        <img class="logo-container" src="images/weFixLogo.png">
        <p class="top-phrase">Já é utilizador? <a href="login.php">Entrar.</a></p>
        <br>
        <br>
        <h1 class="main-title">Registro</h1>
        <div class="main-container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="registrationclient.php" method="POST">
            <div class="seller-container">
                 <h2 class="title-div">Quero comprar!</h2>
                 <button class="btn" name="buyer" type="submit">Criar conta</button>
            </div>
            </form>
            
            <form action="registration.php">
            <div class="buyer-container">
                <h2 class="title-div">Quero vender!</h2>
                <button class="btn" name="seller" type="submit">Criar conta</button>
            </div>
            </form>
            
        </div>
        <div class="footer">
            <p>&copy;WeFix 2021. All rights reserved.</p>
        </div>
        
    </body>

</html>