<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$distinctUrlStatement = $pdo->prepare('SELECT DISTINCT url FROM images');
$distinctUrlStatement->execute();
$data = $distinctUrlStatement->fetchAll();
if($distinctUrlStatement === false){
    throw new Exception("Database error");
}

require_once (__DIR__.'/web/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){
    $category = htmlEscape($_POST['category']);
    $content = htmlEscape($_POST['content']);
    $price = htmlEscape($_POST['price']);
    $img = htmlEscape($_POST['img']);
    if(isset($category) && isset($content) && isset($price) && isset($img)){
        require_once ('connectDB.php');
        $sql = "INSERT INTO products VALUES(NULL,'$category','$content','$img','$price')";
        $addStatement = $pdo->query($sql);
        echo "<script> alert('Produkt został dodany!')</script>";
    } else {
        echo "Uzupełnij informacje!";
    }
}
