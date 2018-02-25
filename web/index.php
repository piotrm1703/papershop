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

require_once (__DIR__.'/../functions.php');
require_once (__DIR__.'/../classes.php');

    siteInterface();
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        require_once(__DIR__ . '/../connectDB.php');
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
        } else {

            $productsStatement = $pdo->query('SELECT * FROM products');
            if ($productsStatement === false) {
                throw new DatabaseException();
            }
            while ($row = $productsStatement->fetch(PDO::FETCH_OBJ)) {
                if ($row->category === $page) {
                    require(__DIR__ . '/templates/productViewForm.php');
                    $dsn = null;
                }
            }

            $messagesStatement = $pdo->prepare('SELECT * FROM messages');
            $messagesStatement->execute();
            if ($messagesStatement === false) {
                throw new DatabaseException();
            }
            while ($row2 = $messagesStatement->fetch(PDO::FETCH_OBJ)) {
                if ($page === 'adminReply' . $row2->id) {
                    require(__DIR__ . '/../adminReply.php');
                }
            }

            $sql2 = 'SELECT * FROM products';
            $productsStatement = $pdo->prepare($sql2);
            $productsStatement->execute();
            if ($productsStatement === false) {
                throw new DatabaseException();
            }
            $arrayQuantity2 = $productsStatement->rowCount();
            while ($row3 = $productsStatement->fetch(PDO::FETCH_OBJ)) {
                if ($page === 'editProduct' . $row3->id) {
                    require(__DIR__ . '/../adminEditProduct.php');
                }
            }
        }
} else {
        require (__DIR__.'/templates/mainPage.php');
    }

    $pageContainer = ob_get_clean();

require (__DIR__.'/templates/layout.php');


