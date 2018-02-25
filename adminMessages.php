<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$sql = "SELECT * FROM messages";
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
        $messagesStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['delMsg'];
        $messagesStatement->bindParam(1, $selectedItem);
        $delete = $messagesStatement->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['replied'])) {
    try {
        $sql = "UPDATE messages SET status='odpowiedziano' WHERE id = ?";
        $messagesStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['replied'];
        $messagesStatement->bindparam(1, $selectedItem);
        $delete = $messagesStatement->execute();
        header('Location: /?page=messages');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE messages SET status='oczekujący' WHERE id = ?";
        $messagesStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $messagesStatement->bindParam(1, $selectedItem);
        $delete = $messagesStatement->execute();
        header('Location: /?page=messages');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}