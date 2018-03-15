<form action="/" method="post">
    <div>
        <label class="logoutlabel"> Witaj <b><?php echo $username; ?>!  </b></label>
        <button class="loginOutButton" name="logout" type="submit" onClick="return confirm('Czy na pewno chcesz się wylogować?')">Wyloguj</button>
    </div>
</form>
<form action="/?page=edit_user" method="post">
    <div style="margin-bottom: -38px;">
        <button class="edit_user_button" name="editUser" type="submit">Edytuj konto</button>
    </div>
</form>
