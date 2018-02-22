<style>
    .ul-sidemenu {
        display: none;
    }
</style>

<form action="/?page=orders-search" method="post">
     <input type="text" name="searchboxorders" placeholder="Czego szukasz?..." style="margin-left: 666px; margin-bottom: 5px; margin-top: 5px;"><button type="submit" name="ordersearch">Szukaj</button>
</form>

<div class="admin">
<table style="width:100%">
  <tr>
      <th class="adminTh"></th>
      <th class="adminTh" width="30px"><a href="/?page=sortorders-id">ID</a></th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-name">Imię</th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-surname">Nazwisko</th>
      <th class="adminTh" width="140px"><a href="/?page=sortorders-email">Email</th>
      <th class="adminTh" width="250px"><a href="/?page=sortorders-city">Dane do wysyłki</th>
      <th class="adminTh" width="250x">Produkty</th>
      <th class="adminTh" width="50px"><a href="/?page=sortorders-sum">Suma</th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-date">Data złożenia</th>
      <th class="adminTh" width="50px"><a href="/?page=sortorders-status">Status</th>
  </tr>

<?php
foreach (($stmt->fetchAll()) as $k=>$v){ $un = unserialize($v['products']); ?>

    <tr><td>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="delIcon" type="submit" title="Usuń zamówienie" value="<?php echo $v['id'] ?>" onClick="return confirm('Czy na pewno chcesz usunąć to zamówienie?')"><i class="fa fa-close"></i></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="realized" type="submit" title="Zmień status na zrealizowany" value="<?php echo $v['id'] ?>" ><i class="fa fa-check-square"></i></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="<?php echo $v['id'] ?>"><i class="fa fa-minus-square"></i></button>
            </form>
            </td><td>
            <?php echo $v['id'] ?></td><td>
            <?php echo $v['name'] ?></td><td>
            <?php echo $v['surname'] ?></td><td>
            <?php echo $v['email'] ?></td><td>
            <?php echo $v['city'] ?>,<?php echo $v['zipcode']?>,<?php echo $v['address'] ?></td><td>
            <?php foreach($un as $product) { ?>
                <ul><li>Id produktu:<?php echo $product['id']?>, Ilość:<?php echo $product['quantity'] ?></li></ul>
            <?php } ?>
            </td><td>
            <?php echo $v['sum'] ?> zł</td><td>
            <?php echo $v['date']?></td><td>
            <?php echo $v['status']?></td></tr>
<?php } ?>
</table>
</div>


