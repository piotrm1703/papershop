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

if(isset($_POST['delMsg'])) {

    $messageStatement = $pdo->prepare("DELETE FROM messages WHERE id = ?");
    $selectedItem = $_POST['delMsg'];
    $messageStatement->bindParam(1, $selectedItem);
    $delete = $messageStatement->execute();

}

if(isset($_POST['replied'])) {

    $messageStatement = $pdo->prepare("UPDATE messages SET status='odpowiedziano' WHERE id = ?");
    $selectedItem = $_POST['replied'];
    $messageStatement->bindparam(1, $selectedItem);
    $delete = $messageStatement->execute();
    header('Location: /?page=messages');
    die();

}

if(isset($_POST['expectant'])) {
    $messageStatement = $pdo->prepare("UPDATE messages SET status='oczekujący' WHERE id = ?");
    $selectedItem = $_POST['expectant'];
    $messageStatement->bindParam(1, $selectedItem);
    $delete = $messageStatement->execute();
    header('Location: /?page=messages');
    die();

}