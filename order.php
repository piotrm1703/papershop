<?php

if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
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
                if ($cartProduct->id == $productId) {
                    $productQuantity = $_SESSION['cart'][$productId];
                    $productSum = $productQuantity * ($cartProduct->price);
                    $arrayProduct[] = [
                        'id'=> $cartProduct->id,
                        'quantity'=> $productQuantity,
                        'price'=> ($cartProduct->price),
                    ];
                }
            }
            $arraySum[] = $productQuantity  * ($cartProduct->price);
            $sum = array_sum($arraySum);

            require (__DIR__.'/templates/orderProductView.php');
         }
         require (__DIR__ .'/templates/orderViewSum.php');

    } else {
        echo 'Brak produktów!';
    }
} else {
    echo 'Brak produktów!';
}

$currentUser = $_SESSION['authenticatedUser'];
$usersStatement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
$usersStatement->bindParam(':username',$currentUser);
if($usersStatement->execute() === false){
    throw new DatabaseException();
}
$usersStatement = $usersStatement->fetchAll();

foreach ($usersStatement as $userData ){
    $data = $userData;
}

require_once (__DIR__.'/templates/orderForm.php');

if(isset($_POST['submit'])) {
    if (!(isset($_POST['order-firstname']) &&
        isset($_POST['order-surname']) &&
        isset($_POST['order-email']) &&
        isset($_POST['order-city']) &&
        isset($_POST['order-zipcode']) &&
        isset($_POST['order-address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    $status='oczekujący';
    $serializedProducts = serialize($arrayProduct);
    $date = date("Y-m-d H:i:s");
    $userId = $data['id'];

    $ordersStatement = $pdo->prepare("INSERT INTO orders VALUES(NULL,:userId,:sum,:serializedProducts,:date,:status)");
    $ordersStatement->bindParam(':userId', $userId);
    $ordersStatement->bindParam(':sum', $sum);
    $ordersStatement->bindParam(':serializedProducts', $serializedProducts);
    $ordersStatement->bindParam(':date', $date);
    $ordersStatement->bindParam(':status', $status);
    if($ordersStatement->execute() === false){
        throw new DatabaseException();
    }
    $to = $_POST['email'];
    $subject = 'Potwierdzenie zamówienia';
    $txt = ('Zamówienie zostało przyjęte do realizacji. Suma złożonego zamówienia wynosi : '.$sum.' zł');
    $headers = "From: zamowienia@papershop.com.pl" . "\r\n";
    mail($to, $subject, $txt, $headers);

    $_SESSION['cart'] = [];
       header('Location: /?page=orderThanks');
       die();
}