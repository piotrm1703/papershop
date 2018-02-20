<style>
    .ul-sidemenu {
        display: none;
    }
</style>

<div class="admin">
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

    <?php foreach (($stmt->fetchAll()) as $k=>$v) {?>

        <tr><td>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="delMsg" type="submit" title="Usuń wiadomość" value="<?php $v['ID'] ?>" onClick="return confirm('Na pewno chcesz usunąć wiadomość nr: ' <?php echo $v['ID']; ?> ?')"><i class="fa fa-close"></i></button>
                </form>
                <form action="/?page=adminReply<?php $v['ID'] ?>" method="post" >
                    <button class="fabutton" name="reply" type="submit" title="Odpowiedz na wiadomość" value="<?php $v['ID'] ?>"><i class="fa fa-envelope-open"></i></button>
                </form>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="replied" type="submit" title="Zmień status na odpowiedziano" value="<?php $v['ID'] ?>"><i class="fa fa-check-square"></i></button>
                </form>
                <form action="/?page=messages" method="post" >
                    <button class="fabutton" name="expectant" type="submit" title="Zmień status na oczekujący" value="<?php $v['ID'] ?>"><i class="fa fa-minus-square"></i></button>
                </form>
                </td><td>
                <?php echo $v['ID'] ?> </td><td>
                <?php echo $v['firstname'] ?></td><td>
                <?php echo $v['surname'] ?></td><td>
                <?php echo $v['email'] ?></td><td>
                <?php echo $v['subject'] ?></td><td>
                <?php echo $v['content'] ?></td><td>
                <?php echo $v['date'] ?></td><td>
                <?php echo $v['status'] ?></td></tr>

         <?php } ?>

    </table>
</div>
