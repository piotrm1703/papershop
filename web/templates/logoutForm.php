<form action="/" method="post">
    <div class="logincontainer">
        <label style="margin-left: 660px;"> Witaj <b><?php echo htmlEscape($_SESSION['authenticatedUser'])?>!  </b></label>
        <button class="loginOutButton" name="logout" type="submit" onClick="return confirm('Czy na pewno chcesz się wylogować?')">Wyloguj</button>
    </div>
</form>
