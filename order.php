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
$usersStatement = $pdo->prepare('SELECT * FROM users WHERE username = ?');
$usersStatement->bindParam(1,$currentUser);
if($usersStatement->execute() === false){
    throw new DatabaseException();
}
$usersStatement = $usersStatement->fetchAll();

foreach ($usersStatement as $userData ){
    $data = $userData;
}

require_once (__DIR__.'/templates/orderForm.php');

if(isset($_POST['submit'])) {
    if (!(isset($_POST['name']) &&
        isset($_POST['surname']) &&
        isset($_POST['email']) &&
        isset($_POST['city']) &&
        isset($_POST['zipcode']) &&
        isset($_POST['address'])
    )) {
        throw new Exception('Jakiś gamoń kombinuje z polami');
    }

    $status='oczekujący';
    $serializedProducts = serialize($arrayProduct);
    $date = date("Y-m-d H:i:s");
    $userId = $data['id'];

    $ordersStatement = $pdo->prepare("INSERT INTO orders VALUES(NULL,?,?,?,?,?)");
    $ordersStatement->bindParam(1, $userId);
    $ordersStatement->bindParam(2, $sum);
    $ordersStatement->bindParam(3, $serializedProducts);
    $ordersStatement->bindParam(4, $date);
    $ordersStatement->bindParam(5, $status);
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