<article>
    <div class="summary">
        <form action="/?page=order" method="post">

            <h2>Dane do zamówienia:</h2>

            <p><b>Imię:</b> <?php echo htmlEscape($user['firstname']); ?></p>
            <p><b>Nazwisko:</b> <?php echo htmlEscape($user['surname']); ?></p>
            <p><b>Email:</b> <?php echo htmlEscape($user['email']); ?></p>
            <p><b>Miasto:</b> <?php echo htmlEscape($user['city']); ?></p>
            <p><b>Kod pocztowy:</b> <?php echo htmlEscape($user['zipcode']); ?></p>
            <p><b>Adres dostawy:</b> <?php echo htmlEscape($user['address']); ?></p>

            <input class="universalButton" type="submit" name="submit" value="Złóż zamówienie" onClick="return confirm('Czy na pewno chcesz złożyć to zamówienie?')">
        </form>
        <form action="/?page=edit_user" method="post">
            <button class="edit_user_order_button" name="editUser" type="submit">Edytuj dane</button>
        </form>
    </div>
</article>
