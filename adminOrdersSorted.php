<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$sortType = substr($_GET['page'],11);
$sortTypes = [
    'id',
    'firstname',
    'surname',
    'email',
    'city',
    'sum',
    'date',
    'status',
];

if(!in_array($sortType,$sortTypes)){
    throw new Exception('Nieprawidłowa wartość sortowania');
}

$ordersStatement = $pdo->prepare("SELECT * FROM orders ORDER BY $sortType");
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