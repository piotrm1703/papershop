<?php

require_once (__DIR__.'/templates/loginForm.php');

if(isset($_POST['login'])){
    global $pdo;
    $usersStatement = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password =?");
    $username = htmlEscape($_POST['username']) ;
    $password = htmlEscape($_POST['psw']);
    $usersStatement->bindparam(1, $username);
    $usersStatement->bindparam(2, $password);
    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }
    $row = $usersStatement->fetch(PDO::FETCH_OBJ);
    if($row === false){
        echo 'Podaj prawidłowy login i hasło!';
    } else{
        $_SESSION['authenticatedUser'] = $username;
        header('Location: /');
        die();
    }
}