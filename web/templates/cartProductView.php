<div class="shoppingCart"><b><?php echo htmlEscape($cartProduct->content) ?></b>
    <img src= "<?php echo htmlEscape($cartProduct->img) ?>" class="imgView">
    <p class="price">Cena: <?php echo $productSum ?> zł</p>
    <form action="/?page=shoppingCart" method="post">
        <button class="deleteFromCart" type="submit" name="deleteFromCart"  value="'.$cartProduct->ID.'">Usuń 1szt.</button>
    </form>
</div>