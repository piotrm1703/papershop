<?php require_once ('web/templates/contactform.php');

if(isset($_POST['submit'])){
    $name = htmlEscape($_POST['name']);
    $surname = htmlEscape($_POST['surname']);
    $email = htmlEscape($_POST['email']);
    $subject = htmlEscape($_POST['subject']);
    $content = htmlEscape($_POST['content']);
    $date = date("Y-m-d H:i:s");
    $status ='oczekujący';
    if(isset($name) && isset($surname) && isset($email) && isset($subject) && isset($content)){
        require_once ('connectDB.php');
        // Query
        $stmt = $pdo->query("INSERT INTO messages VALUES(NULL,'$name','$surname','$email','$subject','$content','$date','$status')");
        if($stmt === false){
            throw new Exception("Database error");
        }
        echo "<script> alert('Wiadomość została wysłana. Dziękujemy za kontakt!')</script>";
    }
}