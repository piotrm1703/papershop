<div class="newItem">
    <label><b>Dodaj nowy produkt:</b></label>
    <br>
    <br>
    <form action="/?page=newitem" method="post" >

        <label for="cat">Kategoria</label>

        <select class="newItemFieldsAdmin" title="category" name="new-item-category" id="new-item-category" required>
            <option disabled selected value> -- wybierz kategorie -- </option>
            <option value="Papiery-powlekane">Papiery powlekane</option>
            <option value="Kartony-graficzne">Kartony graficzne</option>
            <option value="Kartony-opakowaniowe">Kartony opakowaniowe</option>
            <option value="Papiery-etykietowe">Papiery etykietowe</option>
            <option value="Papiery-samokopiujace">Papiery samokopiujace</option>
            <option value="Papier-offsetowy">Papier offsetowy</option>
        </select>

        <label for="cont">Nazwa i opis</label>
        <textarea class="newItemFieldsAdmin" id="new-item-content" name="new-item-content" placeholder="Wstaw nazwę i opis produktu..." style="height: 150px" required></textarea>

        <label for="price">Cena</label>
        <input class="newItemFieldsAdmin" type="number" id="new-item-price" name="new-item-price" title="price" value="any" min="0" step="0.01" required>

        <label for="img"> Wybierz zdjęcie z listy: </label>
        <select name="new-item-img" id="new-item-img">
            <?php foreach ($data as $img): ?>
                <option value="<?php echo htmlEscape($img["id"]); ?>"><?php echo htmlEscape($img["url"]); ?></option>
            <?php endforeach ?>
        </select>

        <input class="universalButton" type="submit" name="submit" value="Dodaj" onClick="return confirm('Czy napewno chcesz dodać ten produkt?')">

    </form>
</div>
