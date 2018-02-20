<?php

require_once ('web/templates/logoutForm.php');

if(isset($_POST['logout'])){
    unset($_SESSION['authenticatedUser']);
    header('Location: /');
}