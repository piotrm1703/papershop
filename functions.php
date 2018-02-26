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
    require_once(__DIR__.'/templates/header.php');
    require_once (__DIR__.'/templates/style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/login.php');
    }else {
        require_once (__DIR__.'/logout.php');
    }
    require_once (__DIR__.'/templates/navtop.php');
    if(isset($_SESSION['authenticatedUser'])){
        require_once (__DIR__.'/templates/adminNavForm.php');
    }
    require_once(__DIR__.'/templates/sidemenu.php');
}

function sqlLikeEscape($value)
{
    return addcslashes($value,'%_');
}