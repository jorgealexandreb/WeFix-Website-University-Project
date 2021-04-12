<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeFix Registo</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="icon" href="images/weFixLogo.png">
</head>
<body>
    <div class="disappear">
        <a href="home.html"><img class="img-logo" src="images/weFixLogo.png" alt=""></a>
        <h1 class="title-inbox">Está a registar-se como vendedor.</h1>
    </div>
    <div class="main-container">
        <h2>Criar Conta</h2>

        <form action="" method="post">
        <p>Nome de Utilizador</p>
        <div class="form-floating">
            <input type="text" name="userName" class="form" placeholder="Nome de Utilizador">
            <label for="floatingInput"></label>
        </div>

        <p>Endereço de Email</p>
        <div class="form-floating">
            <input type="email" class="form" placeholder="Endereço de Email">
            <label for="floatingInput"></label>
            </div>

        <p>Password</p>
        <div class="form-floating">
            <input type="password" name="pass-word" class="form" placeholder="Password">
            <label for="floatingInput"></label>
        </div>


        <p>Nome</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Nome">
            <label for="floatingInput"></label>
        </div>

        <p>Sobrenome</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Sobrenome">
            <label for="floatingInput"></label>
        </div>

        <p>Número de telemovel</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Número de telemovel">
            <label for="floatingInput"></label>
        </div>

        <p>Morada</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Morada">
            <label for="floatingInput"></label>
        </div>

        <p>Código Postal</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Código Postal">
            <label for="floatingInput"></label>
        </div>

        <p>Número de Cartão de Crédito</p>
        <div class="form-floating">
            <input type="text" class="form" placeholder="Número de Cartão de Crédito">
            <label for="floatingInput"></label>
        </div>

        <p>Validade do Cartão de Crédito</p>
        <div class="form-floating">
            <input type="datetime-local" class="form" placeholder="Validade do Cartão de Crédito">
            <label for="floatingInput"></label>
        </div>

        <p>Nome da empresa</p>
        <div class="form-floating">
            <input type="datetime-local" class="form" placeholder="Nome da empresa">
            <label for="floatingInput"></label>
        </div>

        <p>NIF Pessoal</p>
        <div class="form-floating">
            <input type="datetime-local" class="form" placeholder="NIF Pessoal">
            <label for="floatingInput"></label>
        </div>

        <p>NIF da Empresa</p>
        <div class="form-floating">
            <input type="datetime-local" class="form" placeholder="NIF da Empresa">
            <label for="floatingInput"></label>
        </div>

        <button class="btn" type="submit">Registe-se</button>

        </form>
        <div class="copyright-claim">
            <p>&copy;WeFix 2021. All rights reserved.</p>
        </div>

        
    </div>

    <?php
        session_start();
            include("connection.php");
            include("function.php");

            if($_SERVER['REQUEST_METHOD']== "POST")
            {
                $user_name = $_POST['userName'];
                $password = $_POST['pass-word'];

                if(!empty($user_name) && !empty($password))
                {
                    $userID = random_num(20);
                    $query = "insert into User (userID, userName, password) values ('$userID', '$userName', '$password')";
                
                    mysqli_query($conn, $query);

                    header("Locaton: login.php");
                    die;
                }
                else
                {
                    echo "Please enter valid information!";
                }
            }
    ?>
    
</body>
</html>