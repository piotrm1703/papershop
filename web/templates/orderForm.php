<article>
    <div class="summary">
        <form action="" method="post">
            <input class="orderFormFields" type="text" id="name" name="name" placeholder="Podaj imię..." required>
            <label for="name">Imię</label>
            <br>
            <input class="orderFormFields" type="text" id="surname" name="surname" placeholder="Podaj nazwisko..." required>
            <label for="surname">Nazwisko</label>
            <br>
            <input class="orderFormFields" type="email" id="email" name="email"  placeholder="Podaj email..." required>
            <label for="email">E-mail</label>
            <br>
            <input class="orderFormFields" type="text" id="city" name="city" placeholder="Podaj miasto..." required>
            <label for="city">Miasto</label>
            <br>
            <input class="orderFormFields" type="text" id="zipcode" name="zipcode" minlength="6" maxlength="
            6" placeholder="Wpisz adres pocztowy" required>
            <label for="zipcode">Adres pocztowy</label>
            <br>
            <input class="orderFormFields" type="text" id="address" name="address" placeholder="Podaj adres..." required>
            <label for="address">Adres</label>
            <br>
            <input class="universalButton" type="submit" name="submit" value="Złóż zamówienie" onClick="return confirm('Czy na pewno chcesz złożyć to zamówienie?')">
        </form>
    </div>
</article>
