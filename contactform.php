<style>

    select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .textinput {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: orange;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        opacity: 0.8;
        background-color: coral;
    }

    .contactform {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 10px;
        margin: 10px;
    }

</style>

<div class="contactform">
    <h1>Skontaktuj się z nami!</h1>
    <form action="" method="post">

        <label for="name">Imię</label>
        <input class="textinput" type="text" id="name" name="name" placeholder="Podaj imię..." required>

        <label for="surname">Nazwisko</label>
        <input class="textinput" type="text" id="surname" name="surname" placeholder="Podaj nazwisko..." required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email"  placeholder="Podaj email..." required>

        <label for="subject">Temat</label>
        <select title="sub" name="subject" id="subject" required>
            <option disabled selected value> -- Wybierz temat -- </option>
            <option value="products">Produkty w sprzedaży</option>
            <option value="delivery">Dostawa</option>
            <option value="other">Inny temat</option>
        </select>

        <label for="content">Treść</label>
        <textarea id="content" name="content" placeholder="Napisz treść wiadomości..." style="height: 150px" required></textarea>

        <input type="submit" name="submit" value="Wyślij">
    </form>
</div>
