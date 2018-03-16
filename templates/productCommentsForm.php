<article class="content">
    <div>
        <?php echo htmlEscape($products->content); ?>
        <img src=" <?php echo htmlEscape($products->url); ?>" class="imgView">
        <p class="price">Cena: <?php echo htmlEscape(polish_number_format($products->price)); ?> zł</p>
    </div>
</article>

<hr class="horizontalLine">

<article>
    <form action="" method="post">
        <label>Wiadomość:</label>
        <textarea class="contact_form_field" id="comment" name="comment" placeholder="Co chciałbyś powiedzieć o tym produkcie?" style="height: 75px;" required></textarea>
        <input class="add_comment_button" type="submit" name="add_comment" id="add_comment" value="Dodaj komentarz" onclick="return confirm('Czy na pewno chcesz dodać ten komentarz?')">
    </form>
</article>

<?php
foreach($comments as $comment){
?>
    <article class="content">

        <div class="comment_name_div">
            <b><?php echo $comment->firstname; ?></b> napisał/a:
        </div>

    <?php if(isset($_SESSION['authenticatedUser']) && ($_SESSION['authenticatedUser'] === 'administracja' || $_SESSION['authenticatedUser'] === 'admin' )) { ?>
        <form class="comment_button_div" action="" method="post">
            <button class="delete_comment_button" type="submit" name="delete_comment" id="delete_comment" value="<?php echo $comment->id ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten komentarz?')"><span class="fa fa-close"></span></button>
        </form>
    <?php } ?>

        <div class="comment_content_div">
            <?php echo $comment->content; ?>
        </div>
    </article>
<?php } ?>