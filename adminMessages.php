<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$messagesStatement = $pdo->prepare("SELECT * FROM messages");
$messagesStatement->execute();
if($messagesStatement === false){
    throw new DatabaseException();
}

require_once(__DIR__.'/web/templates/adminMessagesForm.php');

if(isset($_POST['delMsg'])) {
    try {
        $messageStatement = $pdo->prepare("DELETE FROM messages WHERE id = ?");
        $selectedItem = $_POST['delMsg'];
        $messageStatement->bindParam(1, $selectedItem);
        $delete = $messageStatement->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['replied'])) {
    try {
        $messageStatement = $pdo->prepare("UPDATE messages SET status='odpowiedziano' WHERE id = ?");
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
        $messageStatement = $pdo->prepare("UPDATE messages SET status='oczekujący' WHERE id = ?");
        $selectedItem = $_POST['expectant'];
        $messageStatement->bindParam(1, $selectedItem);
        $delete = $messageStatement->execute();
        header('Location: /?page=messages');
        die();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}