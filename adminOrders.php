<?php

require (__DIR__.'/userVerification.php');

$ordersStatement = $pdo->query("SELECT * FROM orders");
if ($ordersStatement === false) {
    throw new DatabaseException();
}

$ordersArray = $ordersStatement->fetchAll();

foreach ($ordersArray as $key=>$v)
{
    $ordersArray[$key]['products'] = unserialize($v['products']);
}

require_once(__DIR__.'/templates/adminOrdersForm.php');

require_once (__DIR__.'/adminOrdersButtons.php');

