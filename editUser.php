<?php

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
    if (!(isset($_POST['register-firstname']) &&
        isset($_POST['register-surname']) &&
        isset($_POST['register-city']) &&
        isset($_POST['register-zipcode']) &&
        isset($_POST['register-address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }


    if (!preg_match("/^[a-zA-Z]*$/",$_POST["edit-firstname"])) {
        echo 'W imieniu dozwolone są tylko wielkie i małe litery!';
    } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["edit-surname"])) {
        echo 'W nazwisku dozwolone są tylko wielkie i małe litery!';
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