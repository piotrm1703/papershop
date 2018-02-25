<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$productsStatement = $pdo->prepare('SELECT * FROM products');
$productsStatement->execute();
$result = $productsStatement->setFetchMode(PDO::FETCH_ASSOC);

$urlStatement = $pdo->prepare('SELECT DISTINCT url FROM images');
$urlStatement->execute();
$data = $urlStatement->fetchAll();

require_once (__DIR__.'/web/templates/adminEditProductForm.php');

if(isset($_POST['edited'])) {
    try {
        $category = htmlEscape($_POST['category']);
        $content = htmlEscape($_POST['content']);
        $price = htmlEscape($_POST['price']);
        $img = htmlEscape($_POST['img']);
        $id = substr($_GET['page'], 11);
        $sql = "UPDATE products SET category = ? , content = ?, img = ? , price = ? WHERE id = ?";
        $productStatement = $pdo->prepare($sql);
        $productStatement->bindParam(1, $category);
        $productStatement->bindParam(2, $content);
        $productStatement->bindParam(3, $img);
        $productStatement->bindParam(4, $price);
        $productStatement->bindParam(5, $id);
        $productStatement->execute();

        header('Location: /?page='.$category.'');
        die();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

