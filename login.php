<?php

require_once (__DIR__.'/templates/loginForm.php');

if(isset($_POST['login'])){
    global $pdo;

    $usersStatement = $pdo->prepare("SELECT username, password FROM users WHERE username = :username AND verifyKey = :verifyKey");
    $username = htmlEscape($_POST['username']) ;
    $verifyKey = '';
    $usersStatement->bindParam(':username', $username);
    $usersStatement->bindParam(':verifyKey', $verifyKey);

    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }

    $authentication = $usersStatement->fetch(PDO::FETCH_OBJ);

    if($authentication === false || $passwordCheck = password_verify($_POST['psw'],$authentication->password) === false){
        echo 'Podaj prawidłowy login lub hasło!';
    } else {
        $_SESSION['authenticatedUser'] = $username;
        header('Location: /');
        die();
    }
}