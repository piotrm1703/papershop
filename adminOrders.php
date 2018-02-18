<style>
    .fabutton {
        background: none;
        padding: 0;
        border: none;
        color: firebrick;
    }
    .fabutton:hover {
        background: none;
        opacity: 0.8;
        color: orange;
    }
    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: aliceblue;
        color: black;
        font-size: 16px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        /*font-size: 15px;*/
    }
    table.inside {
        border: 1px solid black;
        border-collapse: collapse;
    }
    tr {
        font-size: 13px;
        text-align: center;
    }
    tr:nth-child(even){background-color: #f2f2f2;}

    tr:hover {background-color: #ddd;}

    .ul-sidemenu {
        display: none;
    }
    th a {
        color: blue;
        text-decoration: none;
    }

</style>

<?php
$stmt = $pdo->prepare('SELECT * FROM orders'); // dodac bindy
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt === false){
    throw new Exception("Database error");
}
?>


<table style="width:100%">
  <tr>
      <th></th>
      <th width="30px"><a href="/?page=sortorders-id">ID</a></th>
      <th width="80px"><a href="/?page=sortorders-name">Imię</th>
      <th width="80px"><a href="/?page=sortorders-surname">Nazwisko</th>
      <th width="140px"><a href="/?page=sortorders-email">Email</th>
      <th width="250px"><a href="/?page=sortorders-city">Dane do wysyłki</th>
      <th width="250x">Produkty</th>
      <th width="50px"><a href="/?page=sortorders-sum">Suma</th>
      <th width="80px"><a href="/?page=sortorders-date">Data złożenia</th>
      <th width="50px"><a href="/?page=sortorders-status">Status</th>
  </tr>

<?php
foreach (($stmt->fetchAll()) as $k=>$v){
    $un = unserialize($v['products']);
    echo '<tr>'.'<td>'.
        '<form action="/?page=orders" method="post" >'.
        '<button class="fabutton" name="delIcon" type="submit" title="Usuń zamówienie" value="'.$v['id'].'" onClick="return confirm(\'Na pewno chcesz usunąć zamówienie nr: '.$v['id'].'?\')">'.'<i class="fa fa-close">'.'</i>'.'</button>'.
        '</form>'.
        '<form action="/?page=orders" method="post" >'.
        '<button class="fabutton" name="realized" type="submit" title="Zmień status na zrealizowany" value="'.$v['id'].'" >'.'<i class="fa fa-check-square">'.'</i>'.'</button>'.
        '</form>'.
        '<form action="/?page=orders" method="post" >'.
        '<button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="'.$v['id'].'">'.'<i class="fa fa-minus-square">'.'</i>'.'</button>'.
        '</form>'.
        '</td>'.'<td>'.
        $v['id'].'</td>'.'<td>'.
        $v['name'].'</td>'.'<td>'.
        $v['surname'].'</td>'.'<td>'.
        $v['email'].'</td>'.'<td>'.
        $v['city'].','.$v['zipcode'].', '.$v['address'].'</td>'.'<td>';
        foreach($un as $product) {
            echo '<ul>'.'<li>'.'Id produktu:'.$product['id'].' '.'Ilość:'.$product['quantity'].'</li>'.'</ul>';
        }
            echo '</td>'.'<td>'.
        $v['sum'].' '.'zł'.'</td>'.'<td>'.
        $v['date'].'</td>'.'<td>'.
        $v['status'].'</td>'.'</tr>';
}
$dsn = null;
?>
</table>

<?php
if(isset($_POST['delIcon'])) {
    try {
        $sql = "DELETE FROM orders WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['delIcon'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['realized'])) {
    try {
        $sql = "UPDATE orders SET status='zrealizowano' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['realized'];
        $statement->bindValue(':id', $selectedItem);
        $realized = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE orders SET status='oczekujący' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $expectant = $statement->execute();
        header('Location: /?page=orders');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}