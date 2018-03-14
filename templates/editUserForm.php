<article>
    <div class="edit_user_form">
        <h1>Zmień swoje aktualne dane do wysyłki :) !</h1>
        <form action="/?page=edit_user" method="post">

            <p class="register_title">Imię</p>
            <input class="edit_user_field" id="edit-firstname" name="edit-firstname" placeholder="Podaj imię..." value="<?php echo htmlEscape($user['firstname']); ?>" required>

            <p class="register_title">Nazwisko</p>
            <input class="edit_user_field" id="edit-surname" name="edit-surname" placeholder="Podaj nazwisko..." value="<?php echo htmlEscape($user['surname']); ?>" required>

            <p class="register_title">Miasto</p>
            <input class="edit_user_field" id="edit-city" name="edit-city" placeholder="Podaj miasto..." value="<?php echo htmlEscape($user['city']); ?>" required>

            <p class="register_title">Kod pocztowy</p>
            <input class="edit_user_field" id="edit-zipcode" name="edit-zipcode" minlength="6" maxlength="6" placeholder="Wpisz kod pocztowy..." value="<?php echo htmlEscape($user['zipcode']); ?>" required>

            <p class="register_title">Adres</p>
            <input class="edit_user_lastfield" id="redit-address" name="edit-address" placeholder="Podaj adres dostawy..." value="<?php echo htmlEscape($user['address']); ?>" required>

            <input class="edit_submit_button" type="submit" name="edit_user" value="Zaktualizuj">
        </form>
    </div>
</article>
