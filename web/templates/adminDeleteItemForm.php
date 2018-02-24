<div class="adminDeleteItemForm">
    <form action="/?page=deleteitem" method="post" >
        <label for="item"><b>Wybierz produkt do usunięcia:</b></label>
        <select class="selectDelete" name="item" id="delete">
            <option disabled selected >-- wybierz produkt do usunięcia --</option>
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['content']?></option>
            <?php endforeach ?>
        </select>
        <input class="buttonAdminDelete" type="submit" name="delete" value="Usuń" onClick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
    </form>
</div>
