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
        $messagesStatement = $pdo->prepare($sql);
        $selectedItem = $_POST['delMsg'];
        $messagesStatement->bindParam(1, $selectedItem);
        $delete = $messagesStatement->execute();
        header('Location: /?page=messages');
        die();
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