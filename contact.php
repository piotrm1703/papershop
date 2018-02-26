<?php require_once (__DIR__.'/templates/contactform.php');

if(isset($_POST['submit'])){
    $firstname = ($_POST['name']);
    $surname = ($_POST['surname']);
    $email = ($_POST['email']);
    $subject = ($_POST['subject']);
    $content = ($_POST['content']);
    $date = date("Y-m-d H:i:s");
    $status ='oczekujący';

    $insertMessagesStatement = $pdo->prepare("INSERT INTO messages VALUES(NULL,?,?,?,?,?,?,?)");
    $insertMessagesStatement->bindParam(1,$firstname);
    $insertMessagesStatement->bindParam(2,$surname);
    $insertMessagesStatement->bindParam(3,$email);
    $insertMessagesStatement->bindParam(4,$subject);
    $insertMessagesStatement->bindParam(5,$content);
    $insertMessagesStatement->bindParam(6,$date);
    $insertMessagesStatement->bindParam(7,$status);
    $insertMessagesStatement->execute();

    if($insertMessagesStatement === false){
        throw new DatabaseException();
    }
    echo "<script> alert('Wiadomość została wysłana. Dziękujemy za kontakt!')</script>";

}