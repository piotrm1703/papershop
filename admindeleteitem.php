<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}
?>

<div class="adminDeleteItemForm">
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
            <select class="selectDelete" name="item" id="item">
                <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['content']?></option>
                <?php endforeach ?>
            </select>
        <input class="buttonAdminDelete" type="submit" name="delete" value="Usuń" ">
    </form>
</div>

<?php if(isset($_POST['delete'])) {
    try {
        require_once('connectDB.php');
        $sql = "DELETE FROM products WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $selectedItem = $_POST['item'];
        $stmt->bindValue(':id', $selectedItem);
        $delete = $stmt->execute();
        if($stmt === false){
            throw new Exception("Database error");
        }
        header('Location: /?page=deleteitem');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    $pdo = null;
}


