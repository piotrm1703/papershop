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
            //    ini_set('SMTP', "smtp.gmail.com");
            //    ini_set('smtp_port', "465");
            //    ini_set('username', "papershoppingorder@gmail.com");
            //    ini_set('password', "papershop2");
            //    ini_set('sendmail_from', "papershoppingorder@gmail.com");
            $to = $v['email'];
            $subject = 'Odpowiedz na pytanie dotyczące: ' . $v['subject'];
            $txt = htmlEscape($_POST('replymsg'));
            $headers = "From: administracja@papershop.com" . "\r\n";
            mail($to, $subject, $txt, $headers);
        }
    }
}
