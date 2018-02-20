<?php

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    //   var_dump($cart);
    if ($cart !== []) {
        $stmt1 = $pdo->query('SELECT * FROM products WHERE ID IN ('.implode(',', $cart).')');
        if ($stmt1 === false) {
            throw new Exception("Database error");
        }

        $cartProducts = $stmt1->fetchAll(PDO::FETCH_OBJ);
        $duplicate = array_count_values($cart);

        foreach ($cartProducts as $cartProduct) {
            $id = $cartProduct->ID;
            $count = $duplicate[$id];
            $price = htmlEscape($cartProduct->price);
            $arraySum[] = $count * $price;
            $arrayProduct[] = [
                'id'=>$id,
                'quantity'=>$count,
                'price'=>$price,
            ];

            echo '<div class="products">'.'<b>'.htmlEscape($cartProduct->content).'</b>'.' '.
                '-'.' '.'Ilość: '.$count.', '.'suma: '.($count * $price).' '.'zł'.
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

require_once ('web/templates/orderForm.php');

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
    // Query
    $stmt = $pdo->prepare("INSERT INTO orders VALUES(NULL,:name,:surname,:email,:city,:zipcode,:address,:sum,:products,:date,:status)");
    var_dump($stmt);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':surname', $_POST['surname']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':city', $_POST['city']);
    $stmt->bindParam(':zipcode', $_POST['zipcode']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':sum', $sum);
    $stmt->bindParam(':products', $serialized);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    if($stmt === false){
        throw new Exception("Database error");
    }
    $_SESSION['cart'] = [];

    //   header('Location: /?page=orderThanks');
    echo "<script> alert('Zamówienie przyjęte do realizacji. Dziękujemy za zaufanie!!')</script>";

}