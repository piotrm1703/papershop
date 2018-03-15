<div class="replyMsgForm">
    <p><b>Odpowiedź do wiadomości:</b></p>
    <form action="" method="post">

        <?php foreach ($messagesArray as $k=> $v) {

            if ($v['id'] === $currentPage) { ?>
                <label>Nadawca:</label> <?php echo htmlEscape($v['firstname']); echo $v['surname']; ?>
                <br>
                <label>Email : </label> <?php echo htmlEscape($v['email']); ?>
                <br>
                <label>Treść :</label> <?php echo htmlEscape($v['content']); ?>
                <br><br>
                <?php
            }
        }
        ?>
        <textarea class="replyMsgArea" name="replymsg" placeholder="Napisz treść wiadomości..." required></textarea>
        <input class="universalButton" type="submit" name="submit" value="Wyślij" onClick="return confirm('Czy na pewno chcesz wysłać tę wiadomość?')">
    </form>
</div>