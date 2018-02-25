<?php require_once (__DIR__.'/web/templates/contactform.php');

if(isset($_POST['submit'])){
    $firstname = htmlEscape($_POST['name']);
    $surname = htmlEscape($_POST['surname']);
    $email = htmlEscape($_POST['email']);
    $subject = htmlEscape($_POST['subject']);
    $content = htmlEscape($_POST['content']);
    $date = date("Y-m-d H:i:s");
    $status ='oczekujący';
    if(isset($firstname) && isset($surname) && isset($email) && isset($subject) && isset($content)){

        $sql = "INSERT INTO messages VALUES(NULL,'$firstname','$surname','$email','$subject','$content','$date','$status')";
        $insertMessagesStatement = $pdo->query($sql);
        if($insertMessagesStatement === false){
            throw new DatabaseException();
        }
        echo "<script> alert('Wiadomość została wysłana. Dziękujemy za kontakt!')</script>";
    }
}