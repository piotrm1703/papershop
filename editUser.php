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
    if (!(isset($_POST['edit-firstname']) &&
        isset($_POST['edit-surname']) &&
        isset($_POST['edit-city']) &&
        isset($_POST['edit-zipcode']) &&
        isset($_POST['edit-address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    if (!preg_match("/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu",$_POST["edit-firstname"])) {
        echo 'W imieniu dozwolone są tylko wielkie i małe litery!';
    } elseif (empty($_POST["edit-firstname"])) {
        echo 'Podanie imienia jest wymagane!';
    } elseif (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ]*$/iu",$_POST["edit-surname"])) {
        echo 'W nazwisku dozwolone są tylko wielkie, małe litery oraz myślnik!';
    } elseif (empty($_POST["edit-surname"])) {
        echo 'Podanie nazwiska jest wymagane!';
    } elseif (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu", $_POST['edit-city'])) {
        echo 'Miasto może zawierać wyłącznie wielkie i małe litery!';
    } elseif (empty($_POST["edit-city"])) {
        echo 'Podanie miasta jest wymagane!';
    } elseif (!preg_match("/^[0-9]{2}-[0-9]{3}$/", $_POST['edit-zipcode'])) {
        echo 'Kod pocztowy może zawierać wyłącznie cyfry oraz myślnik!';
    } elseif (empty($_POST["edit-zipcode"])) {
        echo 'Podanie kodu pocztowego jest wymagane!';
    } elseif (empty($_POST["edit-address"])) {
        echo 'Podanie adresu jest wymagane!';
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