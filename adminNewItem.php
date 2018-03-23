<?php

require (__DIR__.'/userVerification.php');

$imagesStatement = $pdo->query('SELECT * FROM uploads');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$user = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){

    $productStatement = $pdo->prepare("INSERT INTO products (id, category, content, uploadID, price) VALUES(NULL, :category, :content, :imgId, :price)");
    $productStatement->bindParam(':category', $_POST['new-item-category']);
    $productStatement->bindParam(':content', $_POST['new-item-content']);
    $productStatement->bindParam(':imgId', $_POST['new-item-img']);
    $productStatement->bindParam(':price', $_POST['new-item-price']);

    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$_POST['new-item-category'].'');
}
