<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt1 = $pdo->prepare('SELECT DISTINCT url FROM images');
$stmt1->execute();
$data = $stmt1->fetchAll();

require_once ('web/templates/adminEditProductForm.php');

if(isset($_POST['edited'])) {
    try {
        $category = htmlEscape($_POST['category']);
        $content = htmlEscape($_POST['content']);
        $price = htmlEscape($_POST['price']);
        $img = htmlEscape($_POST['img']);
        $id = substr($_GET['page'], 11);
        $sql = "UPDATE products SET category = ? , content = ?, img = ? , price = ? WHERE ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $category);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $img);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $id);
        $stmt->execute();

        header('Location: /?page='.$category.'');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

