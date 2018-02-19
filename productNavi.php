<style>
    .price {
        text-align: left;
    }
    .imgView {
        float:left;
        width: 119px;
        height:60px;"
    }
    .productcontainer {
        margin-left: 220px;
        /*margin-top: 50px;*/
        position: relative;
        bottom: 35px;
    }
    .addToCart {
        background-color: darkslategray;
        color: white;
        border-radius: 4px;
        padding: 5px;
        margin: 12px 0;
        border: none;
        cursor: pointer;
        width: 30%;
    }
    .addToCart:hover {
        opacity: 0.8;
        background-color: darkred;
    }
    .deleteItem {
        border-radius: 5px;
        background-color: darkred;
        padding: 20px;
        margin: 8px 8px 8px 210px;
        position: relative;
        right: 60px;

    }

    .numberfield {
        width: 5%;
    }
    .horizontalLine{
        margin-left: 220px;
        position: relative;
        bottom: 10px;
    }
</style>

<?php
require_once('connectDB.php');
//// Query
//$stmt = $pdo->query('SELECT * FROM products');
//$data = $stmt->fetch(PDO::FETCH_OBJ);
//?>
<!---->
<!--<div class="productcontainer">-->
<!--    <form action="/?page=shoppingCart" method="post">-->
<!--        <button class = "addbutton" name="addToCart" type="submit">Dodaj do koszyka</button>-->
<!--        <button class = "deleteItem" name="deleteItem" type="submit" value=" --><?php //echo $row->ID  ?><!--"> Usuń </button>-->
<!--    </form>-->
<!--</div>-->
<!--<hr class="horizontalLine">-->
<!---->
