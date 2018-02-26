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
$messagesStatement->execute();
$messagesArray = $messagesStatement->fetchAll();

if($messagesStatement === false){
    throw new DatabaseException();
}

require_once(__DIR__.'/web/templates/adminMessagesForm.php');

require_once (__DIR__.'/adminMessagesButtons.php');