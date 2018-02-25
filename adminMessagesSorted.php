<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$sortType = substr($_GET['page'],5);
$sql = "SELECT * FROM messages ORDER BY $sortType";
$messagesStatement = $pdo->prepare($sql);
$messagesStatement->execute();
$result = $messagesStatement->setFetchMode(PDO::FETCH_ASSOC);
if($messagesStatement === false){
    throw new Exception("Database error");
}

require_once(__DIR__.'/web/templates/adminMessagesForm.php');

if(isset($_POST['delMsg'])) {
    try {
        $sql = "DELETE FROM messages WHERE id = ?";
        $messageStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['delMsg'];
        $messageStatement->bindParam(1, $selectedItem);
        $delete = $messageStatement->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['replied'])) {
    try {
        $sql = "UPDATE messages SET status='odpowiedziano' WHERE id = ?";
        $messageStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['replied'];
        $messageStatement->bindparam(1, $selectedItem);
        $delete = $messageStatement->execute();
        header('Location: /?page=messages');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE messages SET status='oczekujący' WHERE id = ?";
        $messageStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $messageStatement->bindParam(1, $selectedItem);
        $delete = $messageStatement->execute();
        header('Location: /?page=messages');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}