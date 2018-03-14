<?php

require_once (__DIR__.'/templates/loginForm.php');

if(isset($_POST['login'])){
    global $pdo;
    $usersStatement = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND verifyKey = ?");
    $username = htmlEscape($_POST['username']) ;
    $password = htmlEscape($_POST['psw']);
    $verifyKey = '';
    $usersStatement->bindParam(1, $username);
    $usersStatement->bindParam(2, $password);
    $usersStatement->bindParam(3, $verifyKey);

    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }
    $row = $usersStatement->fetch(PDO::FETCH_OBJ);
    if($row === false){
        echo 'Podaj prawidłowy login lub hasło!';
    } else{
        $_SESSION['authenticatedUser'] = $username;
        header('Location: /');
        die();
    }
}