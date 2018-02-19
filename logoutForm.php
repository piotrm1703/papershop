<style>

    .logincontainer {
        width: 100%;
        border-top: 1px solid black;
        background-color: cadetblue;
    }

    .button {
        background-color: darkslategray;
        color: white;
        border-radius: 4px;
        padding: 0 0;
        margin: 1px 0;
        border: none;
        cursor: pointer;
        width: 15%;
        float: right;
    }
    .button:hover {
        opacity: 0.8;
        background-color: darkred;
    }

</style>

<form action="/" method="post">
    <div class="logincontainer">
        <label style="text-align: right"> Witaj <b><?php echo $_SESSION['authenticatedUser']?>!  </b></label>
        <button class="button" name="logout" type="submit" >Wyloguj</button>
    </div>
</form>
