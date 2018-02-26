<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$productsStatement = $pdo->prepare('SELECT * FROM products');
$productsStatement->execute();
if($productsStatement->execute() === false){
    throw new DatabaseException();
}
$productArray = $productsStatement->fetchAll();
$currentPage = substr( $_GET['page'], 11);

$imagesStatement = $pdo->prepare('SELECT DISTINCT url FROM images');
$imagesStatement->execute();
if($imagesStatement->execute() === false){
    throw new DatabaseException();
}
$data = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminEditProductForm.php');

if(isset($_POST['edited'])) {

    $category = ($_POST['category']);
    $content = ($_POST['content']);
    $price = ($_POST['price']);
    $img = ($_POST['img']);
    $id = substr($_GET['page'], 11);
    $productStatement = $pdo->prepare("UPDATE products SET category = ? , content = ?, img = ? , price = ? WHERE id = ?");
    $productStatement->bindParam(1, $category);
    $productStatement->bindParam(2, $content);
    $productStatement->bindParam(3, $img);
    $productStatement->bindParam(4, $price);
    $productStatement->bindParam(5, $id);
    $productStatement->execute();
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
    die();

}

