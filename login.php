<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeFix Sign Up</title>
    <link rel="icon" href="images/weFixLogo.png">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">

        <main class="form-signin">
          <p class="top-phrase">Ainda não é utilizador? <a href="home.php">Registe-se.</a></p>
          <form action="auth.php" method="post">
          <img src='images/weFixLogo.png' alt='photo'>

            <h1 class="fw-normal">Entrar</h1>

            
            <p>
            <?php
                $message = "Insira o seu nome de utilizador e password";
                echo $message;
            ?>
            </p>
          
            <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Nome de Utilizador">
            <label for="floatingInput"></label>
            </div>
            <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword"></label>
            </div>

            <div class="checkbox">
            <label>
                <input type="checkbox"> Lembrar dos meus dados
            </label>

         
            </div>
            <button class="btn" type="submit">Entrar</button>
            <br>
            <br>
            <a href="">Esqueceu-se da Password?</a>

        
        </form>

      
            <footer class="final-part"><p>&copy;WeFix 2021. All rights reserved.</p></footer>

        </main>
  
  </body>
</html>

