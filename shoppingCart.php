<article class="cart">
    <h2 style="text-align: center" >Zawartość koszyka</h2>
</article>

<?php

if (isset($_POST['addToCart']) && $_POST['quantity']>0) {
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

        $productsStatement = $pdo->query('
            SELECT products.id, products.category, products.content, uploads.url , products.price 
            FROM products 
            INNER JOIN uploads ON products.uploadID = uploads.id 
            WHERE products.id IN ('.implode(',', $productIds).')
            ORDER BY products.content
        ');

        if ($productsStatement === false) {
            throw new DatabaseException();
        }
        $cartProducts = $productsStatement->fetchAll(PDO::FETCH_OBJ);

        foreach ($cartProducts as $cartProduct) {
            foreach ($productIds as $productId) {
                if ($cartProduct->id == $productId) {
                    $productQuantity = $_SESSION['cart'][$productId];
                }
            }
            $productSum = $productQuantity  * ($cartProduct->price);
            require (__DIR__.'/templates/cartView.php');
        }

    } else {
        echo 'Koszyk jest pusty!Pamiętaj, aby '.'<b>'.'zalogować się'.'</b>'.' przed dokonaniem zakupów :)';
    }

} else {
    echo 'Koszyk jest pusty!Pamiętaj, aby '.'<b>'.'zalogować się'.'</b>'.' przed dokonaniem zakupów :)';
}
if(isset($_SESSION['cart']) && $_SESSION['cart'] !== []) {
    require_once (__DIR__.'/templates/cartButtons.php');
}
