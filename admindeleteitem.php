<style>
    select {
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
        background-color: red;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        /*float: right;*/
        /*position: relative;*/
        /*bottom: 10px;*/
    }
    input[type=submit]:hover {
        opacity: 0.8;
        background-color:darkred;
    }
    .deleteitem {
        border-radius: 5px;
        background-color: lightcoral;
        padding: 20px;
        margin: 8px 8px 8px 210px;

    }
</style>

<div class="deleteitem">
    <form action="/?page=deleteitem" method="post" >

        <label for="item"><b>Wybierz produkt do usunięcia:</b></label>
            <?php
            try {
                $stmt = $pdo->prepare('SELECT * FROM products');
                $stmt->execute();
                $data = $stmt->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            ?>
            <select name="item" id="item">
                <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['content']?></option>
                <?php endforeach ?>
            </select>
        <input type="submit" name="delete" value="Usuń" ">
    </form>
</div>


<?php

if(isset($_POST['delete'])) {
    try {
        require_once('connectDB.php');
        $sql = "DELETE FROM products WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['item'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=deleteitem');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    $pdo = null;
}


