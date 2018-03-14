<article>
    <div class="registerForm">
        <h1>Załóż konto!</h1>
        <form action="/?page=register" method="post">

            <label for="name">Imię</label><br>
            <input class="register_field" id="firstname" name="firstname" placeholder="Podaj imię..." required><br>

            <label for="surname">Nazwisko</label><br>
            <input class="register_field" id="surname" name="surname" placeholder="Podaj nazwisko..." required><br>

            <label for="username">Login</label><br>
            <input class="register_field" id="username" name="username" placeholder="Podaj login..." minlength="8" maxlength="254" required><br>

            <label for="password">Hasło</label><br>
            <input class="password_field" type="password" id="password" name="password" placeholder="Podaj hasło..." title="Conajmniej: 6 znaków,1 wielka litera,1 mała litera oraz 1 cyfra!" minlength="6" maxlength="20" required>
            <input class="password_field" type="password" id="password_repeated" name="password_repeated" placeholder="Podaj ponownie hasło..." minlength="6" maxlength="20" required><br>

            <label for="email">E-mail</label><br>
            <input class="register_field" type="email" id="email" name="email" placeholder="Podaj email..." maxlength="100" required><br>

            <label for="city">Miasto</label><br>
            <input class="register_field" id="city" name="city" placeholder="Podaj miasto..." required><br>

            <label for="zipcode">Kod pocztowy</label><br>
            <input class="register_field" id="zipcode" name="zipcode" minlength="6" maxlength="6" placeholder="Wpisz kod pocztowy" required><br>

            <label for="address">Adres</label><br>
            <input class="register_field" id="address" name="address" placeholder="Podaj adres dostawy..." required><br>

            <input class="universalButton" type="submit" name="register" value="Zarejestruj">
        </form>
    </div>
</article>
