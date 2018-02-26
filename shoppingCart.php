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
    die();
}

if (isset($_POST['addOne'])) {
    if (isset($_SESSION['cart'])) {
        $sessionArray = $_SESSION['cart'];
    } else {
        $sessionArray = [];
    }
    $sessionArray[] = $_POST['addOne'];
    $_SESSION['cart'] = $sessionArray;
}

if (isset($_POST['deleteFromCart'])) {
    $sessionArray = $_SESSION['cart'];
    if (($key = array_search($_POST['deleteFromCart'], $sessionArray)) !== false) {
        unset($sessionArray[$key]);
    }
    $_SESSION['cart'] = $sessionArray;
    header('Location: /?page=shoppingCart');
    die();
}

if (isset($_POST['deleteAll'])){
    $_SESSION['cart'] = [];
    header('Location: /?page=shoppingCart');
    die();
}

if (isset($_SESSION['cart'])) {
    if ($_SESSION['cart'] !== []) {
        $cartArray = $_SESSION['cart'];
        $productIds = array_map('intval', $cartArray);

        $productsStatement = $pdo->query('SELECT * FROM products WHERE id IN ('.implode(',', $productIds).')');
        if ($productsStatement === false) {
            throw new DatabaseException();
        }
        $cartProducts = $productsStatement->fetchAll(PDO::FETCH_OBJ);
        $duplicate = array_count_values($_SESSION['cart']);

        foreach ($cartProducts as $cartProduct) {
            $count = $duplicate[$cartProduct->id];
            $productSum = $count * htmlEscape($cartProduct->price);

            require (__DIR__.'/templates/cartProductView.php');
        }
    } else {
        echo 'Koszyk jest pusty!';
    }

} else {
    echo 'Koszyk jest pusty!';
}
if(isset($_SESSION['cart']) && $_SESSION['cart'] !== []) {
    require_once (__DIR__.'/templates/cartButtons.php');
}


