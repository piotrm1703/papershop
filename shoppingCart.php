<style>
    .deleteFromCart {
        background-color: red;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }
    .deleteFromCart:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .summaryButton {
        background-color: darkcyan;
        color: white;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        width: 68%;
        position: relative;
        bottom: 5px;
        font-size: 20px;
    }
    .summaryButton:hover {
        background-color: darkred;
        opacity: 0.8;
    }
    .deleteAll {
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 30px;
        cursor: pointer;
        width: 30%;
        position: relative;
        bottom: 38px;
        right: 10px;
        float: right;
        font-size: 20px;
    }
    .deleteAll:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .shoppingCart {
        border-radius: 5px;
        background-color: aliceblue;
        padding: 5px;
        margin: -5px 10px 10px 220px;
    }
</style>

<article class="cart">
    <h2 style="text-align: center" >Zawartość koszyka</h2>
</article>

<?php
if (isset($_POST['addToCart'])) {
    if (isset($_SESSION['cart'])) {
        $sessionArray = $_SESSION['cart'];
    } else {
        $sessionArray = [];
    }

    $sessionArray[] = $_POST['addToCart'];
    $_SESSION['cart'] = $sessionArray;
    header('Location: /?page=shoppingCart');
}

if (isset($_POST['deleteFromCart'])) {
    $sessionArray = $_SESSION['cart'];
    if (($key = array_search($_POST['deleteFromCart'], $sessionArray)) !== false) {
        unset($sessionArray[$key]);
    }
    $_SESSION['cart'] = $sessionArray;
    header('Location: /?page=shoppingCart');
}

if (isset($_POST['deleteAll'])){
    $_SESSION['cart'] = [];
    header('Location: /?page=shoppingCart');
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if ($cart !== []) {
        $stmt1 = $pdo->query('SELECT * FROM products WHERE ID IN ('.implode(',', $cart).')');
        if ($stmt1 === false) {
            throw new Exception("Database error");
        }

        $cartProducts = $stmt1->fetchAll(PDO::FETCH_OBJ);
        $duplicate = array_count_values($cart);

        foreach ($cartProducts as $cartProduct) {
            //   var_dump($cartProduct);
            $id = $cartProduct->ID;
            $count = $duplicate[$id];
            $price = htmlEscape($cartProduct->price);
            $productSum = $count * $price;

            echo '<div class="shoppingCart">'.'<b>'.htmlEscape($cartProduct->content).'</b>'.' '.
                '<img src='.htmlEscape($cartProduct->img).' '.'class = "imgView">'.' '.
                '<p class="price">'.' '.'Cena'.' '.$productSum.' '.'zł'.'</p>'.
                '<form action="/?page=shoppingCart" method="post">'.
                '<button class="deleteFromCart" type="submit" name="deleteFromCart"  value="'.$cartProduct->ID.'">Usuń 1szt.</button>'.
                '</form>'.'</div>';
        }
    } else {
        echo 'Koszyk jest pusty!';
    }
} else {
    echo 'Koszyk jest pusty!';
}
if($_SESSION['cart'] !== [])
{
    echo '<article class="cart">'.'<form action="/?page=order" method="post">'.
        '<button class="summaryButton" type="submit" name="summary" >Podsumowanie</button>'.'</form>'.
        '<form action="/?page=shoppingCart" method="post">'.
        '<button class="deleteAll" type="submit" name="deleteAll" >Usuń wszystko</button>'.'</form>'.
        '</article>';
}