<?php

if(isset($_POST['delIcon'])) {

    $orderStatement = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    $selectedItem = $_POST['delIcon'];
    $orderStatement->bindParam(1, $selectedItem);
    $orderStatement->execute();
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}

if(isset($_POST['realized'])) {

    $orderStatement = $pdo->prepare("UPDATE orders SET status='zrealizowano' WHERE id = ?");
    $selectedItem = $_POST['realized'];
    $orderStatement->bindParam(1, $selectedItem);
    $orderStatement->execute();
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}

if(isset($_POST['expectant'])) {

    $orderStatement = $pdo->prepare("UPDATE orders SET status='oczekujący' WHERE id = ?");
    $selectedItem = $_POST['expectant'];
    $orderStatement->bindParam(1, $selectedItem);
    $orderStatement->execute();
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}