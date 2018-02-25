<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['searchmessages'])) {
    try {
        //     OR date LIKE ? psuje polskie znaki
        $messagesStatement = $pdo->prepare("SELECT * FROM messages WHERE ID LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR subject LIKE ? OR content LIKE ? OR status LIKE ? ");
        $search = '%'.htmlEscape($_POST['searchbox']).'%';
        $messagesStatement->bindParam(1,$search);
        $messagesStatement->bindParam(2,$search);
        $messagesStatement->bindParam(3,$search);
        $messagesStatement->bindParam(4,$search);
        $messagesStatement->bindParam(5,$search);
        $messagesStatement->bindParam(6,$search);
        $messagesStatement->bindParam(7,$search);
        $messagesStatement->execute();
        $messagesArray = $messagesStatement->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
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