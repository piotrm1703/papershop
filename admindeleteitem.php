<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

try {
    $productsStatement = $pdo->prepare("SELECT * FROM products ORDER BY content");
    $productsStatement->execute();
    $data = $productsStatement->fetchAll();
}catch(PDOException $e){
    echo $e->getMessage();
}

require_once (__DIR__.'/web/templates/adminDeleteItemForm.php');

if(isset($_POST['delete'])) {

    require_once('connectDB.php');
    $productStatement = $pdo->prepare("DELETE FROM products WHERE id = :id ");
    $selectedItem = $_POST['item'];
    $productStatement->bindValue(':id', $selectedItem);
    $delete = $productStatement->execute();
    if($productStatement === false){
        throw new DatabaseException();
    }
    header('Location: /?page=deleteitem');
    die();

}


