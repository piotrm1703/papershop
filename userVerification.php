<?php
if(!isset($_SESSION['authenticatedUser']) || ($_SESSION['authenticatedUser'] !== 'admin1' && $_SESSION['authenticatedUser'] !== 'admin')) {
    header('Location: /');
    die();
}