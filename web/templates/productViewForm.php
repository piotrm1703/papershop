<article class="content">

    <?php echo htmlEscape($row->content) ?>
    <img src=" <?php echo htmlEscape($row->img) ?>" class="imgView">
    <?php if(isset($_SESSION['authenticatedUser'])) { ?>
        <div>
            <form action="/?page=editProduct<?php echo $row->id ?>" method="post">
                <button name="edit" class="editButton" type="submit" value="<?php echo $row->id ?>"><i class="fa fa-wrench" style="font-size: 20px"></i></button>
            </form>
        </div>
    <?php } ?>
    <p class="price">Cena: <?php echo htmlEscape($row->price) ?> zł</p>

</article>
<br>
<div class="productcontainer">
    <form action="/?page=shoppingCart" method="post">
        <button class="addToCart" name="addToCart" type="submit" value="<?php echo $row->id ?>">Dodaj do koszyka</button>
    </form>
</div>
<hr class="horizontalLine">