<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

require_once ('connectDB.php');

$stmt = $pdo->prepare('SELECT * FROM orders');
$stmt->execute();
if($stmt === false){
    throw new Exception("Database error");
}

require_once('web/templates/adminOrdersForm.php');

if(isset($_POST['delIcon'])) {
    try {
        $sql = "DELETE FROM orders WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['delIcon'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['realized'])) {
    try {
        $sql = "UPDATE orders SET status='zrealizowano' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['realized'];
        $statement->bindValue(':id', $selectedItem);
        $realized = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE orders SET status='oczekujący' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $expectant = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}
