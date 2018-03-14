<article>
    <div class="summary">
        <form action="" method="post">
            <h2>Dane do zamówienia:</h2>
            <p><b>Imię:</b> <?php echo htmlEscape($user['firstname']); ?></p>
            <p><b>Nazwisko:</b> <?php echo htmlEscape($user['surname']); ?></p>
            <p><b>Email:</b> <?php echo htmlEscape($user['email']); ?></p>
            <p><b>Miasto:</b> <?php echo htmlEscape($user['city']); ?></p>
            <p><b>Kod pocztowy:</b> <?php echo htmlEscape($user['zipcode']); ?></p>
            <p><b>Adres dostawy:</b> <?php echo htmlEscape($user['address']); ?></p>

<!--            <input class="orderFormFields" id="order-firstname" name="order-firstname" value="--><?php //echo htmlEscape($data['firstname']); ?><!--" required>-->
<!--            <label for="name">Imię</label>-->
<!--            <br>-->
<!--            <input class="orderFormFields" id="order-surname" name="order-surname" value="--><?php //echo htmlEscape($data['surname']); ?><!--" required>-->
<!--            <label for="surname">Nazwisko</label>-->
<!--            <br>-->
<!--            <input class="orderFormFields" type="email" id="order-email" name="order-email"  value="--><?php //echo htmlEscape($data['email']); ?><!--" required>-->
<!--            <label for="email">E-mail</label>-->
<!--            <br>-->
<!--            <input class="orderFormFields" id="order-city" name="order-city" value="--><?php //echo htmlEscape($data['city']); ?><!--" required>-->
<!--            <label for="city">Miasto</label>-->
<!--            <br>-->
<!--            <input class="orderFormFields" id="order-zipcode" name="order-zipcode" minlength="6" maxlength="6" value="--><?php //echo htmlEscape($data['zipcode']); ?><!--" required>-->
<!--            <label for="zipcode">Kod pocztowy</label>-->
<!--            <br>-->
<!--            <input class="orderFormFields" id="order-address" name="order-address" value="--><?php //echo htmlEscape($data['address']); ?><!--" required>-->
<!--            <label for="address">Adres</label>-->
<!--            <br>-->
            <input class="universalButton" type="submit" name="submit" value="Złóż zamówienie" onClick="return confirm('Czy na pewno chcesz złożyć to zamówienie?')">
        </form>
    </div>
</article>
