<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['searchmessages'])) {

    //     OR date LIKE ? psuje polskie znaki
    $messagesStatement = $pdo->prepare("SELECT * FROM messages WHERE ID LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR subject LIKE ? OR content LIKE ? OR status LIKE ? ");
    $search = '%'.sqlLikeEscape($_POST['searchbox']).'%';
    $messagesStatement->bindParam(1,$search);
    $messagesStatement->bindParam(2,$search);
    $messagesStatement->bindParam(3,$search);
    $messagesStatement->bindParam(4,$search);
    $messagesStatement->bindParam(5,$search);
    $messagesStatement->bindParam(6,$search);
    $messagesStatement->bindParam(7,$search);
    if($messagesStatement->execute() === false){
        throw new DatabaseException();
    }
    $messagesArray = $messagesStatement->fetchAll();

}

require_once(__DIR__.'/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');