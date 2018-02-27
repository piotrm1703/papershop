<?php
$messagesStatement = $pdo->query("SELECT * FROM messages");
if ($messagesStatement === false) {
    throw new DatabaseException();
}

$currentPage = substr( $_GET['page'], 10);
$messagesArray = $messagesStatement->fetchAll();

require_once (__DIR__.'/templates/adminReplyForm.php');

if(isset($_POST['submit'])){
    foreach (($messagesArray) as $k=>$v) {
        $status = 'odpowiedziano';
        $productId = $v['id'];
        if($productId === $currentPage){
            $messageStatement = $pdo->prepare("UPDATE messages SET status = ? WHERE id = ?");
            $messageStatement->bindParam(1, $status);
            $messageStatement->bindParam(2, $productId);
            if($messageStatement->execute() === false){
                throw new DatabaseException();
            }
        }

        if ($v['id'] === $currentPage) {
            $to = $v['email'];
            $subject = 'Odpowiedz na pytanie dotyczące: ' . $v['subject'];
            $txt = ($_POST['replymsg']);
            $headers = "From: administracja@papershop.com.pl" . "\r\n";
            mail($to, $subject, $txt, $headers);
        }
    }
    header('Location: /?page=messages');
    die();
}
