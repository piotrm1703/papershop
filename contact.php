<?php require_once (__DIR__.'/templates/contactform.php');

if (isset($_POST['submit'])){
    if(!(isset($_POST['contact-firstname']) &&
        isset($_POST['contact-surname']) &&
        isset($_POST['contact-email']) &&
        isset($_POST['contact-subject']) &&
        isset($_POST['contact-content'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    if(empty($_POST['contact-firstname']) ||
        empty($_POST['contact-surname']) ||
        empty($_POST['contact-email']) ||
        empty($_POST['contact-subject']) ||
        empty($_POST['contact-content']
    )) {
        echo 'Uzupełnij wszystkie pola!';
    } else {

        $date = date("Y-m-d H:i:s");
        $status = 'oczekujący';

        $insertMessagesStatement = $pdo->prepare('INSERT INTO messages VALUES(NULL,:firstname,:surname,:email,:subject,:content,:date,:status)');
        $insertMessagesStatement->bindParam(':firstname', $_POST['contact-firstname']);
        $insertMessagesStatement->bindParam(':surname', $_POST['contact-surname']);
        $insertMessagesStatement->bindParam(':email', $_POST['contact-email']);
        $insertMessagesStatement->bindParam(':subject', $_POST['contact-subject']);
        $insertMessagesStatement->bindParam(':content', $_POST['contact-content']);
        $insertMessagesStatement->bindParam(':date', $date);
        $insertMessagesStatement->bindParam(':status', $status);

        if ($insertMessagesStatement->execute() === false) {
            throw new DatabaseException();
        }
        header('Location: /');
        die();
    }
}