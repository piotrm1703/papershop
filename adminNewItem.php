<style>
    .textinput {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=submit] {
        background-color: darkslategray;;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        opacity: 0.8;
        background-color: coral;
    }
    .newitem {
        border-radius: 5px;
        background-color: lightskyblue;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }

</style>

<div class="newitem">
    <label><b>Dodaj nowy produkt:</b></label>
    <br>
    <br>
    <form action="/?page=newitem" method="post" >

        <label for="cat">Kategoria</label>
        <select title="cat" name="category" id="category" required>
            <option disabled selected value> -- wybierz kategorie -- </option>
            <option value="papierypowlekane">Papiery powlekane</option>
            <option value="kartonygraficzne">Kartony graficzne</option>
            <option value="kartonyopakowaniowe">Kartony opakowaniowe</option>
            <option value="papieryetykietowe">Papiery etykietowe</option>
            <option value="papierysamokopiujace">Papiery samokopiujące</option>
            <option value="papieroffsetowy">Papier offsetowy</option>
        </select>
        <label for="cont">Nazwa i opis</label>
        <textarea id="content" name="content" placeholder="Wstaw nazwę i opis produktu..." style="height: 150px" required></textarea>

        <label for="prc">Cena</label>
        <input class="textinput" type="number" id="price" name="price" title="price" value="any" min="0" step="0.01" required>

        <label for="img"> Wybierz zdjęcie z listy: </label>
            <?php
             require_once ('connectDB.php');
            // Query
            $stmt = $pdo->prepare('SELECT DISTINCT url FROM images');
            $stmt->execute();
            $data = $stmt->fetchAll();
            ?>
            <select name="img" id="img">
                <?php foreach ($data as $row): ?>
                <option><?=$row["url"]?></option>
                <?php endforeach ?>
            </select>
        <input type="submit" name="submit" value="Dodaj">
    </form>
</div>

<?php

if(isset($_POST['submit'])){
    $category = htmlEscape($_POST['category']);
    $content = htmlEscape($_POST['content']);
    $price = htmlEscape($_POST['price']);
    $img = htmlEscape($_POST['img']);
    if(isset($category) && isset($content) && isset($price) && isset($img)){
        require_once ('connectDB.php');
        // Query
        $stmt = $pdo->query("INSERT INTO products VALUES(NULL,'$category','$content','$img','$price')");
        echo "<script> alert('Produkt został dodany!')</script>";
    } else {
        echo "Uzupełnij informacje!";
    }
}
