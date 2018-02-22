<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

try {
    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
}catch(PDOException $e){
    echo $e->getMessage();
}

require_once ('web/templates/adminDeleteItemForm.php');

if(isset($_POST['delete'])) {
    try {
        require_once('connectDB.php');
        $sql = "DELETE FROM products WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $selectedItem = $_POST['item'];
        $stmt->bindValue(':id', $selectedItem);
        $delete = $stmt->execute();
        if($stmt === false){
            throw new Exception("Database error");
        }
        header('Location: /?page=deleteitem');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}


