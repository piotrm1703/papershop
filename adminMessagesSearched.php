<?php

require (__DIR__.'/userVerification.php');

if(isset($_POST['searchmessages'])) {

    //     OR date LIKE ? psuje polskie znaki
    $messagesStatement = $pdo->prepare("SELECT * FROM messages WHERE id LIKE :id OR firstname LIKE :firstname OR surname LIKE :surname OR email LIKE :email OR subject LIKE :subject OR content LIKE :content OR status LIKE :status ");
    $search = '%'.sqlLikeEscape($_POST['searchbox']).'%';
    $messagesStatement->bindParam(':id', $search);
    $messagesStatement->bindParam(':firstname', $search);
    $messagesStatement->bindParam(':surname', $search);
    $messagesStatement->bindParam(':email', $search);
    $messagesStatement->bindParam(':subject', $search);
    $messagesStatement->bindParam(':content', $search);
    $messagesStatement->bindParam(':status', $search);
    if($messagesStatement->execute() === false){
        throw new DatabaseException();
    }
    $messagesArray = $messagesStatement->fetchAll();

}

require_once(__DIR__.'/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');