<?php

$userStatement = $pdo->prepare('SELECT admin FROM users WHERE username = :username');
$userStatement->bindParam(':username', $_SESSION['authenticatedUser']);

if ($userStatement->execute() === false) {
    throw new DatabaseException();
}

$isAdmin = $userStatement->fetch();

if($isAdmin['admin'] !== '1'){
    header('Location: /');
    die();
}
