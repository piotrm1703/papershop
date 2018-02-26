<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

require_once (__DIR__.'/templates/adminAddImgForm.php');

if(isset($_POST['submit'])){
    $imagesDir = __DIR__.'/web/images/';
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if (!$finfo) {
        die('Wystąpił błąd(finfo)!');
    }
    $mimeType = finfo_file($finfo,$_FILES['imgSelect']['tmp_name']);
    if (!$mimeType) {
        die('Wystąpił błąd(rozszerzenie)!');
    }
    if ($mimeType === 'image/jpeg' || $mimeType === 'image/gif' || $mimeType === 'image/png'){
        $fileName = $_FILES['imgSelect']['name'];
        if (is_file($imagesDir.$fileName)){
            echo ($fileName.' wybrana nazwa już istnieje!');
        }
        elseif (move_uploaded_file($_FILES['imgSelect']['tmp_name'],$imagesDir.$fileName)){
            echo ($fileName.' zdjęcie dodane!');

            $imagesStatement = $pdo->prepare("INSERT INTO images VALUES(NULL, ?)");
            $src = ("/images/".$_FILES['imgSelect']['name']);
            $imagesStatement->bindParam(1,$src);
            $imagesStatement->execute();
            if($imagesStatement->execute() === false){
                throw new DatabaseException();
            }
            header('Location: /?page=file');
            die();
        } else {
            echo ($fileName.' nie został dodany!');
        }
    } else {
        echo ('Błąd! Wybrany plik posiada nieprawidłowe rozszerzenie!');
    }
}