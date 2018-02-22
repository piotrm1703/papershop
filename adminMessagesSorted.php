<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}
$sortType = substr($_GET['page'],5);
$sql = "SELECT * FROM messages ORDER BY $sortType";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt === false){
    throw new Exception("Database error");
}

require_once('web/templates/adminMessagesForm.php');

if(isset($_POST['delMsg'])) {
    try {
        $sql = "DELETE FROM messages WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['delMsg'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['replied'])) {
    try {
        $sql = "UPDATE messages SET status='odpowiedziano' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['replied'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE messages SET status='oczekujący' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}