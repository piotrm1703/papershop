<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

try {
    $sql = "SELECT * FROM products ORDER BY content";
    $productsStatement = $pdo->prepare($sql);
    $productsStatement->execute();
    $data = $productsStatement->fetchAll();
}catch(PDOException $e){
    echo $e->getMessage();
}

require_once (__DIR__.'/web/templates/adminDeleteItemForm.php');

if(isset($_POST['delete'])) {
    try {
        require_once('connectDB.php');
        $sql = "DELETE FROM products WHERE id = :id ";
        $deleteProductStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['item'];
        $deleteProductStatement->bindValue(':id', $selectedItem);
        $delete = $deleteProductStatement->execute();
        if($deleteProductStatement === false){
            throw new Exception("Database error");
        }
        header('Location: /?page=deleteitem');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}


