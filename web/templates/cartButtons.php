<article class="cart">
    <form action="/?page=order" method="post">
        <button class="summaryButton" type="submit" name="summary" >Podsumowanie</button>
    </form>
    <form action="/?page=shoppingCart" method="post">
        <button class="deleteAll" type="submit" name="deleteAll" onClick="return confirm('Czy na pewno chcesz wyczyścić koszyk?')">Usuń wszystko</button>
    </form>
</article>