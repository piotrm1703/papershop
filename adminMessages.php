<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$messagesStatement = $pdo->prepare("SELECT * FROM messages");
$messagesStatement->execute();
if($messagesStatement->execute() === false){
    throw new DatabaseException();
}
$messagesArray = $messagesStatement->fetchAll();

require_once(__DIR__.'/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');