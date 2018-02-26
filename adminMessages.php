<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$messagesStatement = $pdo->prepare("SELECT * FROM messages");
$messagesStatement->execute();
$messagesArray = $messagesStatement->fetchAll();
if($messagesStatement === false){
    throw new DatabaseException();
}

require_once(__DIR__.'/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');