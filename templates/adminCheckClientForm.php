<div class="check_user__data_form">
    <form action="/?page=orders" method="post">

        <?php foreach ($client as $k=> $v) {

            if ($v['id'] === $currentClient) { ?>
                <p><b>Nr zamówienia: <?php echo htmlEscape($v['id']); ?></b></p>
                <p><b>ID klienta: <?php echo htmlEscape($v['clientID']); ?></b></p>
                <p><b>Imię:</b> <?php echo htmlEscape($v['firstname']); ?></p>
                <p><b>Nazwisko:</b> <?php echo htmlEscape($v['surname']); ?></p>
                <p><b>Email:</b> <?php echo htmlEscape($v['email']); ?></p>
                <p><b>Miasto:</b> <?php echo htmlEscape($v['city']); ?></p>
                <p><b>Kod pocztowy:</b> <?php echo htmlEscape($v['zipcode']); ?></p>
                <p><b>Adres dostawy:</b> <?php echo htmlEscape($v['address']); ?></p>
                <?php
            }
        }
        ?>
        <input class="check_user_button" type="submit" name="submit" value="Powrót" >
    </form>
</div>
