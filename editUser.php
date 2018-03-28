<?php

if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$currentUser = $_SESSION['authenticatedUser'];
$usersStatement = $pdo->prepare('SELECT firstname, surname, city, zipcode, address FROM users WHERE username = :username');
$usersStatement->bindParam(':username', $currentUser);
if($usersStatement->execute() === false){
    throw new DatabaseException();
}
$usersStatement = $usersStatement->fetchAll();

foreach ($usersStatement as $users ){
    $user = $users;
}

require_once (__DIR__.'/templates/editUserForm.php');

if(isset($_POST['edit_user'])){
    if (!(isset($_POST['edit-firstname']) &&
        isset($_POST['edit-surname']) &&
        isset($_POST['edit-city']) &&
        isset($_POST['edit-zipcode']) &&
        isset($_POST['edit-address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    $checkUserInput = new RegistryValidation();

    if($checkUserInput->firstnameCheck($_POST['edit-firstname']) || $checkUserInput->surnameCheck($_POST['edit-surname'])
        || $checkUserInput->cityCheck($_POST['edit-city']) || $checkUserInput->zipcodeCheck($_POST['edit-city'])
        || $checkUserInput->addressCheck($_POST['edit-city'])){
        echo ' Popraw błędy!';

    } else {

        $userStatement = $pdo->prepare('UPDATE users SET firstname = :firstname, surname = :surname, city = :city, zipcode = :zipcode, address = :address WHERE username = :username');
        $userStatement->bindParam(':firstname', $_POST['edit-firstname']);
        $userStatement->bindParam(':surname', $_POST['edit-surname']);
        $userStatement->bindParam(':city', $_POST['edit-city']);
        $userStatement->bindParam(':zipcode', $_POST['edit-zipcode']);
        $userStatement->bindParam(':address', $_POST['edit-address']);
        $userStatement->bindParam(':username', $currentUser);
        if ($userStatement->execute() === false) {
            throw new DatabaseException();
        }
        header('Location: /?page=edit_user');
        die();
    }
}