<article class="cart">
    <h2 style="text-align: center" >Zawartość koszyka</h2>
</article>

<?php

if (isset($_POST['addToCart'])) {
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'];
    } else {
        $_SESSION['cart'] = [];
    }

    $productId = $_POST['addToCart'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$productId] = $quantity;

    header('Location: /?page=shoppingCart');
    die();
}

if (isset($_POST['addOne'])) {
    foreach (array_keys($_SESSION['cart']) as $productId){
        if($productId == $_POST['addOne']) {
            $_SESSION['cart'][$productId]++;
        }
    }
    header('Location: /?page=shoppingCart');
    die();
}
if (isset($_POST['minusOne'])) {
    foreach (array_keys($_SESSION['cart']) as $productId){
        if($productId == $_POST['minusOne']) {
            $_SESSION['cart'][$productId]--;
        }
    }
    header('Location: /?page=shoppingCart');
    die();
}

if (isset($_POST['deleteFromCart'])) {
    foreach (array_keys($_SESSION['cart']) as $productId){
        if($productId == $_POST['deleteFromCart']) {
            unset($_SESSION['cart'][$productId]);
        }
    }
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
        $productIds = array_map('intval',array_keys($_SESSION['cart']));

        $productsStatement = $pdo->query('SELECT * FROM products WHERE id IN ('.implode(',', $productIds).') ORDER BY content');
        if ($productsStatement === false) {
            throw new DatabaseException();
        }
        $cartProducts = $productsStatement->fetchAll(PDO::FETCH_OBJ);

        foreach ($cartProducts as $cartProduct) {
            foreach ($productIds as $productId) {
//                $a = $key;
                if ($cartProduct->id == $productId) {
                    $productQuantity = $_SESSION['cart'][$productId];
                }
            }
            $productSum = $productQuantity  * ($cartProduct->price);
            require (__DIR__.'/templates/cartView.php');
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
















