<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$productsStatement = $pdo->query('SELECT * FROM products');
if ($productsStatement === false) {
    throw new DatabaseException();
}

$productArray = $productsStatement->fetchAll();
$currentPage = substr( $_GET['page'], 11);

$imagesStatement = $pdo->query('SELECT DISTINCT url FROM images');
if ($imagesStatement === false) {
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
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
    die();
}

if(isset($_POST['delete']) && isset($_POST['category'])) {

    $id = substr($_GET['page'], 11);
    $category = ($_POST['category']);
    $productStatement = $pdo->prepare("DELETE FROM products WHERE id = ? ");
    $productStatement->bindParam(1, $id);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
    die();
}


