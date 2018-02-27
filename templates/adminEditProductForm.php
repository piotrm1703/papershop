<div class="editItemForm">
    <label><b>Edytuj produkt:</b></label>
    <br>
    <br>
    <form method="post" >

        <?php foreach ($productArray as $k=>$v) {

        if ($v['id'] === $currentPage) { ?>

        <label for="cat">Kategoria</label>
        <select class="newItemFieldsAdmin" style="color: red" title="cat" name="category" id="category" required >
            <option disabled selected value > -- Do usunięcia lub edycji wybierz kategorię produktu z listy -- </option>
            <option  value="papierypowlekane">Papiery powlekane</option>
            <option value="kartonygraficzne">Kartony graficzne</option>
            <option value="kartonyopakowaniowe">Kartony opakowaniowe</option>
            <option value="papieryetykietowe">Papiery etykietowe</option>
            <option value="papierysamokopiujace">Papiery samokopiujące</option>
            <option value="papieroffsetowy">Papier offsetowy</option>
        </select>
        <label for="content">Nazwa i opis</label>
        <textarea id="content" class="newItemFieldsAdmin" name="content" style="height: 150px" required><?php echo htmlEscape($v['content']); ?></textarea>

        <label for="price">Cena</label>
        <input class="newItemFieldsAdmin" type="number" id="price" name="price" value="<?php echo htmlEscape($v['price']); ?>" min="0" step="0.01" required>
        <?php }} ?>

        <label for="img"> Wybierz zdjęcie z listy: </label>

        <select name="img" id="img">
            <?php foreach ($data as $row): ?>
                <option><?php echo htmlEscape($row["url"])?></option>
            <?php endforeach ?>
        </select>
        <input class="universalButton" type="submit" name="edited" value="Zaktualizuj" onClick="return confirm('Czy na pewno chcesz zaktualizować ten produkt?')">
        <input class="deleteItemButton" type="submit" name="delete" value="Usuń produkt" onClick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
    </form>
</div>
