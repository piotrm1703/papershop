<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}
?>

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
        color: darkslategray;
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

<table style="width:100%">

    <tr>
        <th></th>
        <th><a href="/?page=sort-ID">ID</a></th>
        <th width="80px"><a href="/?page=sort-firstname" >Imię</a></th>
        <th width="80px"><a href="/?page=sort-surname">Nazwisko</a></th>
        <th width="140px"><a href="/?page=sort-email">Email</a></th>
        <th width="100px"><a href="/?page=sort-subject">Kategoria</a></th>
        <th width="600px"><a href="/?page=sort-content">Treść</a></th>
        <th><a href="/?page=sort-date">Data otrzymania</a></th>
        <th><a href="/?page=sort-status">Status</a></th>
    </tr>

<?php
$stmt = $pdo->prepare('SELECT * FROM messages');
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt === false){
    throw new Exception("Database error");
}
foreach (($stmt->fetchAll()) as $k=>$v)

    echo '<tr>'.'<td>'.
        '<form action="/?page=messages" method="post" >'.
        '<button class="fabutton" name="delMsg" type="submit" title="Usuń wiadomość" value="'.$v['ID'].'" onClick="return confirm(\'Na pewno chcesz usunąć wiadomość nr: '.$v['ID'].'?\')">'.'<i class="fa fa-close">'.'</i>'.'</button>'.
        '</form>'.
        '<form action="/?page=adminReply'.$v['ID'].'" method="post" >'.
        '<button class="fabutton" name="reply" type="submit" title="Odpowiedz na wiadomość" value="'.$v['ID'].'">'.'<i class="fa fa-envelope-open">'.'</i>'.'</button>'.
        '</form>'.
        '<form action="/?page=messages" method="post" >'.
        '<button class="fabutton" name="replied" type="submit" title="Zmień status na odpowiedziano" value="'.$v['ID'].'">'.'<i class="fa fa-check-square">'.'</i>'.'</button>'.
        '</form>'.
        '<form action="/?page=messages" method="post" >'.
        '<button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="'.$v['ID'].'">'.'<i class="fa fa-minus-square">'.'</i>'.'</button>'.
        '</form>'.
        '</td>'.'<td>'.
        $v['ID'].'</td>'.'<td>'.
        $v['firstname'].'</td>'.'<td>'.
        $v['surname'].'</td>'.'<td>'.
        $v['email'].'</td>'.'<td>'.
        $v['subject'].'</td>'.'<td>'.
        $v['content'].'</td>'.'<td>'.
        $v['date'].'</td>'.'<td>'.
        $v['status'].'</td>'.'</tr>'
    ;

$dsn = null;
echo "</table>";

if(isset($_POST['delMsg'])) {
    try {
        $sql = "DELETE FROM messages WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['delMsg'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['replied'])) {
    try {
        $sql = "UPDATE messages SET status='odpowiedziano' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['replied'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['expectant'])) {
    try {
        $sql = "UPDATE messages SET status='oczekujący' WHERE ID = :id";
        $statement = $pdo->prepare($sql);
        $selectedItem = $_POST['expectant'];
        $statement->bindValue(':id', $selectedItem);
        $delete = $statement->execute();
        header('Location: /?page=messages');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}