<?php

if(isset($_POST['delMsg'])) {

    $messageStatement = $pdo->prepare("DELETE FROM messages WHERE id = :id");
    $selectedItem = $_POST['delMsg'];
    $messageStatement->bindParam(':id', $selectedItem);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
}

if(isset($_POST['replied'])) {

    $messageStatement = $pdo->prepare("UPDATE messages SET status='odpowiedziano' WHERE id = :id");
    $selectedItem = $_POST['replied'];
    $messageStatement->bindparam(':id', $selectedItem);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}

if(isset($_POST['expectant'])) {
    $messageStatement = $pdo->prepare("UPDATE messages SET status='oczekujący' WHERE id = :id");
    $selectedItem = $_POST['expectant'];
    $messageStatement->bindParam(':id', $selectedItem);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}