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
        $username[] = $data->username;
        $emailArray[] = $data->email;
    }
    $email = $_POST['register-email'];

    if (!preg_match("/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu",$_POST["register-firstname"])) {
        echo 'W imieniu dozwolone są tylko wielkie i małe litery!';
    } elseif (empty($_POST["register-surname"])) {
        echo 'Podanie imienia jest wymagane!';
    } elseif (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ]*$/iu",$_POST["register-surname"])) {
        echo 'W nazwisku dozwolone są tylko wielkie, małe litery oraz myślnik!';
    } elseif (empty($_POST["register-surname"])) {
        echo 'Podanie nazwiska jest wymagane!';
    } elseif ($_POST['password'] !== $_POST['password_repeated']) {
        echo 'Hasła różnią się!';
    } elseif (strlen( $_POST['password']) < 8 || strlen( $_POST['password_repeated']) < 8) {
        echo 'Twoje hasło musi zawierać conajmniej 8 znaków!';
    } elseif (strlen( $_POST['password']) > 20 || strlen( $_POST['password_repeated']) > 20) {
        echo 'Twoje hasło może zawierać maksymalnie 20 znaków!';
    } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
        echo 'Twoje hasło musi zawierać conajmniej 1 cyfrę!';
    } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
        echo 'Twoje hasło musi zawierać conajmniej 1 wielką literę!';
    } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
        echo 'Twoje hasło musi zawierać conajmniej 1 małą literę!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Nieprawidłowy format email';
    } elseif (empty($_POST["register-city"])) {
        echo 'Podanie miasta jest wymagane!';
    } elseif (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu", $_POST['register-city'])) {
        echo 'Miasto może zawierać wyłącznie wielkie i małe litery!';
    } elseif (empty($_POST["register-zipcode"])) {
        echo 'Podanie kodu pocztowego jest wymagane!';
    } elseif (!preg_match("/^[0-9]{2}-[0-9]{3}$/", $_POST['register-zipcode'])) {
        echo 'Nieprawidłowy kod pocztowy!';
    } elseif (empty($_POST["register-address"])) {
        echo 'Podanie miasta jest wymagane!';
    } elseif (in_array($_POST['register-username'],$username)) {
        echo 'Wybrana nazwa użytkownika już istnieje!';
    } elseif (in_array($_POST['register-email'],$emailArray)) {
        echo 'Użytkownik o podanym emailu już istnieje!';
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


