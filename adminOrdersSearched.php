<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

if(isset($_POST['ordersearch'])) {

    $ordersStatement = $pdo->prepare("SELECT * FROM orders WHERE id LIKE ? OR firstname LIKE ? OR surname LIKE ? OR email LIKE ? OR city LIKE ? OR zipcode LIKE ? OR address LIKE ? OR sum LIKE ? OR products LIKE ? OR status LIKE ? ");
    $search = '%'.sqlLikeEscape($_POST['searchboxorders']).'%';
    $ordersStatement->bindParam(1,$search);
    $ordersStatement->bindParam(2,$search);
    $ordersStatement->bindParam(3,$search);
    $ordersStatement->bindParam(4,$search);
    $ordersStatement->bindParam(5,$search);
    $ordersStatement->bindParam(6,$search);
    $ordersStatement->bindParam(7,$search);
    $ordersStatement->bindParam(8,$search);
    $ordersStatement->bindParam(9,$search);
    $ordersStatement->bindParam(10,$search);
    $ordersStatement->execute();
    $ordersArray = $ordersStatement->fetchAll();

}

foreach ($ordersArray as $key=>$v)
{
    $ordersArray[$key]['products'] = unserialize($v['products']);
}

require_once(__DIR__.'/templates/adminOrdersForm.php');

require_once (__DIR__.'/adminOrdersButtons.php');