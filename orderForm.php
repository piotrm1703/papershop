<style>

    .textinput {
        width: 50%;
        padding: 3px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 50%;
        padding: 3px;
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

    .summary {
        border-radius: 50px;
        background-color: aliceblue;
        padding: 20px;
        margin: -5px 15px 5px -5px;
    }
    .products {
        border-radius: 30px;
        background-color: aliceblue;
        padding: 5px;
        margin: 7px 15px -5px 215px;
    }
    .sum {
        border: 1px solid;
        border-radius: 30px;
        background-color: orange;
        padding: 5px;
        margin: 10px 15px 10px 215px;
        color: black;
        text-align: center;
    }
</style>

<article>
    <div class="summary">
        <form action="" method="post">
            <input class="textinput" type="text" id="name" name="name" placeholder="Podaj imię..." required>
            <label for="name">Imię</label>
            <br>
            <input class="textinput" type="text" id="surname" name="surname" placeholder="Podaj nazwisko..." required>
            <label for="surname">Nazwisko</label>
            <br>
            <input type="email" id="email" name="email"  placeholder="Podaj email..." required>
            <label for="email">E-mail</label>
            <br>
            <input class="textinput" type="text" id="city" name="city"  placeholder="Podaj miasto..." required>
            <label for="city">Miasto</label>
            <br>
            <input class="textinput" type="text" id="zipcode" name="zipcode" minlength="6" maxlength="
            6" placeholder="Wpisz adres pocztowy" required>
            <label for="zipcode">Adres pocztowy</label>
            <br>
            <input class="textinput" type="text" id="address" name="address"  placeholder="Podaj adres..." required>
            <label for="address">Adres</label>
            <br>
            <input type="submit" name="submit" value="Złóż zamówienie">
        </form>
    </div>
</article>
