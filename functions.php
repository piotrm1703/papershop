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

function siteInterface(){
    require_once(__DIR__.'/templates/header.php');
    require_once (__DIR__.'/templates/style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/login.php');
    }else {
        require_once (__DIR__.'/logout.php');
    }
    require_once (__DIR__.'/templates/navtop.php');
    if(isset($_SESSION['authenticatedUser']) && ($_SESSION['authenticatedUser'] === 'admin1' || $_SESSION['authenticatedUser'] === 'admin' )){
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
