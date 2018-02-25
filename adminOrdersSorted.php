<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$sortType = substr($_GET['page'],11);
$ordersStatement = $pdo->prepare("SELECT * FROM orders ORDER BY $sortType");
$ordersStatement->execute();
if($ordersStatement === false){
    throw new DatabaseException();
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