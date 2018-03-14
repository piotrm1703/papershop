<div class="editItemForm">
    <label><b>Edytuj produkt:</b></label>
    <br>
    <br>
    <form method="post" >

        <?php foreach ($productArray as $k=>$v) {

        if ($v['id'] === $currentPage) { ?>

        <label for="cat">Kategoria</label>
        <select class="newItemFieldsAdmin" title="cat" name="category" id="category">
            <option selected value="<?php echo htmlEscape($products->category); ?>" style="color: red; font-weight: bold"><?php echo htmlEscape($products->category); ?></option>
            <option disabled="disabled">---------------------------------------------------------------------------------------------------------------------------------------------</option>
            <option value="Papiery-powlekane">Papiery powlekane</option>
            <option value="Kartony-graficzne">Kartony graficzne</option>
            <option value="Kartony-opakowaniowe">Kartony opakowaniowe</option>
            <option value="Papiery-etykietowe">Papiery etykietowe</option>
            <option value="Papiery-samokopiujace">Papiery samokopiujace</option>
            <option value="Papier-offsetowy">Papier offsetowy</option>
        </select>
        <label for="content">Nazwa i opis</label>
        <textarea id="content" class="newItemFieldsAdmin" name="content" style="height: 150px" required><?php echo htmlEscape($v['content']); ?></textarea>

        <label for="price">Cena</label>
        <input class="newItemFieldsAdmin" type="number" id="price" name="price" value="<?php echo htmlEscape($v['price']); ?>" min="0" step="0.01" required>
        <?php }} ?>

        <label for="img"> Wybierz zdjęcie z listy: </label>

        <select name="img" id="img">
            <?php foreach ($data as $img): ?>
                <option value="<?php echo htmlEscape($img['id']); ?>"><?php echo htmlEscape($img["url"]); ?></option>
            <?php endforeach ?>
        </select>
        <input class="universalButton" type="submit" name="edited" value="Zaktualizuj" onClick="return confirm('Czy na pewno chcesz zaktualizować ten produkt?')">
        <input class="deleteItemButton" type="submit" name="delete" value="Usuń produkt" onClick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
    </form>
</div>
