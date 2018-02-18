<style>

    .logincontainer {
        width: 100%;
        border-top: 1px solid black;
        background-color: cadetblue;
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
        background-color: darkcyan;
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

<form action="/" method="post">
    <div class="logincontainer">
        <label style="margin-left: 80px;"><b>Login</b></label>
        <input class = "login" type="text" placeholder="Wpisz login" name="username" required>

        <label><b>Hasło</b></label>
        <input type="password" placeholder="Wpisz hasło" name="psw" required>

        <button class="button" name="login" type="submit">Login</button>
    </div>
</form>