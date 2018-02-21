<style>

    select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .orderFormFields {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: orange;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        opacity: 0.8;
        background-color: coral;
    }

    .contactform {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin: 15px 10px 10px 215px;
    }

</style>

<div class="contactform">
    <p><b>Odpowiedź do wiadomości:</b></p>
    <form action="" method="post">
        <?php
        $stmt = $pdo->prepare('SELECT * FROM messages');
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (($stmt->fetchAll()) as $k=>$v) {

            $page = $_GET['page'];
            $msgID = substr($page, 10);
            $from = $v['email'];
            if ($v['ID'] === $msgID) {
                echo 'Nadawca :'.' '.$v['firstname'].' '.$v['surname'];
                echo '<br>';
                echo 'Email :'.' '.$from;
                echo '<br>';
                echo 'Treść :'.' '.$v['content'];
                echo '<br>'.'<br>';
                if(isset($_POST['submit'])){
//                    ini_set('SMTP', "smtp.gmail.com");
//                    ini_set('smtp_port', "465");
//                    ini_set('username', "papershoppingorder@gmail.com");
//                    ini_set('password', "papershop2");
//                    ini_set('sendmail_from', "papershoppingorder@gmail.com");
                    $to = $from;
                    $subject = 'Odpowiedz na pytanie dotyczące: '.$v['subject'];
                    $txt = "Hello world!";
                    $headers = "From: webmaster@example.com" . "\r\n" .
                        "CC: somebodyelse@example.com";

                    mail($to,$subject,$txt,$headers);
                }

            }
        }
        ?>
        <textarea id="content" name="content" placeholder="Napisz treść wiadomości..." style="height: 150px" required></textarea>

        <input type="submit" name="submit" value="Wyślij">
    </form>
</div>
<?php

var_dump($v);

?>