<?php

$userStatement = $pdo->prepare('SELECT isAdmin FROM users WHERE username = :username');
$userStatement->bindParam(':username', $_SESSION['authenticatedUser']);

if ($userStatement->execute() === false) {
    throw new DatabaseException();
}

$isAdmin = $userStatement->fetch();

if($isAdmin['isAdmin'] !== '1'){
    header('Location: /');
    die();
}
