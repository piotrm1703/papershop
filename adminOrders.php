<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$ordersStatement = $pdo->prepare("SELECT * FROM orders");
$ordersStatement->execute();
$ordersArray = $ordersStatement->fetchAll();
if($ordersStatement === false){
    throw new DatabaseException();
}

foreach ($ordersArray as $key=>$v)
{
    $ordersArray[$key]['products'] = unserialize($v['products']);
}

require_once(__DIR__.'/templates/adminOrdersForm.php');

require_once (__DIR__.'/adminOrdersButtons.php');

