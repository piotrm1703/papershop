<div class="contactform">
    <h1>Skontaktuj się z nami!</h1>
    <form action="" method="post">

        <label for="name">Imię</label>
        <input class="contactformFields" type="text" id="name" name="name" placeholder="Podaj imię..." required>

        <label for="surname">Nazwisko</label>
        <input class="contactformFields" type="text" id="surname" name="surname" placeholder="Podaj nazwisko..." required>

        <label for="email">E-mail</label>
        <input class="contactformFields" type="email" id="email" name="email" placeholder="Podaj email..." required>

        <label for="subject">Temat</label>
        <select class="contactformFields" title="sub" name="subject" id="subject" required>
            <option disabled selected value> -- Wybierz temat -- </option>
            <option value="products">Produkty w sprzedaży</option>
            <option value="delivery">Dostawa</option>
            <option value="other">Inny temat</option>
        </select>

        <label for="content">Treść</label>
        <textarea class="contactformFields" id="content" name="content" placeholder="Napisz treść wiadomości..." style="height: 150px" required></textarea>

        <input class="universalButton" type="submit" name="submit" value="Wyślij">
    </form>
</div>
