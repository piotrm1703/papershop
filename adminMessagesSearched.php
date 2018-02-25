<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['searchmessages'])) {
    try {
        $sql = "SELECT * FROM messages WHERE ID LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR subject LIKE ? OR content LIKE ? OR status LIKE ? ";  //     OR date LIKE ? psuje polskie znaki
        $messagesStatement = $pdo->prepare($sql);
        $search = '%'.htmlEscape($_POST['searchbox']).'%';
        $messagesStatement->bindParam(1,$search);
        $messagesStatement->bindParam(2,$search);
        $messagesStatement->bindParam(3,$search);
        $messagesStatement->bindParam(4,$search);
        $messagesStatement->bindParam(5,$search);
        $messagesStatement->bindParam(6,$search);
        $messagesStatement->bindParam(7,$search);
        $messagesStatement->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
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