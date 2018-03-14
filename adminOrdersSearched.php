<?php

require (__DIR__.'/userVerification.php');

if(isset($_POST['ordersearch'])) {

    $ordersStatement = $pdo->prepare("SELECT * FROM orders WHERE id LIKE ? OR clientID LIKE ? OR sum LIKE ? OR products LIKE ? OR status LIKE ? ");
    $search = '%'.sqlLikeEscape($_POST['searchboxorders']).'%';
    $ordersStatement->bindParam(1,$search);
    $ordersStatement->bindParam(2,$search);
    $ordersStatement->bindParam(3,$search);
    $ordersStatement->bindParam(4,$search);
    $ordersStatement->bindParam(5,$search);
    if($ordersStatement->execute() === false){
        throw new DatabaseException();
    }
    $ordersArray = $ordersStatement->fetchAll();
}

foreach ($ordersArray as $key=>$v)
{
    $ordersArray[$key]['products'] = unserialize($v['products']);
}

require_once(__DIR__.'/templates/adminOrdersForm.php');

require_once (__DIR__.'/adminOrdersButtons.php');