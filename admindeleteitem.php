<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$productsStatement = $pdo->query("SELECT * FROM products ORDER BY content");
if ($productsStatement === false) {
    throw new DatabaseException();
}

$data = $productsStatement->fetchAll();

require_once (__DIR__.'/templates/adminDeleteItemForm.php');

if(isset($_POST['delete'])) {

    require_once('connectDB.php');
    $productStatement = $pdo->prepare("DELETE FROM products WHERE id = :id ");
    $selectedItem = $_POST['item'];
    $productStatement->bindValue(':id', $selectedItem);
    if($productStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=deleteitem');
    die();

}


