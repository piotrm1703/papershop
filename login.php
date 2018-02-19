<?php

require_once ('loginForm.php');

if(isset($_POST['login'])){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $stmt->bindValue(':username', $_POST['username']);
    $stmt->bindValue(':password', $_POST['psw']);
    $stmt->execute();
    if($stmt === false){
        throw new Exception("Database error");
    }
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    var_dump($row);
    if($row === false){
        echo 'Podaj prawidłowy login i hasło!';
    } else{
        header('Location: /');
        $_SESSION['authenticatedUser'] = $_POST['username'];
        var_dump($_SESSION['authenticatedUser']);
    }
}