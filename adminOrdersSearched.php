<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['ordersearch'])) {
    try {
        $sql = "SELECT * FROM orders WHERE id LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR city LIKE ? OR zipcode LIKE ? OR address LIKE ? OR sum LIKE ? OR products LIKE ? OR status LIKE ? ";
        $ordersStatement = $pdo->prepare($sql);
        $search = '%'.htmlEscape($_POST['searchboxorders']).'%';
        $ordersStatement->bindParam(1,$search);
        $ordersStatement->bindParam(2,$search);
        $ordersStatement->bindParam(3,$search);
        $ordersStatement->bindParam(4,$search);
        $ordersStatement->bindParam(5,$search);
        $ordersStatement->bindParam(6,$search);
        $ordersStatement->bindParam(7,$search);
        $ordersStatement->bindParam(8,$search);
        $ordersStatement->bindParam(9,$search);
        $ordersStatement->bindParam(10,$search);
        $ordersStatement->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

require_once(__DIR__.'/web/templates/adminOrdersForm.php');

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