<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$ordersStatement = $pdo->prepare("SELECT * FROM orders");
$ordersStatement->execute();
if($ordersStatement->execute() === false){
    throw new DatabaseException();
}
$ordersArray = $ordersStatement->fetchAll();

foreach ($ordersArray as $key=>$v)
{
    $ordersArray[$key]['products'] = unserialize($v['products']);
}

require_once(__DIR__.'/templates/adminOrdersForm.php');

require_once (__DIR__.'/adminOrdersButtons.php');

