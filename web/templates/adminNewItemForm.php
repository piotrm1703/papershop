<div class="newItem">
    <label><b>Dodaj nowy produkt:</b></label>
    <br>
    <br>
    <form action="/?page=newitem" method="post" >

        <label for="cat">Kategoria</label>
        <select class="newItemFieldsAdmin" title="cat" name="category" id="category" required>
            <option disabled selected value> -- wybierz kategorie -- </option>
            <option value="papierypowlekane">Papiery powlekane</option>
            <option value="kartonygraficzne">Kartony graficzne</option>
            <option value="kartonyopakowaniowe">Kartony opakowaniowe</option>
            <option value="papieryetykietowe">Papiery etykietowe</option>
            <option value="papierysamokopiujace">Papiery samokopiujące</option>
            <option value="papieroffsetowy">Papier offsetowy</option>
        </select>
        <label for="cont">Nazwa i opis</label>
        <textarea class="newItemFieldsAdmin" id="content" name="content" placeholder="Wstaw nazwę i opis produktu..." style="height: 150px" required></textarea>

        <label for="price">Cena</label>
        <input class="newItemFieldsAdmin" type="number" id="price" name="price" title="price" value="any" min="0" step="0.01" required>

        <label for="img"> Wybierz zdjęcie z listy: </label>

        <select name="img" id="img">
            <?php foreach ($data as $row): ?>
                <option><?=$row["url"]?></option>
            <?php endforeach ?>
        </select>
        <input class="universalButton" type="submit" name="submit" value="Dodaj">
    </form>
</div>
