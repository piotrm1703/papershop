<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$sql = "SELECT * FROM orders";
$ordersStatement = $pdo->prepare($sql);
$ordersStatement->execute();
if($ordersStatement === false){
    throw new Exception("Database error");
}

require_once(__DIR__.'/web/templates/adminOrdersForm.php');

if(isset($_POST['delIcon'])) {
    try {
        $sql = "DELETE FROM orders WHERE id = ?";
        $orderStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['delIcon'];
        $orderStatement->bindParam(1, $selectedItem);
        $delete = $orderStatement->execute();
        header('Location: /?page=orders');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['realized'])) {
    try {
        $sql = "UPDATE orders SET status='zrealizowano' WHERE id = ?";
        $orderStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['realized'];
        $orderStatement->bindParam(1, $selectedItem);
        $realized = $orderStatement->execute();
        header('Location: /?page=orders');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE orders SET status='oczekujący' WHERE id = ?";
        $orderStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $orderStatement->bindParam(1, $selectedItem);
        $expectant = $orderStatement->execute();
        header('Location: /?page=orders');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}