<?php

function htmlEscape($text)
{
    return htmlspecialchars(
        $text,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'utf-8'
    );
}

function siteInterface(){
    require_once(__DIR__.'/web/templates/header.php');
    require_once (__DIR__.'/web/templates/style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/login.php');
    }else {
        require_once (__DIR__.'/logout.php');
    }
    require_once (__DIR__.'/web/templates/navtop.php');
    if(isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/web/templates/adminNavForm.php');
    }
    require_once(__DIR__.'/web/templates/sidemenu.php');
}