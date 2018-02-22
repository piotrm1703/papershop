<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
}

require_once ('web/templates/adminAddImgForm.php');

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

            $src = htmlEscape("/images/".$_FILES['imgSelect']['name']);
            $sql = "INSERT INTO images VALUES(NULL,'$src')";
            $stmt = $pdo->query($sql);
            if($stmt === false){
                throw new Exception("Database error");
            }
            header('Location: /?page=file');
        } else {
            echo ($fileName.' nie został dodany!');
        }
    } else {
        echo ('Błąd! Wybrany plik posiada nieprawidłowe rozszerzenie!');
    }

}