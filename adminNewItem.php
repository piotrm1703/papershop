<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$imagesStatement = $pdo->query('SELECT DISTINCT url FROM images');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$data = $imagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){
    $category = ($_POST['category']);
    $content = ($_POST['content']);
    $price = ($_POST['price']);
    $img = ($_POST['img']);
    require_once ('connectDB.php');
    $productStatement = $pdo->prepare("INSERT INTO products VALUES(NULL,?,?,?,?)");
    $productStatement->bindParam(1, $category);
    $productStatement->bindParam(2,$content);
    $productStatement->bindParam(3,$img);
    $productStatement->bindParam(4,$price);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page='.$category.'');
    echo "<script> alert('Produkt został dodany!')</script>";
}
