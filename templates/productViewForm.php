<article class="content">

    <?php echo htmlEscape($product->content); ?>
    <img src=" <?php echo htmlEscape($product->url); ?>" class="imgView">
    <?php if(isset($_SESSION['authenticatedUser']) && ($_SESSION['authenticatedUser'] === 'admin1' || $_SESSION['authenticatedUser'] === 'admin' )) { ?>
        <div>
            <form action="/?page=editProduct<?php echo htmlEscape($product->id); ?>" method="post">
                <button name="edit" class="editButton" type="submit" title="Edytuj lub usuń produkt" value="<?php echo htmlEscape($product->id); ?>"><span class="fa fa-wrench" style="font-size: 20px"></span></button>
            </form>
        </div>
    <?php } ?>
    <p class="price">Cena: <?php echo htmlEscape(number_format($product->price,2,',','.')); ?> zł</p>

</article>
<br>

<?php if(isset($_SESSION['authenticatedUser'])) { ?>
<div class="productcontainer">
    <form action="/?page=shoppingCart" method="post">
        <button class="addToCart" name="addToCart" type="submit" value="<?php echo htmlEscape($product->id); ?>">Dodaj do koszyka</button>
        <input class="quantityField" type="number" name="quantity" placeholder="Liczba..." required min="0">
    </form>
</div>
<?php } ?>
<hr class="horizontalLine">
