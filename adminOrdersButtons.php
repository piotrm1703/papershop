<?php

if(isset($_POST['delIcon'])) {

    $orderStatement = $pdo->prepare("DELETE FROM orders WHERE id = :id");
    $selectedItem = $_POST['delIcon'];
    $orderStatement->bindParam(':id', $selectedItem);
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}

if(isset($_POST['check-user-data'])) {

}

if(isset($_POST['realized'])) {

    $orderStatement = $pdo->prepare("UPDATE orders SET status='zrealizowano' WHERE id = :id");
    $selectedItem = $_POST['realized'];
    $orderStatement->bindParam(':id', $selectedItem);

    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }

    $usersStatement = $pdo->prepare("
        SELECT orders.id, users.email
        FROM orders
        INNER JOIN users ON orders.clientID = users.id
        WHERE orders.id = :id
        ORDER BY orders.id
    ");
    $usersStatement->bindParam(':id', $selectedItem);

    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }

    $users = $usersStatement->fetchAll();
    foreach ($users as $user ){
    $to = $user['email'];
    $subject = 'Potwierdzenie zamówienia';
    $txt = ('Zamówienie zostało wysłane. Pozdrawiamy, zespół papershop.com.pl! ');
    $headers = "From: zamowienia@papershop.com.pl" . "\r\n";
    mail($to, $subject, $txt, $headers);
    }
    header('Location: /?page=orders');
    die();
}

if(isset($_POST['expectant'])) {

    $orderStatement = $pdo->prepare("UPDATE orders SET status='oczekujący' WHERE id = :id");
    $selectedItem = $_POST['expectant'];
    $orderStatement->bindParam(':id', $selectedItem);
    if($orderStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=orders');
    die();
}
