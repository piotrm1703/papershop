<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

$sql = "SELECT * FROM orders WHERE id LIKE :id OR name LIKE :id OR surname LIKE :id OR email LIKE :id OR city LIKE :id OR zipcode LIKE :id OR address LIKE :id OR sum LIKE :id OR products LIKE :id OR date LIKE :id OR status LIKE :id";
$search = "'%".$_POST['searchbox']."%'";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $search);
$statement->execute();
$result = $statement->setFetchMode(PDO::FETCH_ASSOC);
if($statement === false){
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

var_dump($search);