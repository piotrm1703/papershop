<?php

require (__DIR__.'/userVerification.php');

$imagesStatement = $pdo->query('SELECT * FROM uploads');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$data = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){
    $category = ($_POST['new-item-category']);
    $content = ($_POST['new-item-content']);
    $price = ($_POST['new-item-price']);
    $imgId = ($_POST['new-item-img']);
    $productStatement = $pdo->prepare("INSERT INTO products VALUES(NULL,:category,:content,:imgId,:price)");
    $productStatement->bindParam(':category', $category);
    $productStatement->bindParam(':content',$content);
    $productStatement->bindParam(':imgId',$imgId);
    $productStatement->bindParam(':price',$price);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
}
