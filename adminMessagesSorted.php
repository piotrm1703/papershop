<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}
$sortType = substr($_GET['page'],5);
$sortTypes = [
    'id',
    'firstname',
    'surname',
    'email',
    'subject',
    'content',
    'date',
    'status',
];

if(!in_array($sortType,$sortTypes)){
    throw new Exception('Nieprawidłowa wartość sortowania');
}

$messagesStatement = $pdo->prepare("SELECT * FROM messages ORDER BY $sortType");
if($messagesStatement->execute() === false){
    throw new DatabaseException();
}
$messagesArray = $messagesStatement->fetchAll();



require_once(__DIR__.'/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');

