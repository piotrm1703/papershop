<div class="products"><b><?php echo htmlEscape($cartProduct->content) ?></b>
    - Ilość: <?php echo htmlEscape($duplicate[$cartProduct->id]) ?> suma: <?php echo htmlEscape(($duplicate[$cartProduct->id]) * ($cartProduct->price)) ?> zł
</div>