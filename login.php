<?php

require_once (__DIR__.'/templates/loginForm.php');

if(isset($_POST['login'])){
    global $pdo;
    $usersStatement = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password AND verifyKey = :verifyKey");
    $username = htmlEscape($_POST['username']) ;
    $password = htmlEscape($_POST['psw']);
    $verifyKey = '';
    $usersStatement->bindParam(':username', $username);
    $usersStatement->bindParam(':password', $password);
    $usersStatement->bindParam(':verifyKey', $verifyKey);

    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }
    $authentication = $usersStatement->fetch(PDO::FETCH_OBJ);

    if($authentication === false){
        echo 'Podaj prawidłowy login lub hasło!';
    } else{
        $_SESSION['authenticatedUser'] = $username;
        header('Location: /');
        die();
    }
}