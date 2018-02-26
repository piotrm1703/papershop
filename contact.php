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
    $insertMessagesStatement->bindParam(1,$surname);
    $insertMessagesStatement->bindParam(1,$email);
    $insertMessagesStatement->bindParam(1,$subject);
    $insertMessagesStatement->bindParam(1,$content);
    $insertMessagesStatement->bindParam(1,$date);
    $insertMessagesStatement->bindParam(1,$status);
    $insertMessagesStatement->execute();

    if($insertMessagesStatement === false){
        throw new DatabaseException();
    }
    echo "<script> alert('Wiadomość została wysłana. Dziękujemy za kontakt!')</script>";

}