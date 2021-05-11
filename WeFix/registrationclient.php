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
    <a href="home.php"><img class="img-logo" src="images/weFixLogo.png" alt=""> </a>
        <h1 class="title-inbox">Está a registar-se como Cliente.</h1>
    </div>
    <div class="main-container">
        <h2>Criar Conta</h2>

        <form action="insertclient.php" method="post">
        <p>Nome de Utilizador</p>
        <div class="form-floating">
            <input type="text" class="form" name="username" placeholder="Nome de Utilizador" required>
            <label for="floatingInput"></label>
        </div>

        <p>Endereço de Email</p>
        <div class="form-floating">
            <input type="email" class="form" name="email" placeholder="Endereço de Email" required>
            <label for="floatingInput"></label>
            </div>

        <p>Password</p>
        <div class="form-floating">
            <input type="password" class="form" name="password" placeholder="Password" required>
            <label for="floatingInput"></label>
        </div>


        <p>Nome</p>
        <div class="form-floating">
            <input type="text" class="form" name="firstName" placeholder="Nome" required>
            <label for="floatingInput"></label>
        </div>

        <p>Sobrenome</p>
        <div class="form-floating">
            <input type="text" class="form" name="lastName" placeholder="Sobrenome" required>
            <label for="floatingInput"></label>
        </div>

        <p>Número de telemóvel</p>
        <div class="form-floating">
            <input type="text" class="form" name="phone" placeholder="Número de telemovel" required>
            <label for="floatingInput"></label>
        </div>

        <p>Cidade</p>
        <div class="form-floating">
            <input type="text" class="form" name="city" placeholder="Cidade" required>
            <label for="floatingInput"></label>
        </div>


        <p>Morada</p>
        <div class="form-floating">
            <input type="text" class="form" name="address" placeholder="Morada" required>
            <label for="floatingInput"></label>
        </div>

        <p>Código Postal</p>
        <div class="form-floating">
            <input type="text" class="form" name="postalCode" placeholder="Código Postal" required>
            <label for="floatingInput"></label>
        </div>

        <p>Número de Cartão de Crédito</p>
        <div class="form-floating">
            <input type="text" class="form" name="cc" placeholder="Número de Cartão de Crédito" required>
            <label for="floatingInput"></label>
        </div>

        <p>Validade do Cartão de Crédito</p>
        <div class="form-floating">
            <input type="datetime-local" class="form" name="ccval" placeholder="Validade do Cartão de Crédito" required>
            <label for="floatingInput"></label>
        </div>


        <p>NIF Pessoal</p>
        <div class="form-floating">
            <input type="text" class="form" name="nif" placeholder="NIF Pessoal" required>
            <label for="floatingInput"></label>
            

        <button class="btn" name="bttn" type="submit">Registe-se</button>
        </form>


        <div class="copyright-claim">
            <p>&copy;WeFix 2021. All rights reserved.</p>
        </div>

        
    </div>
    
</body>
</html>