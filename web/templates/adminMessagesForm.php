<style>
    .ul-sidemenu {
        display: none;
    }
</style>

<form action="/?page=messages-search" method="post">
    <input class="searchbox" type="text" name="searchbox" placeholder="Czego szukasz?..."><button class="searchButton" type="submit" name="searchmessages">Szukaj</button>
</form>

<div class="admin">
    <table>
        <tr>
            <th></th>
            <th><a href="/?page=sort-id">ID</a></th>
            <th width="80px"><a href="/?page=sort-firstname" >Imię</a></th>
            <th width="80px"><a href="/?page=sort-surname">Nazwisko</a></th>
            <th width="140px"><a href="/?page=sort-email">Email</a></th>
            <th width="100px"><a href="/?page=sort-subject">Kategoria</a></th>
            <th width="600px"><a href="/?page=sort-content">Treść</a></th>
            <th><a href="/?page=sort-date">Data otrzymania</a></th>
            <th><a href="/?page=sort-status">Status</a></th>
        </tr>

    <?php foreach ($messagesArray as $k=>$v) { ;?>

        <tr><td>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="delMsg" type="submit" title="Usuń wiadomość" value="<?php echo htmlEscape($v['id']) ?>" onClick="return confirm('Czy na pewno chcesz usunąć tę wiadomość?')"><span class="fa fa-close"></span></button>
                </form>
                <form action="/?page=adminReply<?php echo htmlEscape($v['id']) ?>" method="post" >
                    <button class="fabutton" name="reply" type="submit" title="Odpowiedz na wiadomość" value="<?php echo htmlEscape($v['id']) ?>"><span class="fa fa-envelope-open"></span></button>
                </form>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="replied" type="submit" title="Zmień status na odpowiedziano" value="<?php echo htmlEscape($v['id']) ?>"><span class="fa fa-check-square"></span></button>
                </form>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="<?php echo htmlEscape($v['id']) ?>"><span class="fa fa-minus-square"></span></button>
                </form>
                </td><td>
                <?php echo htmlEscape($v['id']) ?> </td><td>
                <?php echo htmlEscape($v['firstname']) ?></td><td>
                <?php echo htmlEscape($v['surname']) ?></td><td>
                <?php echo htmlEscape($v['email']) ?></td><td>
                <?php echo htmlEscape($v['subject']) ?></td><td>
                <?php echo htmlEscape($v['content']) ?></td><td>
                <?php echo htmlEscape($v['date']) ?></td><td>
                <?php echo htmlEscape($v['status']) ?></td></tr>
         <?php } ?>
    </table>
</div>
