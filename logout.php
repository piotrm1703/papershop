<?php

$username = $_SESSION['authenticatedUser'];

global $pdo;
$userStatement = $pdo->prepare('SELECT firstname FROM users WHERE username = :username');
$userStatement->bindParam(':username',$username);
if($userStatement->execute() === false){
    throw new DatabaseException();
}
$user = $userStatement->fetch();

require_once (__DIR__.'/templates/logoutForm.php');

if(isset($_POST['logout'])){
    unset($_SESSION['authenticatedUser']);
    $_SESSION['cart'] = [];
    header('Location: /');
    die();
}
