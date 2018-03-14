<?php

require (__DIR__.'/userVerification.php');

if(isset($_POST['ordersearch'])) {

    $ordersStatement = $pdo->prepare("SELECT * FROM orders WHERE id LIKE :id OR clientID LIKE :clientID OR sum LIKE :sum OR products LIKE :products OR status LIKE :status ");
    $search = '%'.sqlLikeEscape($_POST['searchboxorders']).'%';
    $ordersStatement->bindParam(':id',$search);
    $ordersStatement->bindParam(':clientID',$search);
    $ordersStatement->bindParam(':sum',$search);
    $ordersStatement->bindParam(':products',$search);
    $ordersStatement->bindParam(':status',$search);
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