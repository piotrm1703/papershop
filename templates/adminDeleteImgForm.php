<div class="deleteImgForm">
    <form method="post">
        <label><b>Wybierz zdjęcie do usunięcia</b></label>
        <select name="imgToDelete" id="imgToDelete" required>
            <option selected disabled> -- Wybierz zdjęcie do usunięcia -- </option>
            <?php foreach ($imgUrl as $url): ?>
                <option><?php echo htmlEscape($url["url"]); ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" class="deleteItemButton" name="delete" value="Usuń" onClick="return confirm('Wszystkie produkty używające tej grafiki wymagać będą edycji! Czy na pewno chcesz usunąć to zdjęcie? ')">
    </form>
</div>
