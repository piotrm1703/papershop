<?php

if (isset($_SESSION['cart'])) {
    if ($_SESSION['cart'] !== []) {
        $sql ='SELECT * FROM products WHERE id IN ('.implode(',', $_SESSION['cart']).')';
        $productsStatement = $pdo->query($sql);
        if ($productsStatement === false) {
            throw new Exception("Database error");
        }

        $cartProducts = $productsStatement->fetchAll(PDO::FETCH_OBJ);
        $duplicate = array_count_values($_SESSION['cart']);

        foreach ($cartProducts as $cartProduct) {
            $arraySum[] = $duplicate[$cartProduct->id] * htmlEscape($cartProduct->price);
            $arrayProduct[] = [
                'id'=> $cartProduct->id,
                'quantity'=> $duplicate[$cartProduct->id],
                'price'=> htmlEscape($cartProduct->price),
            ];

            echo '<div class="products">'.'<b>'.htmlEscape($cartProduct->content).'</b>'.' '.
                '-'.' '.'Ilość: '. $duplicate[$cartProduct->id] .', '.'suma: '.($duplicate[$cartProduct->id] * htmlEscape($cartProduct->price)).' '.'zł'.
                '</div>';
        }
        $sum = array_sum($arraySum);
        echo '<div class ="sum">'.'<b>'.'Do zapłaty: '.$sum.' zł'.'</b>'.'</div>';
    } else {
        echo 'Brak produktów!';

    }
} else {
    echo 'Brak produktów!';

}

require_once (__DIR__.'/web/templates/orderForm.php');

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
    $serialized = serialize($arrayProduct);
    $date = date("Y-m-d H:i:s");

    require_once('connectDB.php');
    $ordersStatement = $pdo->prepare("INSERT INTO orders VALUES(NULL,:name,:surname,:email,:city,:zipcode,:address,:sum,:products,:date,:status)");
    $ordersStatement->bindParam(':name', $_POST['name']);
    $ordersStatement->bindParam(':surname', $_POST['surname']);
    $ordersStatement->bindParam(':email', $_POST['email']);
    $ordersStatement->bindParam(':city', $_POST['city']);
    $ordersStatement->bindParam(':zipcode', $_POST['zipcode']);
    $ordersStatement->bindParam(':address', $_POST['address']);
    $ordersStatement->bindParam(':sum', $sum);
    $ordersStatement->bindParam(':products', $serialized);
    $ordersStatement->bindParam(':date', $date);
    $ordersStatement->bindParam(':status', $status);
    $ordersStatement->execute();
    if($ordersStatement === false){
        throw new Exception("Database error");
    }
    $_SESSION['cart'] = [];

       header('Location: /?page=orderThanks');
       die();
}