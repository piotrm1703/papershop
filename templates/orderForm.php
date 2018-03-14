<article>
    <div class="summary">
        <form action="" method="post">
            <input class="orderFormFields" id="name" name="name" value="<?php echo htmlEscape($data['firstname']); ?>" required>
            <label for="name">Imię</label>
            <br>
            <input class="orderFormFields" id="surname" name="surname" value="<?php echo htmlEscape($data['surname']); ?>" required>
            <label for="surname">Nazwisko</label>
            <br>
            <input class="orderFormFields" type="email" id="email" name="email"  value="<?php echo htmlEscape($data['email']); ?>" required>
            <label for="email">E-mail</label>
            <br>
            <input class="orderFormFields" id="city" name="city" value="<?php echo htmlEscape($data['city']); ?>" required>
            <label for="city">Miasto</label>
            <br>
            <input class="orderFormFields" id="zipcode" name="zipcode" minlength="6" maxlength="6" value="<?php echo htmlEscape($data['zipcode']); ?>" required>
            <label for="zipcode">Kod pocztowy</label>
            <br>
            <input class="orderFormFields" id="address" name="address" value="<?php echo htmlEscape($data['address']); ?>" required>
            <label for="address">Adres</label>
            <br>
            <input class="universalButton" type="submit" name="submit" value="Złóż zamówienie" onClick="return confirm('Czy na pewno chcesz złożyć to zamówienie?')">
        </form>
    </div>
</article>
