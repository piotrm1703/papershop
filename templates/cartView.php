<div class="shoppingCart">
    <b>&nbsp;&nbsp;<?php echo htmlEscape($cartProduct->content); ?></b>
    <img src= "<?php echo htmlEscape($cartProduct->url); ?>" class="imgView"><br><br>
    &nbsp;&nbsp;<p class="price"><b>Suma: </b><?php echo htmlEscape(number_format($productSum,2,',','.')); ?>zł  &nbsp;&nbsp;<b>Ilość:</b><?php echo htmlEscape($productQuantity); ?></p>
    <form action="/?page=shoppingCart" method="post" style="margin-bottom: -30px;">
        <button class="deleteFromCart" type="submit" name="deleteFromCart" value="<?php echo htmlEscape($cartProduct->id); ?>" onClick="return confirm('Usunąć ten produkt z koszyka?')"><span class="fa fa-close"></span></button>
        <button class="addOne" type="submit" title="Dodaj 1 szt." name="addOne" value="<?php echo htmlEscape($cartProduct->id); ?>"><span class="fa fa-plus"></span></button>
        <button class="minusOne" type="submit" title="Usuń 1 szt." name="minusOne" value="<?php echo htmlEscape($cartProduct->id); ?>"><span class="fa fa-minus"></span></button>
    </form>

</div>