<style>

    .logincontainer {
        width: 100%;
        border-top: 1px solid black;
    }
    input[type=password] {
        width: 20%;
        padding: 12px 20px;
        margin: 2px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .login {
        width: 20%;
        padding: 12px 20px;
        margin: 2px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .button {
        background-color: orange;
        color: white;
        border-radius: 4px;
        padding: 14px 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 15%;
    }
    .button:hover {
        opacity: 0.8;
        background-color: coral;
    }

</style>

<form action="/action_page.php">
    <div class="logincontainer">
        <label style="margin-left: 80px;"><b>Login</b></label>
        <input class = "login" type="text" placeholder="Wpisz login" name="userName" required>

        <label><b>Hasło</b></label>
        <input type="password" placeholder="Wpisz hasło" name="psw" required>

        <button class = "button" type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember me
    </div>
</form>
