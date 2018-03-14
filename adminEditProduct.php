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

    $category = ($_POST['edit-category']);
    $content = ($_POST['edit-content']);
    $price = ($_POST['edit-price']);
    $imgId = ($_POST['edit-img']);
    $id = substr($_GET['page'], 11);
    $productStatement = $pdo->prepare("UPDATE products SET category = :category , content = :content, uploadID = :uploadID , price = :price WHERE id = :id");
    $productStatement->bindParam(':category', $category);
    $productStatement->bindParam(':content', $content);
    $productStatement->bindParam(':uploadID', $imgId);
    $productStatement->bindParam(':price', $price);
    $productStatement->bindParam(':id', $id);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$_POST['edit-category'].'');
    die();
}

if(isset($_POST['delete']) && isset($_POST['edit-category'])) {

    $id = substr($_GET['page'], 11);
    $category = ($_POST['edit-category']);
    $productStatement = $pdo->prepare("DELETE FROM products WHERE id = :id ");
    $productStatement->bindParam(':id', $id);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$_POST['edit-category'].'');
    die();
}


