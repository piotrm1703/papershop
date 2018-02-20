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
    require_once('templates/header.php');
    require_once ('templates/style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once ('../login.php');
    }else {
        require_once ('../logout.php');
    }
    require_once ('templates/navtop.php');
    if(isset($_SESSION['authenticatedUser'])){
        require_once ('templates/adminNavForm.php');
    }
    require_once('templates/sidemenu.php');
}