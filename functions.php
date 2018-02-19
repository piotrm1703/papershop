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
    require_once('../header.php');
    require_once ('../style.php');
    if(!isset($_SESSION['authenticatedUser'])){
        require_once ('../login.php');
    }else {
        require_once ('../logout.php');
    }
    require_once ('../navtop.php');
    if(isset($_SESSION['authenticatedUser'])){
        require_once ('../adminNav.php');
    }
    require_once('../sidemenu.php');
    require_once ('../article.php');

}

