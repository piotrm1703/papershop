<?php
error_reporting(E_ALL);

function myErrorHandler(){
    ob_get_clean();
    echo "Przepraszamy, wystąpił błąd";
}
if (!file_exists("debug.txt")) {
    set_error_handler("myErrorHandler");
    set_exception_handler("myErrorHandler");
}
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> System cyfrowej sprzedaży produktów i usług</title>
</head>
<body>
<?php


require_once ('../functions.php');

?>
<div class="pageContainer">

    <?php
    siteInterface();
    if(isset($_GET['page'])) {
        require_once (__DIR__.'/../connectDB.php');
        $page = $_GET['page'];
        $sql ='SELECT * FROM products';
        $productsStatement = $pdo->query($sql);
        if($productsStatement === false){
            throw new Exception("Database error");
        }
        while ($row = $productsStatement->fetch(PDO::FETCH_OBJ)) {
            if ($row->category === $page) {
                require (__DIR__.'/templates/productViewForm.php');
                $dsn = null;
            }
        }

        $sql1 = 'SELECT * FROM messages';
        $messagesStatement = $pdo->prepare($sql1);
        $messagesStatement->execute();
        $result = $messagesStatement->setFetchMode(PDO::FETCH_ASSOC);
        if($messagesStatement === false){
            throw new Exception("Database error");
        }
        while ($row2 = $messagesStatement->fetch(PDO::FETCH_OBJ)){
            if($page === 'adminReply'.$row2->id){
                require (__DIR__.'/../adminReply.php');
            }
        }

        $sql2 ='SELECT * FROM products';
        $productsStatement = $pdo->prepare($sql2);
        $productsStatement->execute();
        $result = $productsStatement->setFetchMode(PDO::FETCH_ASSOC);
        if($productsStatement === false){
            throw new Exception("Database error");
        }
        $arrayQuantity2 = $productsStatement->rowCount();
        for ($y = 0; $y <= ($arrayQuantity2 - 1); $y++){
            while ($row3 = $productsStatement->fetch(PDO::FETCH_OBJ)){
                if($page === 'editProduct'.$row3->id){
                    require (__DIR__.'/../adminEditProduct.php');
                }
            }
        }

        $pages = [
          'offer' => '/templates/offer.php',
          'promotions' => '/../promotions.php',
          'contact' => '/../contact.php',
          'file' => '/../adminAddImg.php',
          'newitem' => '/../adminNewItem.php',
          'deleteitem' => '/../admindeleteitem.php',
          'orders' => '/../adminOrders.php',
          'orders-search' => '/../adminOrdersSearched.php',
          'sortorders-id' => '/../adminOrdersSorted.php',
          'sortorders-firstname' => '/../adminOrdersSorted.php',
          'sortorders-surname' => '/../adminOrdersSorted.php',
          'sortorders-email' => '/../adminOrdersSorted.php',
          'sortorders-city' => '/../adminOrdersSorted.php',
          'sortorders-sum' => '/../adminOrdersSorted.php',
          'sortorders-date' => '/../adminOrdersSorted.php',
          'sortorders-status' => '/../adminOrdersSorted.php',
          'messages' => '/../adminMessages.php',
          'messages-search' => '/../adminMessagesSearched.php',
          'sort-id' => '/../adminMessagesSorted.php',
          'sort-firstname' => '/../adminMessagesSorted.php',
          'sort-surname' => '/../adminMessagesSorted.php',
          'sort-email' => '/../adminMessagesSorted.php',
          'sort-subject' => '/../adminMessagesSorted.php',
          'sort-content' => '/../adminMessagesSorted.php',
          'sort-date' => '/../adminMessagesSorted.php',
          'sort-status' => '/../adminMessagesSorted.php',
          'shoppingCart' => '/../shoppingCart.php',
          'order' => '/../order.php',
          'orderThanks' => '/../orderThanks.php',

        ];

        if (isset($pages[$page])){
            require __DIR__.$pages[$page];
        }
} else {
        require_once ('templates/mainPage.php');
    }
    require_once('templates/footer.php'); ?>

 </div>
</body>
</html>

<?php echo ob_get_clean(); ?>