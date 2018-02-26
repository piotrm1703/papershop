<?php
$messagesStatement = $pdo->query("SELECT * FROM messages");
if ($messagesStatement === false) {
    throw new DatabaseException();
}

$currentPage = substr( $_GET['page'], 10);
$messagesArray = $messagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminReplyForm.php');

if(isset($_POST['submit'])){
    foreach (($messagesArray) as $k=> $v) {

        if ($v['id'] === $currentPage) {
            $to = $v['email'];
            $subject = 'Odpowiedz na pytanie dotyczące: ' . $v['subject'];
            $txt = ($_POST['replymsg']);
            $headers = "From: administracja@papershop.com.pl" . "\r\n";
            mail($to, $subject, $txt, $headers);
        }
    }
}
