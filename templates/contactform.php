<article>
    <h1 style="color:darkslategray">Kontakt</h1>
    <pre>
    Wsparcie klienta               - przedsiebiorstwopoligraficzne@poczta.pl
    Dział sprzedaży (Adam Lisicki) - a.lisicki@poczta.pl
    Obsługa techniczna strony      - o.tech@poczta.pl
    Webmaster (Krzysztof Kot)      - k.kot@poczta.pl
    </pre>

    <h2 style="color:darkslategray">Przedsiębiorstwo poligraficzne Sp. z o.o.</h2>
    <pre>
        ul. Przesiębiorcza 5
        26-800 Polia
        tel.  11 123 45 67
        tel.  11 234 56 78
    </pre>

    <h2 style="color:darkslategray">Oddział II</h2>
    <pre>
        ul. Poligraficzna 6
        12-123 Myszów
        tel./fax 22 123 12 12
        kom. 567 234 234
    </pre>

    <p><b>Zapraszamy do korzystania z naszych usług.</b></p>

    <div class="contactForm">
        <h1>Skontaktuj się z nami!</h1>
        <form action="" method="post">

            <label for="name">Imię</label>
            <input class="contactformFields" id="name" name="name" placeholder="Podaj imię..." required>

            <label for="surname">Nazwisko</label>
            <input class="contactformFields" id="surname" name="surname" placeholder="Podaj nazwisko..." required>

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

            <input class="universalButton" type="submit" name="submit" value="Wyślij" onClick="return confirm('Czy na pewno chcesz wysłać tę wiadomość?')">
        </form>
    </div>
</article>

