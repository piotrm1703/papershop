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
    require_once ('../loginForm.php');
    require_once ('../navtop.php');
    require_once ('../adminNav.php');
    require_once('../sidemenu.php');
    require_once ('../article.php');

}

