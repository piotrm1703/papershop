<style>
    .ul-sidemenu {
        display: none;
    }
</style>

<form action="/?page=orders-search" method="post">
     <input class="searchbox" type="text" name="searchboxorders" placeholder="Czego szukasz?..."><button class="searchButton" type="submit" name="ordersearch">Szukaj</button>
</form>

<div class="admin">
<table>
  <tr>
      <th class="adminTh"></th>
      <th class="adminTh" width="30px"><a href="/?page=sortorders-id">ID</a></th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-firstname">Imię</th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-surname">Nazwisko</th>
      <th class="adminTh" width="140px"><a href="/?page=sortorders-email">Email</th>
      <th class="adminTh" width="250px"><a href="/?page=sortorders-city">Dane do wysyłki</th>
      <th class="adminTh" width="250x">Produkty</th>
      <th class="adminTh" width="50px"><a href="/?page=sortorders-sum">Suma</th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-date">Data złożenia</th>
      <th class="adminTh" width="50px"><a href="/?page=sortorders-status">Status</th>
  </tr>

<?php
foreach ($ordersArray as $v){ ?>
    <tr><td>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="delIcon" type="submit" title="Usuń zamówienie" value="<?php echo htmlEscape($v['id']) ?>" onClick="return confirm('Czy na pewno chcesz usunąć to zamówienie?')"><span class="fa fa-close"></span></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="realized" type="submit" title="Zmień status na zrealizowany" value="<?php echo htmlEscape($v['id']) ?>" ><span class="fa fa-check-square"></span></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="<?php echo htmlEscape($v['id']) ?>"><span class="fa fa-minus-square"></span></button>
            </form>
            </td><td>
            <?php echo htmlEscape($v['id']) ?></td><td>
            <?php echo htmlEscape($v['firstname']) ?></td><td>
            <?php echo htmlEscape($v['surname']) ?></td><td>
            <?php echo htmlEscape($v['email']) ?></td><td>
            <?php echo htmlEscape($v['city']) ?>,<?php echo htmlEscape($v['zipcode']) ?>,<?php echo htmlEscape($v['address']) ?></td><td>
            <?php foreach($v['products'] as $product) { ?>
                <ul><li>Id produktu:<?php echo htmlEscape($product['id']) ?>, Ilość:<?php echo htmlEscape($product['quantity']) ?></li></ul>
            <?php } ?>
            </td><td>
            <?php echo htmlEscape($v['sum']) ?> zł</td><td>
            <?php echo htmlEscape($v['date']) ?></td><td>
            <?php echo htmlEscape($v['status']) ?></td></tr>
<?php } ?>
</table>
</div>