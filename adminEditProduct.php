<?php

require (__DIR__.'/userVerification.php');

$productsStatement = $pdo->query('SELECT * FROM products');
if ($productsStatement === false) {
    throw new DatabaseException();
}

$productArray = $productsStatement->fetchAll();
$currentPage = substr( $_GET['page'], 11);

$imagesStatement = $pdo->query('SELECT * FROM uploads');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$data = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminEditProductForm.php');

if(isset($_POST['edited'])) {

    $id = substr($_GET['page'], 11);
    $productStatement = $pdo->prepare("UPDATE products SET category = :category , content = :content, uploadID = :uploadID , price = :price WHERE id = :id");
    $productStatement->bindParam(':category',  $_POST['edit-category']);
    $productStatement->bindParam(':content', $_POST['edit-content']);
    $productStatement->bindParam(':uploadID',  $_POST['edit-img']);
    $productStatement->bindParam(':price', $_POST['edit-price']);
    $productStatement->bindParam(':id', $id);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$_POST['edit-category'].'');
    die();
}

if(isset($_POST['delete']) && isset($_POST['edit-category'])) {

    $id = substr($_GET['page'], 11);
    $productStatement = $pdo->prepare("DELETE FROM products WHERE id = :id ");
    $productStatement->bindParam(':id', $id);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$_POST['edit-category'].'');
    die();
}