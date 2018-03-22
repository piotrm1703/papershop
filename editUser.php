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

foreach ($usersStatement as $userData ){
    $user = $userData;
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

    if($checkUserInput->firstnameCheck($_POST['edit-firstname']) == true || $checkUserInput->surnameCheck($_POST['edit-surname']) == true
        || $checkUserInput->cityCheck($_POST['edit-city']) == true || $checkUserInput->zipcodeCheck($_POST['edit-city']) == true
        || $checkUserInput->addressCheck($_POST['edit-city']) == true){
        echo ' Popraw błędy!';

    } else {

        $firstname = ($_POST['edit-firstname']);
        $surname = ($_POST['edit-surname']);
        $city = ($_POST['edit-city']);
        $zipcode = ($_POST['edit-zipcode']);
        $address = ($_POST['edit-address']);


        $userStatement = $pdo->prepare('UPDATE users SET firstname = :firstname, surname = :surname, city = :city, zipcode = :zipcode, address = :address WHERE username = :username');
        $userStatement->bindParam(':firstname', $firstname);
        $userStatement->bindParam(':surname', $surname);
        $userStatement->bindParam(':city', $city);
        $userStatement->bindParam(':zipcode', $zipcode);
        $userStatement->bindParam(':address', $address);
        $userStatement->bindParam(':username', $currentUser);
        if ($userStatement->execute() === false) {
            throw new DatabaseException();
        }
        header('Location: /?page=edit_user');
        die();
    }
}