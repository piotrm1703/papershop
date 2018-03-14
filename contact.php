<?php require_once (__DIR__.'/templates/contactform.php');

if(isset($_POST['submit'])){
    $firstname = ($_POST['contact-firstname']);
    $surname = ($_POST['contact-surname']);
    $email = ($_POST['contact-email']);
    $subject = ($_POST['contact-subject']);
    $content = ($_POST['contact-content']);
    $date = date("Y-m-d H:i:s");
    $status ='oczekujący';

    $insertMessagesStatement = $pdo->prepare('INSERT INTO messages VALUES(NULL,:firstname,:surname,:email,:subject,:content,:date,:status)');
    $insertMessagesStatement->bindParam(':firstname',$firstname);
    $insertMessagesStatement->bindParam(':surname',$surname);
    $insertMessagesStatement->bindParam(':email',$email);
    $insertMessagesStatement->bindParam(':subject',$subject);
    $insertMessagesStatement->bindParam(':content',$content);
    $insertMessagesStatement->bindParam(':date',$date);
    $insertMessagesStatement->bindParam(':status',$status);

    if($insertMessagesStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /');
    die();
}