<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['ordersearch'])) {
    try {
        $ordersStatement = $pdo->prepare("SELECT * FROM orders WHERE id LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR city LIKE ? OR zipcode LIKE ? OR address LIKE ? OR sum LIKE ? OR products LIKE ? OR status LIKE ? ");
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

if(isset($_POST['delIcon'])) {
    try {
        $orderStatement = $pdo->prepare("DELETE FROM orders WHERE id = ?");
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
        $orderStatement = $pdo->prepare("UPDATE orders SET status='zrealizowano' WHERE id = ?");
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
        $orderStatement = $pdo->prepare("UPDATE orders SET status='oczekujący' WHERE id = ?");
        $selectedItem = $_POST['expectant'];
        $orderStatement->bindParam(1, $selectedItem);
        $expectant = $orderStatement->execute();
        header('Location: /?page=orders');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}