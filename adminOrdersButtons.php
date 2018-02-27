<?php

if(isset($_POST['delIcon'])) {

    $orderStatement = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    $selectedItem = $_POST['delIcon'];
    $orderStatement->bindParam(1, $selectedItem);
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
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    $mailStatement = $pdo->prepare("SELECT * FROM orders WHERE id = ? ");
    $mailStatement->bindParam(1, $selectedItem);
    if($mailStatement->execute() === false){
        throw new DatabaseException();
    }
    $mail = $mailStatement->fetchAll();
    foreach (($mail) as $key=>$value ){
    $to = $value['email'];
    $subject = 'Potwierdzenie zamówienia';
    $txt = ('Zamówienie zostało wysłane. Pozdrawiamy, zespół papershop.com.pl! ');
    $headers = "From: zamowienia@papershop.com.pl" . "\r\n";
    var_dump($to, $subject, $txt, $headers);
    mail($to, $subject, $txt, $headers);
    }

    header('Location: /?page=orders');
    die();
}

if(isset($_POST['expectant'])) {

    $orderStatement = $pdo->prepare("UPDATE orders SET status='oczekujący' WHERE id = ?");
    $selectedItem = $_POST['expectant'];
    $orderStatement->bindParam(1, $selectedItem);
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}