<?php
session_start();
function myErrorHandler(){
    ob_get_clean();
    echo "Przepraszamy, wystąpił błąd";
}
if (file_exists("debug.txt")) {

} else {
    set_error_handler("myErrorHandler");
    set_exception_handler("myErrorHandler");
}
ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> System cyfrowej sprzedaży produktów i usług</title>
</head>
<body>
<?php

error_reporting(E_ALL);
require_once ('../functions.php');

?>
<div class="pageContainer">

    <?php
    siteInterface();
    if(isset($_GET['page'])) {
        require_once ('../connectDB.php');
        $page = $_GET['page'];
        $stmt = $pdo->query('SELECT * FROM products');
        if($stmt === false){
            throw new Exception("Database error");
        }
        $arrayQuantity = $stmt->rowCount() - 1;
        for ($x = 0; $x <= $arrayQuantity; $x++) {
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                if ($row->category === $page) {

                    require ('templates/productViewForm.php');

                     $dsn = null;
                }
            }
        }
        $stmt1 = $pdo->prepare('SELECT * FROM messages');
        $stmt1->execute();
        $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt1 === false){
            throw new Exception("Database error");
        }
        $arrayQuantity2 = $stmt1->rowCount() - 1;
        for ($y = 0; $y <= $arrayQuantity2; $y++){
            while ($row2 = $stmt1->fetch(PDO::FETCH_OBJ)){
                if($page === 'adminReply'.$row2->ID){
                    require ('../adminReply.php');
                }
            }
        }
        $stmt2 = $pdo->prepare('SELECT * FROM products');
        $stmt2->execute();
        $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt2 === false){
            throw new Exception("Database error");
        }
        $arrayQuantity3 = $stmt2->rowCount() - 1;
        for ($y = 0; $y <= $arrayQuantity3; $y++){
            while ($row3 = $stmt2->fetch(PDO::FETCH_OBJ)){
                if($page === 'editProduct'.$row3->ID){
                    require ('../adminEditProduct.php');
                }
            }
        }
        if ($page === 'contact'){
            require('../contact.php');
        }
        elseif ($page === 'promotions'){
            require('../promotions.php');
        }
        elseif ($page === 'offer'){
            require('templates/offer.php');
        }
        elseif  ($page === 'newitem'){
            require('../adminNewItem.php');
        }
        elseif ($page === 'file'){
            require('../adminAddImg.php');
        }
        elseif ($page === 'deleteitem'){
            require('../admindeleteitem.php');
        }
        elseif ($page === 'shoppingCart'){
            require ('../shoppingCart.php');
        }
        elseif ($page === 'order'){
            require ('../order.php');
        }
        elseif ($page ==='orderThanks'){
            require('../orderThanks.php');
        }
        elseif ($page === 'testy'){
            require ('../testy.php');
        }
        elseif ($page === 'messages'){
            require('../adminMessages.php');
        }
        elseif ($page === 'messages-search'){
            require ('../adminMessagesSearched.php');
        }
        elseif ($page ==='sort-ID' || $page ==='sort-firstname'
            || $page ==='sort-surname' || $page ==='sort-email'
            || $page ==='sort-subject' || $page ==='sort-content'
            || $page ==='sort-date' || $page ==='sort-status'){
            require('../adminMessagesSorted.php');
        }
        elseif ($page === 'orders'){
            require('../adminOrders.php');
        }
        elseif ($page === 'orders-search'){
            require ('../adminOrdersSearched.php');
        }
        elseif ($page ==='sortorders-id' || $page ==='sortorders-name'
            || $page ==='sortorders-surname' || $page ==='sortorders-email'
            || $page ==='sortorders-city' || $page ==='sortorders-sum'
            || $page ==='sortorders-date' || $page ==='sortorders-status'){
            require('../adminOrdersSorted.php');
        }
} else {
        require_once ('templates/mainPage.php');
    }
    require_once('templates/footer.php'); ?>

 </div>
</body>
</html>

<?php echo ob_get_clean(); ?>