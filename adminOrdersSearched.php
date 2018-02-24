<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

if(isset($_POST['ordersearch'])) {
    try {
        $sql = "SELECT * FROM orders WHERE id LIKE ? OR name LIKE ? OR surname LIKE ? OR email LIKE ? OR city LIKE ? OR zipcode LIKE ? OR address LIKE ? OR sum LIKE ? OR products LIKE ? OR status LIKE ? ";
        $stmt = $pdo->prepare($sql);
        $search = '%'.htmlEscape($_POST['searchboxorders']).'%';
        $stmt->bindParam(1,$search);
        $stmt->bindParam(2,$search);
        $stmt->bindParam(3,$search);
        $stmt->bindParam(4,$search);
        $stmt->bindParam(5,$search);
        $stmt->bindParam(6,$search);
        $stmt->bindParam(7,$search);
        $stmt->bindParam(8,$search);
        $stmt->bindParam(9,$search);
        $stmt->bindParam(10,$search);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

require_once('web/templates/adminOrdersForm.php');

if(isset($_POST['delIcon'])) {
    try {
        $sql = "DELETE FROM orders WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['delIcon'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=orders-search');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['realized'])) {
    try {
        $sql = "UPDATE orders SET status='zrealizowano' WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['realized'];
        $statement->bindValue(':id', $selectedItem);
        $realized = $statement->execute();
        header('Location: /?page=orders-search');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE orders SET status='oczekujący' WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $expectant = $statement->execute();
        header('Location: /?page=orders-search');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

