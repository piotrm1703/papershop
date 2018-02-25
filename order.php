<?php

if (isset($_SESSION['cart'])) {
    if ($_SESSION['cart'] !== []) {
        $orderArray = $_SESSION['cart'];
        $convert = array_map('intval', $orderArray);
        $productsStatement = $pdo->query('SELECT * FROM products WHERE id IN ('.implode(',', $_SESSION['cart']).')');
        if ($productsStatement === false) {
            throw new DatabaseException();
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
            ?>
            <div class="products"><b><?php echo htmlEscape($cartProduct->content) ?></b>
               - Ilość: <?php echo htmlEscape($duplicate[$cartProduct->id]) ?> suma: <?php echo htmlEscape(($duplicate[$cartProduct->id]) * ($cartProduct->price)) ?> zł
                </div>

        <?php }
        $sum = array_sum($arraySum); ?>
        <div class ="sum"><b>Do zapłaty: <?php echo htmlEscape($sum) ?> zł</b></div>
   <?php } else {
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
        throw new DatabaseException();
    }
    $_SESSION['cart'] = [];
       header('Location: /?page=orderThanks');
       die();
}