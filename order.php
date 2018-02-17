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
            //   var_dump($cartProduct);
            $id = $cartProduct->ID;
            $count = $duplicate[$id];
            $price = htmlEscape($cartProduct->price);
            $productSum = $count * $price;
            $arraySum[] = $productSum;
            $arrayProduct[] = [
                'id'=>$id,
                'quantity'=>$count,
                'price'=>$price,
             ];

            echo '<div class="products">'.'<b>'.htmlEscape($cartProduct->content).'</b>'.' '.
                '-'.' '.'Ilość: '.$count.', '.'suma: '.$productSum.' '.'zł'.
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

//var_dump($arrayProduct);

require_once ('orderForm.php');

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

    $orderArray = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'city' => $_POST['city'],
        'zipcode' => $_POST['zipcode'],
        'address' => $_POST['address'],
        'sum' => $sum,
        'products' => $arrayProduct,
    ];
    $status='oczekujące';
    $date = date("Y-m-d H:i:s");
    $serialized = serialize($orderArray);

    require_once('connectDB.php');
    // Query
    $stmt = $pdo->prepare("INSERT INTO orders VALUES(NULL, :data, :date, :status)");
    $stmt->bindParam(':data', $serialized);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    if($stmt === false){
        throw new Exception("Database error");
    }
    $_SESSION['cart'] = [];

    header('Location: /?page=orderThanks');
    echo "<script> alert('Zamówienie przyjęte do realizacji. Dziękujemy za zaufanie!!')</script>";

}