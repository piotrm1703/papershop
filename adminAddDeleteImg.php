<?php

require (__DIR__.'/userVerification.php');

$imagesStatement = $pdo->query('SELECT DISTINCT url FROM uploads');
if ($imagesStatement === false) {
    throw new DatabaseException();
}

$data = $imagesStatement->fetchAll();
require_once (__DIR__.'/templates/adminAddImgForm.php');
require_once (__DIR__.'/templates/adminDeleteImgForm.php');

if(isset($_POST['submit'])){
    $imagesDir = __DIR__.'/web/uploads/';
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

        try {
            $imagine = new \Imagine\Imagick\Imagine();
            $imagine->open($_FILES['imgSelect']['tmp_name'])
                ->save($_FILES['imgSelect']['tmp_name']);
        } catch (Exception $exception) {
            die('Wystąpił problem z obsługą obrazka!');
        }


        if (is_file($imagesDir.$fileName)){
            echo ($fileName.' wybrana nazwa już istnieje!');
        } elseif (move_uploaded_file($_FILES['imgSelect']['tmp_name'],$imagesDir.$fileName)){
            echo ($fileName.' zdjęcie dodane!');

            $imagesStatement = $pdo->prepare("INSERT INTO uploads VALUES(NULL, ?)");
            $src = ("/uploads/".$_FILES['imgSelect']['name']);
            $imagesStatement->bindParam(1,$src);
            header('Location: /?page=file');
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

if(isset($_POST['delete'])){

    $url = $_POST['imgToDelete'];
    $unlink = unlink(__DIR__.'/web/'.$url);
    if($unlink){
        $imageStatement = $pdo->prepare("DELETE FROM uploads WHERE url = ?");
        $imageStatement->bindParam(1,$url);

        if($imageStatement->execute() === false){
            throw new DatabaseException();
        }
        header('Location: /?page=file');
        die();
    }
}