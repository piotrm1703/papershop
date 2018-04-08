<?php

function htmlEscape($text)
{
    return htmlspecialchars(
        $text,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'utf-8'
    );
}

function sqlLikeEscape($value)
{
    return addcslashes($value,'%_');
}

function isAdmin()
{
//    if(isset($_SESSION['authenticatedUser'])){
        global $pdo;
        $userStatement = $pdo->prepare('SELECT isAdmin FROM users WHERE username = :username');
        $userStatement->bindParam(':username', $_SESSION['authenticatedUser']);

        if ($userStatement->execute() === false) {
            throw new DatabaseException();
        }

        $isAdmin = $userStatement->fetch();

        if($isAdmin['admin'] === '1'){
            return true;
        } else {
            return false;
        }
    }
//}

function siteInterface(){

    require_once(__DIR__.'/templates/header.php');
    require_once (__DIR__.'/templates/style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/login.php');
    }else {
        require_once (__DIR__.'/logout.php');
    }
    require_once (__DIR__.'/templates/navtop.php');
    if(isAdmin()){
        require_once (__DIR__.'/templates/adminNavForm.php');
    }
    require_once(__DIR__.'/templates/sidemenu.php');
}

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function polish_number_format($number) {
    return number_format($number, 2, ',', '.');
}
