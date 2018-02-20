<?php
session_start();
function myErrorHandler(){
    ob_get_clean();
    echo "Przepraszamy, wystąpił błąd";
}
if (file_exists("debug.txt")) {

} else {
    set_error_handler("myErrorHandler");
    set_exception_handler("myErrorHandler");
}
ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> System cyfrowej sprzedaży produktów i usług</title>
</head>
<body>
<?php

error_reporting(E_ALL);
require_once ('../functions.php');

?>
<div class="pageContainer">

    <?php siteInterface()  /* implementacja interfejsu */?>
    <?php  if(isset($_GET['page'])) { ?>
    <?php require_once ('../connectDB.php');
        $page = $_GET['page'];
        $stmt = $pdo->query('SELECT * FROM products');
        if($stmt === false){
            throw new Exception("Database error");
        }

        $arrayQuantity = $stmt->rowCount() - 1;
        for ($x = 0; $x <= $arrayQuantity; $x++) {
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                if ($row->category === $page) {
                    echo '<article class="content">'.htmlEscape($row->content).' '.
                        '<img src='.htmlEscape($row->img).' class="imgView">'.
                        '<p class="price">'.' '.'Cena'.' '.htmlEscape($row->price).' '.'zł'.'</p>'.'</article><br>';

                    echo '<div class="productcontainer">'.
                        '<form action="/?page=shoppingCart" method="post">'.
                        '<button class="addToCart" name="addToCart" type="submit" value="'.$row->ID.'" >'.'Dodaj do koszyka'.'</button>'.
                        '</form>'.
                        '</div>'.
                        '<hr class="horizontalLine">';
                    $dsn = null;
                }
            }
        }
        $stmt1 = $pdo->prepare('SELECT * FROM messages');
        $stmt1->execute();
        $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt1 === false){
            throw new Exception("Database error");
        }
        $arrayQuantity2 = $stmt1->rowCount() - 1;
        for ($y = 0; $y <= $arrayQuantity2; $y++){
            while ($row2 = $stmt1->fetch(PDO::FETCH_OBJ)){
                if($page === 'adminReply'.$row2->ID){
                    require ('../adminReply.php');
                }
            }
        }
        if ($page === 'contact'){
            require('../contact.php');
        }
        elseif ($page === 'promotions'){
            require('../promotions.php');
        }
        elseif ($page === 'offer'){
            require('../offer.php');
        }
        elseif  ($page === 'newitem'){
            require('../adminNewItem.php');
        }
        elseif ($page === 'file'){
            require('../adminAddImg.php');
        }
        elseif ($page === 'messages'){
            require('../adminMessages.php');
        }
        elseif ($page === 'deleteitem'){
            require('../admindeleteitem.php');
        }
        elseif ($page === 'shoppingCart'){
            require ('../shoppingCart.php');
        }
        elseif ($page === 'order'){
            require ('../order.php');
        }
        elseif ($page ==='orderThanks'){
            require ('../orderThanks.php');
        }
        elseif ($page === 'testy'){
            require ('../testy.php');
        }
        elseif ($page === 'testy2'){
            require ('../testy2.php');
        }
        elseif ($page === 'orders'){
            require ('../adminOrders.php');
        }
        elseif ($page ==='sort-ID' || $page ==='sort-firstname'
            || $page ==='sort-surname' || $page ==='sort-email'
            || $page ==='sort-subject' || $page ==='sort-content'
            || $page ==='sort-date' || $page ==='sort-status'){
            require_once('../sortmsg.php');
        }
        elseif ($page ==='sortorders-id' || $page ==='sortorders-name'
            || $page ==='sortorders-surname' || $page ==='sortorders-email'
            || $page ==='sortorders-city' || $page ==='sortorders-sum'
            || $page ==='sortorders-date' || $page ==='sortorders-status'){
            require_once ('../sortorder.php');
        }
        ?>

    <?php } else{ ?>
        <article >
            <h3 style="color:darkslategray">Witam na stronie głównej Przedsiębiorstwa Poligraficznego!</h3>
            <p>Przedsiębiorstwo  działa na rynku papierniczym od niemalże 30 lat.<br>Główna siedziba firmy mieści się w województwie mazowieckim, ale posiadamy biura handlowe w różnych częściach kraju.<br>
                Nasze magazyny mieszczą się w województwie mazowieckim oraz na pomorzu.<br>
                Jesteśmy firmą rodzinną, stawiamy na budowanie oraz rozwój pozytywnych relacji z naszymi klientami opartych na doświadczeniu, zaufaniu i przyjaźni.<br>
                Młody, profesjonalny zespół, bogata oferta handlowa, niewielkie marże oraz szybka realizacja zleceń to mocne strony przedsiębiorstwa.<br>
                Wykorzystując szerokie możliwości bezpośredniego importu oraz własne możliwości przerobowe papieru, oferujemy produkty wysokiej jakości w konkurencyjnych cenach.<br>
                Nasza oferta handlowa znana jest również za granicą. <br>
            <p>Dzięki długoletniej, bezpośredniej współpracy z wieloma producentami papieru, mamy duże możliwości dostosowania oferty handlowej do indywidualnych potrzeb naszych klientów, zarówno w zakresie cen jak i jakości produktów.</p>
            <p>Zapraszamy do korzystania z naszych usług.</p>
            <p>Zespół Przedsiębiorstwa Poligraficznego</p>

        </article>

    <?php } ?>

    <?php require_once('../footer.php'); ?>
</div>

</body>
</html>

<?php echo ob_get_clean(); ?>
