<?php
error_reporting(E_ALL);


function handleError($exception, $message = null, $file = null, $line = null)
{
    function maybeSendErrorHeader()
    {
        if (!headers_sent()) {
            // Send the headers if they have not already been sent:
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
    try {
        $isPhpError = 5 === func_num_args();
        // Test to see if errors should be displayed
        if ($isPhpError && 0 === (error_reporting() & $exception)) {
            return;
        }
        if ($isPhpError) {
            $type = 'PHP Error';
        } else {
            $type = get_class($exception);
            $message = $exception->getMessage();
            $file = $exception->getFile();
            $line = $exception->getLine();
        }
        error_log(sprintf(
            '%s: %s, Message: %s, FILE: %s, LINE: %s',
            $type,
            $exception,
            $message,
            $file,
            $line
        ));
        // czyścimy wszystkie bufory,
        // żeby na ekranie był tylko nasz komunikat błędu
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        maybeSendErrorHeader();
        echo 'Przepraszamy! Wystąpił błąd :(';
        // Turn off error reporting
        error_reporting(0);
        die();
    } catch (\Exception $e) {
        maybeSendErrorHeader();
        die('Fatal Error');
    }
}
if (!file_exists("debug.txt")) {
    set_error_handler("handleError");
    set_exception_handler("handleError");
}
ob_start();
session_start();

require_once (__DIR__.'/../functions.php');
require_once (__DIR__.'/../classes.php');
require(__DIR__ . '/../connectDB.php');
    siteInterface();

if(isset($_GET['page'])) {
    $pages = [
        'offer' => '/../templates/offer.php',
        'promotions' => '/../promotions.php',
        'contact' => '/../contact.php',
        'file' => '/../adminAddDeleteImg.php',
        'newitem' => '/../adminNewItem.php',
        'orders' => '/../adminOrders.php',
        'orders-search' => '/../adminOrdersSearched.php',
        'sortorders-id' => '/../adminOrdersSorted.php',
        'sortorders-clientID' => '/../adminOrdersSorted.php',
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
        'registerThanks' => '/../registerThanks.php',
        'registerVerifyThanks' => '/../registerVerifyThanks.php',
        'register' => '/../register.php',
    ];

    if (isset($pages[$_GET['page']])) {
        require __DIR__.$pages[$_GET['page']];
    } else {
        $isProductCategoryPage = false;
        $productsStatement = $pdo->query('SELECT products.id, products.category, products.content, uploads.url , products.price FROM products INNER JOIN uploads ON products.uploadID = uploads.id ORDER BY products.id');

        if ($productsStatement === false) {
            throw new DatabaseException();
        }

        while ($products = $productsStatement->fetch(PDO::FETCH_OBJ)) {
            if ($products->category === $_GET['page']) {
                require(__DIR__ . '/../templates/productViewForm.php');
                $isProductCategoryPage = true;
            }
        }

        if (!$isProductCategoryPage) {
            $isProductMessagesPage = false;
            $messagesStatement = $pdo->query('SELECT * FROM messages');

            if ($messagesStatement === false) {
                throw new DatabaseException();
            }

            while ($messages = $messagesStatement->fetch(PDO::FETCH_OBJ)) {
                if ($_GET['page'] === 'adminReply' . $messages->id) {
                    require(__DIR__ . '/../adminReply.php');
                    $isProductMessagesPage = true;
                    break;
                }
            }
            if (!$isProductMessagesPage) {
                $isEditPage = false;
                $productsStatement = $pdo->query('SELECT * FROM products');

                if ($productsStatement === false) {
                    throw new DatabaseException();
                }

                while ($products = $productsStatement->fetch(PDO::FETCH_OBJ)) {
                    if ($_GET['page'] === 'editProduct' . $products->id) {
                        require(__DIR__ . '/../adminEditProduct.php');
                        $isEditPage = true;
                        break;
                    }
                }
                if (!$isEditPage) {
                    echo "Nieprawidłowy adres strony!";
                }
            }
        }
    }
} else {
    require (__DIR__.'/../templates/mainPage.php');
}

$verifyUserStatement = $pdo->query('SELECT verifyKey FROM users');
while ($verifyKeys = $verifyUserStatement->fetch(PDO::FETCH_OBJ)) {
    if (isset($_GET['verify_email']) && $_GET['verify_email'] === $verifyKeys->verifyKey) {

        $deleteVerifyKeyStatement = $pdo->prepare('UPDATE users SET verifyKey = ?  WHERE verifyKey = ?');
        $key = $verifyKeys->verifyKey;
        $newKey = '';

        $deleteVerifyKeyStatement->bindParam(1,$newKey);
        $deleteVerifyKeyStatement->bindParam(2,$key);
        if($deleteVerifyKeyStatement->execute() === false){
            throw new DatabaseException();
        }
        header('Location: /?page=registerVerifyThanks');
        $isVerifyPage = true;
        break;
    }
}

$pageContainer = ob_get_clean();

require (__DIR__.'/../templates/layout.php');