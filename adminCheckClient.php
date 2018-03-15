<?php

require (__DIR__.'/userVerification.php');


$currentClient = substr( $_GET['page'], 18);
$clientStatement = $pdo->prepare("
    SELECT orders.id ,orders.clientID, users.firstname, users.surname, users.email, users.city, users.zipcode, users.address
    FROM orders
    INNER JOIN users ON orders.clientID = users.id
    WHERE orders.id = :id
    ORDER BY orders.id
");
$clientStatement->bindParam(':id',$currentClient);

if ($clientStatement->execute() === false) {
    throw new DatabaseException();
}

$client = $clientStatement->fetchAll();

require (__DIR__.'/templates/adminCheckClientForm.php');