<article class="content">

    <?php echo htmlEscape($product->content); ?>
    <img src=" <?php echo htmlEscape($product->url); ?>" class="imgView">
    <?php if(isAdmin()) { ?>
        <div>
            <form action="/?page=editProduct<?php echo htmlEscape($product->id); ?>" method="post">
                <button name="edit" class="editButton" type="submit" title="Edytuj lub usuń produkt" value="<?php echo htmlEscape($product->id); ?>"><span class="fa fa-wrench" style="font-size: 20px"></span></button>
            </form>
        </div>
    <?php } ?>
    <p class="price">Cena: <?php echo htmlEscape(polish_number_format($product->price)); ?> zł</p>

</article>
<br>

<?php if(isset($_SESSION['authenticatedUser'])) { ?>
<div class="productcontainer">
    <form action="/?page=shoppingCart" method="post">
        <button class="addToCart" name="addToCart" type="submit" value="<?php echo htmlEscape($product->id); ?>">Dodaj do koszyka</button>
        <input class="quantityField" type="number" name="quantity" placeholder="Liczba..." required min="1">
    </form>
    <form action="/?page=comments_product-<?php echo htmlEscape($product->id); ?>" style="margin-bottom: -65px;" method="post">
        <button class="comment_button" name="comment" type="submit" value="<?php echo htmlEscape($product->id); ?>">Komentarze</button>
    </form>
</div>
<?php } ?>
<hr class="horizontalLine">
