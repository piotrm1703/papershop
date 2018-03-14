<?php

require (__DIR__.'/userVerification.php');

$sortType = substr($_GET['page'],11);
$sortTypes = [
    'id',
    'clientID',
    'sum',
    'date',
    'status',
];

if(!in_array($sortType,$sortTypes)){
    throw new Exception('Nieprawidłowa wartość sortowania');
}

$ordersStatement = $pdo->query("SELECT * FROM orders ORDER BY $sortType");
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