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
    if ($_SESSION['cart'] !== []) {
        $stmt1 = $pdo->query('SELECT * FROM products WHERE ID IN ('.implode(',', $_SESSION['cart']).')');
        if ($stmt1 === false) {
            throw new Exception("Database error");
        }
        $cartProducts = $stmt1->fetchAll(PDO::FETCH_OBJ);
        $duplicate = array_count_values($_SESSION['cart']);

        foreach ($cartProducts as $cartProduct) {
            $count = $duplicate[$cartProduct->ID];
            $productSum = $count * htmlEscape($cartProduct->price);

            require ('web/templates/cartProductView.php');
        }
    } else {
        echo 'Koszyk jest pusty!';
    }
} else {
    echo 'Koszyk jest pusty!';
}
if($_SESSION['cart'] !== []) {
    require_once ('web/templates/cartButtons.php');
}


