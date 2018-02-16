<?php



//echo $_SESSION['a'];
//echo $_SESSION['b'];
//echo $_SESSION['c'];
//
//var_dump($_SESSION);


$headers = "From: webmaster@example.com" . "\r\n" .
    "CC: somebodyelse@example.com";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

var_dump(mail('macdada@gmail.com', 'test subject', 'test content'));