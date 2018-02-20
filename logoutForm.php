<form action="/" method="post">
    <div class="logincontainer">
        <label style="margin-left: 660px;"> Witaj <b><?php echo $_SESSION['authenticatedUser']?>!  </b></label>
        <button class="loginOutButton" name="logout" type="submit" >Wyloguj</button>
    </div>
</form>
