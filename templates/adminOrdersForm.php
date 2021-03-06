<style>
    .ul-sidemenu {
        display: none;
    }
</style>

<form action="/?page=orders-search" method="post">
     <input class="searchbox" name="searchboxorders" placeholder="Czego szukasz?..."><button class="searchButton" type="submit" name="ordersearch">Szukaj</button>
</form>

<div class="admin">
<table>
  <tr>
      <th class="adminTh"></th>
      <th class="adminTh" width="90px"><a href="/?page=sortorders-id">ID zamówienia</a></th>
      <th class="adminTh" width="90px"><a href="/?page=sortorders-clientID">ID klienta</a></th>
      <th class="adminTh" width="300px">Produkty</th>
      <th class="adminTh" width="220px"><a href="/?page=sortorders-sum">Suma</th>
      <th class="adminTh" width="80px"><a href="/?page=sortorders-date">Data złożenia</th>
      <th class="adminTh" width="90px"><a href="/?page=sortorders-status">Status</th>
  </tr>

<?php
foreach ($ordersArray as $order){ ?>
    <tr><td>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="delIcon" type="submit" title="Usuń zamówienie" value="<?php echo htmlEscape($order['id']); ?>" onClick="return confirm('Czy na pewno chcesz usunąć to zamówienie?')"><span class="fa fa-close"></span></button>
            </form>
            <form action="/?page=client_from_order-<?php echo htmlEscape($order['id']); ?>" method="post" >
                <button class="fabutton" name="check-user-data" type="submit" title="Sprawdź dane klienta" value="<?php echo htmlEscape($order['id']); ?>"><span class="fa fa-address-card"></span></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="realized" type="submit" title="Zmień status na zrealizowany i wyślij wiadomość z potwierdzeniem" value="<?php echo htmlEscape($order['id']); ?>" onClick="return confirm('Czy na pewno chcesz zmienić status tego zamówienia na zrealizowany? Spowoduje to wysłanie emaila do klienta z potwierdzeniem!')"><span class="fa fa-check-square"></span></button>
            </form>
            <form action="/?page=orders" method="post" >
                <button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="<?php echo htmlEscape($order['id']); ?>"><span class="fa fa-minus-square"></span></button>
            </form>
            </td><td>
            <?php echo htmlEscape($order['id']); ?></td><td>
            <?php echo htmlEscape($order['clientID']); ?></td><td>
            <?php foreach($order['products'] as $product) { ?>
                <ul><li>Id produktu:<?php echo htmlEscape($product['id']); ?>, Liczba:<?php echo htmlEscape($product['quantity']); ?></li></ul>
            <?php } ?>
            </td><td>
            <?php echo htmlEscape($order['sum']); ?> zł</td><td>
            <?php echo htmlEscape($order['date']); ?></td><td>
            <?php echo htmlEscape($order['status']); ?></td></tr>
<?php } ?>
</table>
</div>
