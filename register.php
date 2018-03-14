<?php

require_once (__DIR__.'/templates/registerForm.php');

if(isset($_POST['register'])) {
    if (!(isset($_POST['firstname']) &&
        isset($_POST['surname']) &&
        isset($_POST['username']) &&
        isset($_POST['password']) &&
        isset($_POST['password2']) &&
        isset($_POST['email'])
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
        $email[] = $data->email;
    }

    if (!preg_match("/^[a-zA-Z]*$/",$_POST["firstname"])) {
        echo "W imieniu dozwolone są tylko litery!";
    }elseif(!preg_match("/^[a-zA-Z]*$/",$_POST["surname"])) {
        echo "W nazwisku dozwolone są tylko litery!";
    }elseif($_POST['password'] !== $_POST['password2']) {
        echo "Hasła różnią się!";
    }elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
        echo "Twoje hasło musi zawierać conajmniej 1 cyfrę!";
    }elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
        echo "Twoje hasło musi zawierać conajmniej 1 wielką literę!";
    }elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
        echo "Twoje hasło musi zawierać conajmniej 1 małą literę!";
    }elseif (in_array($_POST['username'],$username)) {
        echo 'Wybrana nazwa użytkownika już istnieje!';
    }elseif (in_array($_POST['email'],$email)) {
        echo 'Użytkownik o podanym emailu już istnieje!';
    }else {

        $verifyKey = generateRandomString();

        $userStatement = $pdo->prepare("INSERT INTO users VALUES(NULL,?,?,?,?,?,?,?,?,?)");
        $userStatement->bindParam(1, $_POST['firstname']);
        $userStatement->bindParam(2, $_POST['surname']);
        $userStatement->bindParam(3, $_POST['username']);
        $userStatement->bindParam(4, $_POST['password']);
        $userStatement->bindParam(5, $_POST['email']);
        $userStatement->bindParam(6, $_POST['city']);
        $userStatement->bindParam(7, $_POST['zipcode']);
        $userStatement->bindParam(8, $_POST['address']);
        $userStatement->bindParam(9, $verifyKey);
        if ($userStatement->execute() === false) {
            throw new DatabaseException();
        }

        $to = $_POST['email'];
        $subject = 'Link potwierdzający rejestrację';
        $txt = ('Aby potwierdzić chęc rejestracji kliknij w następujący link: www.papershop.com.pl/?verify_mail='.$verifyKey.' . Jeśli to nie ty chciałeś dokonać rejestracji, zignoruj ten link lub usuń wiadomość.');
        $headers = "From: rejestracja@papershop.com.pl" . "\r\n";
        mail($to, $subject, $txt, $headers);


        header('Location: /?page=registerThanks');
        die();
    }
}


