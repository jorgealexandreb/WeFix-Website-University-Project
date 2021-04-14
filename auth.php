<?php
session_start();
include 'connection.php';
header("Location: login.php?error=Insira o seu nome de utilizador e password.");
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)){
        header("Location: login.php?error=Insira o seu nome de utilizador.");
    }else if (empty($password)) {
        header("Location: login.php?error=Insira a sua password.");
    }else {
        $stmt =$conn->prepare("SELECT * FROM User WHERE userName=?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();

			$user_name = $user['userName'];
            $user_password = $user['password'];
            
            if ($username === $user_name){

                if ($password === $user_password){
                    
					$_SESSION['user_name'] = $user_name;
					$_SESSION['user_password'] = $user_password;
			

                    header("Location: loginsuccess.php");
                }else{
                    $message="Nome de utilizador ou password incorreta.";;
                }
            }else {
                $message="Nome de utilizador ou password incorreta.";;
            }
        }else {
            $message="Nome de utilizador ou password incorreta.";;
        }
    }
}

?>