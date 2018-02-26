<?php

require_once (__DIR__.'/templates/loginForm.php');

if(isset($_POST['login'])){
    require_once ('connectDB.php');
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $usersStatement = $pdo->prepare($sql);
    $username = htmlEscape($_POST['username']) ;
    $password = htmlEscape($_POST['psw']);
    $usersStatement->bindValue(':username', $username);
    $usersStatement->bindValue(':password', $password);
    $usersStatement->execute();
    if($usersStatement === false){
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