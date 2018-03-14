<article>
    <div class="registerForm">
        <h1>Załóż konto!</h1>
        <form action="" method="post">

            <label for="name">Imię</label><br>
            <input class="registerFields" type="text" id="firstname" name="firstname" placeholder="Podaj imię..." required><br>

            <label for="surname">Nazwisko</label><br>
            <input class="registerFields" type="text" id="surname" name="surname" placeholder="Podaj nazwisko..." required><br>

            <label for="username">Login</label><br>
            <input class="registerFields" type="text" id="username" name="username" placeholder="Podaj login..." minlength="8" maxlength="254" required><br>

            <label for="password">Hasło</label><br>
            <input class="passwordField" type="password" id="password" name="password" placeholder="Podaj hasło..." title="Conajmniej: 6 znaków,1 wielka litera,1 mała litera oraz 1 cyfra!" minlength="6" maxlength="20" required>
            <input class="passwordField" type="password" id="password2" name="password2" placeholder="Podaj ponownie hasło..." minlength="6" maxlength="20" required><br>

            <label for="email">E-mail</label><br>
            <input class="registerFields" type="email" id="email" name="email" placeholder="Podaj email..." maxlength="100" required><br>

            <label for="city">Miasto</label><br>
            <input class="registerFields" type="text" id="city" name="city" placeholder="Podaj miasto..." required><br>

            <label for="zipcode">Kod pocztowy</label><br>
            <input class="registerFields" type="text" id="zipcode" name="zipcode" minlength="6" maxlength="6" placeholder="Wpisz kod pocztowy" required><br>

            <label for="address">Adres</label><br>
            <input class="registerFields" type="text" id="address" name="address" placeholder="Podaj adres dostawy..." required><br>

            <input class="universalButton" type="submit" name="register" value="Zarejestruj">
        </form>
    </div>
</article>

