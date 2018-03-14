<article>
    <div class="registerForm">
        <h1>Załóż konto!</h1>
        <form action="/?page=register" method="post">

            <p class="register_title_p">Imię</p>
            <input class="register_field" id="register-firstname" name="register-firstname" placeholder="Podaj imię..." required>

            <p class="register_title_p">Nazwisko</p>
            <input class="register_field" id="register-surname" name="register-surname" placeholder="Podaj nazwisko..." required>

            <p class="register_title_p">Login</p>
            <input class="register_field" id="register-username" name="register-username" placeholder="Podaj login..." minlength="8" maxlength="254" required>

            <p class="register_title_p">Hasło</p>
            <input class="password_field" type="password" id="password" name="password" placeholder="Podaj hasło..." title="Conajmniej: 6 znaków,1 wielka litera,1 mała litera oraz 1 cyfra!" minlength="6" maxlength="20" required>
            <input class="password_field" type="password" id="password_repeated" name="password_repeated" placeholder="Podaj ponownie hasło..." minlength="6" maxlength="20" required>

            <p class="register_title_p">Email</p>
            <input class="register_field" type="email" id="register-email" name="register-email" placeholder="Podaj email..." maxlength="100" required>

            <p class="register_title_p">Miasto</p>
            <input class="register_field" id="register-city" name="register-city" placeholder="Podaj miasto..." required>

            <p class="register_title_p">Kod pocztowy</p>
            <input class="register_field" id="register-zipcode" name="register-zipcode" minlength="6" maxlength="6" placeholder="Wpisz kod pocztowy" required>

            <p class="register_title_p">Adres</p>
            <input class="register_field" id="register-address" name="register-address" placeholder="Podaj adres dostawy..." required>

            <input class="final_register_button" type="submit" name="register" value="Zarejestruj">
        </form>
    </div>
</article>
