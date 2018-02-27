<div class="addImgForm ">
    <form action="/?page=file" method="post" enctype="multipart/form-data">
        <label for="imgSelect"><b>Wybierz zdjęcie:</b></label>
        <input type="file" name="imgSelect" id="imgSelect" required>
        <input class="universalButton" type="submit" name="submit" value="Upload" onClick="return confirm('Czy na pewno chcesz dodać to zdjęcie?')">
        <p><strong>Ważne:</strong> Tylko zdjęcia w formatach .jpg, .jpeg, .gif, .png dozwolone.</p>
    </form>
</div>
