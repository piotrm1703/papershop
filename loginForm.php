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

<form action="/?page=testy" method="post">
    <div class="logincontainer">
        <label style="margin-left: 80px;"><b>Login</b></label>
        <input class = "login" type="text" placeholder="Wpisz login" name="username" required>

        <label><b>Hasło</b></label>
        <input type="password" placeholder="Wpisz hasło" name="psw" required>

        <button class="button" name="login" type="submit">Login</button>
    </div>
</form>







<?php
if(isset($_POST['login'])){
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        } else {
        $username = [];
        }
        $username[] = $_POST['username'];
        $_SESSION['username'] = $username;
          header('Location: /?page=testy');

//        if($username !== []){
//            $usr = $_POST['username'];
//            $password = $_POST['psw'];
//            $stmt = $pdo->query('SELECT * FROM accounts WHERE username="'.$usr.'" AND password="'.$password.'"');
//        if($stmt === false){
//            throw new Exception("Database error");
//        }
//        $count = $stmt->rowCount();
//        if($count == 1){
//            $_SESSION['username'] = $username;
//            header('Location: /?page=testy');
//        } else {
//            echo 'Invalid account';
//        }
//      }
}

//if (isset($_POST['addToCart'])) {
//    if (isset($_SESSION['cart'])) {
//        $sessionArray = $_SESSION['cart'];
//    } else {
//        $sessionArray = [];
//    }
//
//    $sessionArray[] = $_POST['addToCart'];
//    $_SESSION['cart'] = $sessionArray;
//    header('Location: /?page=shoppingCart');
//}