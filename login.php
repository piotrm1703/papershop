<?php

require_once ('web/templates/loginForm.php');

if(isset($_POST['login'])){
    require_once ('connectDB.php');
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $username = htmlEscape($_POST['username']) ;
    $password = htmlEscape($_POST['psw']);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    if($stmt === false){
        throw new Exception("Database error");
    }
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    if($row === false){
        echo 'Podaj prawidłowy login i hasło!';
    } else{
        header('Location: /');
        $_SESSION['authenticatedUser'] = $username;

    }
}