<?php

if(isset($_POST['delMsg'])) {

    $messageStatement = $pdo->prepare("DELETE FROM messages WHERE id = :id");
    $messageStatement->bindParam(':id', $_POST['delMsg']);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
}

if(isset($_POST['replied'])) {

    $messageStatement = $pdo->prepare("UPDATE messages SET status='odpowiedziano' WHERE id = :id");
    $messageStatement->bindparam(':id', $_POST['replied']);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}

if(isset($_POST['expectant'])) {
    $messageStatement = $pdo->prepare("UPDATE messages SET status='oczekujący' WHERE id = :id");
    $messageStatement->bindParam(':id', $_POST['expectant']);
    if($messageStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=messages');
    die();
}
