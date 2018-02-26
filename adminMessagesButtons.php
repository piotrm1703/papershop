<?php

if(isset($_POST['delMsg'])) {

    $messageStatement = $pdo->prepare("DELETE FROM messages WHERE id = ?");
    $selectedItem = $_POST['delMsg'];
    $messageStatement->bindParam(1, $selectedItem);
    $messageStatement->execute();
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
}

if(isset($_POST['replied'])) {

    $messageStatement = $pdo->prepare("UPDATE messages SET status='odpowiedziano' WHERE id = ?");
    $selectedItem = $_POST['replied'];
    $messageStatement->bindparam(1, $selectedItem);
    $delete = $messageStatement->execute();
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}

if(isset($_POST['expectant'])) {
    $messageStatement = $pdo->prepare("UPDATE messages SET status='oczekujący' WHERE id = ?");
    $selectedItem = $_POST['expectant'];
    $messageStatement->bindParam(1, $selectedItem);
    $delete = $messageStatement->execute();
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}