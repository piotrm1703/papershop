<?php

require (__DIR__.'/userVerification.php');

$imagesStatement = $pdo->query('SELECT * FROM uploads');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$data = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){
    $category = ($_POST['category']);
    $content = ($_POST['content']);
    $price = ($_POST['price']);
    $imgId = ($_POST['img']);
    $productStatement = $pdo->prepare("INSERT INTO products VALUES(NULL,?,?,?,?)");
    $productStatement->bindParam(1, $category);
    $productStatement->bindParam(2,$content);
    $productStatement->bindParam(3,$imgId);
    $productStatement->bindParam(4,$price);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
}
