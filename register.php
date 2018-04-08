<?php

require_once (__DIR__.'/templates/registerForm.php');

if(isset($_POST['register'])) {
    if (!(isset($_POST['register-firstname']) &&
        isset($_POST['register-surname']) &&
        isset($_POST['register-username']) &&
        isset($_POST['password']) &&
        isset($_POST['password_repeated']) &&
        isset($_POST['register-email']) &&
        isset($_POST['register-city']) &&
        isset($_POST['register-zipcode']) &&
        isset($_POST['register-address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    $usersStatement = $pdo->query('SELECT username,email FROM users');
    if ($usersStatement === false) {
        throw new DatabaseException();
    }
    $userData = $usersStatement->fetchAll(PDO::FETCH_OBJ);

    foreach ($userData as $data) {
        $usernameArray[] = $data->username;
        $emailArray[] = $data->email;
    }

    $checkUserInput = new RegisterValidation();

    if($checkUserInput->firstnameCheck($_POST['register-firstname']) == true || $checkUserInput->surnameCheck($_POST['register-surname']) == true
        || $checkUserInput->usernameCheck($_POST['register-username'],$usernameArray) == true || $checkUserInput->passwordCheck($_POST['password'],$_POST['password_repeated']) == true
        || $checkUserInput->emailCheck($_POST['register-email'],$emailArray) == true || $checkUserInput->cityCheck($_POST['register-city']) == true
        || $checkUserInput->zipcodeCheck($_POST['register-zipcode']) == true || $checkUserInput->addressCheck($_POST['register-address']) == true){
        echo ' Popraw błędy!';

    } else {

        $verifyKey = generateRandomString();

        $userStatement = $pdo->prepare("INSERT INTO users(id, firstname, surname, username, password, email, city, zipcode, address, verifyKey) VALUES(NULL, :firstname, :surname, :username, :password, :email, :city, :zipcode, :address, :verifyKey)");
        $userStatement->bindParam(':firstname', $_POST['register-firstname']);
        $userStatement->bindParam(':surname', $_POST['register-surname']);
        $userStatement->bindParam(':username', $_POST['register-username']);
        $userStatement->bindParam(':password', $_POST['password']);
        $userStatement->bindParam(':email', $_POST['register-email']);
        $userStatement->bindParam(':city', $_POST['register-city']);
        $userStatement->bindParam(':zipcode', $_POST['register-zipcode']);
        $userStatement->bindParam(':address', $_POST['register-address']);
        $userStatement->bindParam(':verifyKey', $verifyKey);
        if ($userStatement->execute() === false) {
            throw new DatabaseException();
        }

        $to = $_POST['register-email'];
        $subject = 'Link potwierdzający rejestrację';
        $txt = ('Aby potwierdzić chęc rejestracji kliknij w następujący link: www.papershop.com.pl/?verify_email='.$verifyKey.' . Jeśli to nie ty chciałeś dokonać rejestracji, zignoruj ten link lub usuń wiadomość.
        Ps. Wiadomość została wygenerowana automatycznie - NIE ODPOWIADAJ na nią!');
        $headers = "From: rejestracja@papershop.com.pl" . "\r\n";
        mail($to, $subject, $txt, $headers);

        header('Location: /?page=registerThanks');
        die();
    }
}
