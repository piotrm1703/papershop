<?php
$username = htmlEscape($_SESSION['authenticatedUser']);
require_once (__DIR__.'/web/templates/logoutForm.php');

if(isset($_POST['logout'])){
    unset($_SESSION['authenticatedUser']);
    header('Location: /');
    die();
}