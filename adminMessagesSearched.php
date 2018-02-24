<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

if(isset($_POST['searchmessages'])) {
    try {
        $sql = "SELECT * FROM messages WHERE ID LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR subject LIKE ? OR content LIKE ? OR status LIKE ? ";  //     OR date LIKE ? psuje polskie znaki
        $stmt = $pdo->prepare($sql);
        $search = '%'.htmlEscape($_POST['searchbox']).'%';
        $stmt->bindParam(1,$search);
        $stmt->bindParam(2,$search);
        $stmt->bindParam(3,$search);
        $stmt->bindParam(4,$search);
        $stmt->bindParam(5,$search);
        $stmt->bindParam(6,$search);
        $stmt->bindParam(7,$search);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

require_once('web/templates/adminMessagesForm.php');

if(isset($_POST['delMsg'])) {
    try {
        $sql = "DELETE FROM messages WHERE id = :id";
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
        $sql = "UPDATE messages SET status='odpowiedziano' WHERE id = :id";
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
        $sql = "UPDATE messages SET status='oczekujący' WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}