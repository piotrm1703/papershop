<div class="replyMsgForm">
    <p><b>Odpowiedź do wiadomości:</b></p>
    <form action="" method="post">

        <?php foreach (($stmt->fetchAll()) as $k=>$v) {

            $msgID = substr( $_GET['page'], 10);
            if ($v['ID'] === $msgID) { ?>
                <label>Nadawca:</label> <?php echo $v['firstname']; echo $v['surname']; ?>
                <br>
                <label>Email : </label> <?php echo $v['email']; ?>
                <br>
                <label>Treść :</label> <?php echo $v['content']; ?>
                <br><br>
                <?php
            }
        }
        ?>
        <textarea class="replyMsgArea" name="replymsg" placeholder="Napisz treść wiadomości..." required></textarea>
        <input class="universalButton" type="submit" name="submit" value="Wyślij" onClick="return confirm('Czy na pewno chcesz wysłać tę wiadomość?')">
    </form>
</div>