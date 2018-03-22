<?php

if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$currentProduct = substr( $_GET['page'], 17);

$productsStatement = $pdo->prepare('
    SELECT products.id, products.content, uploads.url, products.price 
    FROM products 
    INNER JOIN uploads ON products.uploadID = uploads.id 
    WHERE products.id = :id
    ORDER BY products.id
');
$productsStatement->bindParam(':id',$currentProduct);

if ($productsStatement->execute() === false) {
    throw new DatabaseException();
}
$products = $productsStatement->fetch(PDO::FETCH_OBJ);

$commentsStatement = $pdo->prepare('
    SELECT comments.id, comments.content, users.firstname
    FROM comments
    INNER JOIN users ON comments.clientID = users.id
    WHERE comments.productID = :id 
    ORDER BY comments.id 
');

$commentsStatement->bindParam(':id',$currentProduct);

if ($commentsStatement->execute() === false) {
    throw new DatabaseException();
}

$comments = $commentsStatement->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['add_comment']) && !empty($_POST['comment'])){

    $username = $_SESSION['authenticatedUser'];

    $usersStatement = $pdo->prepare('SELECT id FROM users WHERE username = :username');
    $usersStatement->bindParam(':username',$username);

    if($usersStatement->execute() === false){
        throw new DatabaseException();
    }

    $users = $usersStatement->fetch(PDO::FETCH_OBJ);

    $productID = $products->id;
    $userID = $users->id;
    $newComment = $_POST['comment'];

    $commentStatement = $pdo->prepare('INSERT INTO comments VALUES (NULL, :productID, :userID, :comment)');
    $commentStatement->bindParam(':productID', $productID);
    $commentStatement->bindParam(':userID',$userID);
    $commentStatement->bindParam(':comment',$newComment);

    if($commentStatement->execute() === false){
        throw new DatabaseException();
    }

    header('Location: /?page=comments_product-'.$currentProduct);
    die();

}

if(isset($_POST['delete_comment'])){
    $commentStatement = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $id = $_POST['delete_comment'];
    $commentStatement->bindParam(':id', $id);
    if($commentStatement->execute() === false){
        throw new DatabaseException();
    }
    header('Location: /?page=comments_product-'.$currentProduct);
    die();
}

require (__DIR__.'/templates/productCommentsForm.php');