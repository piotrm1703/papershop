<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

var_dump(mail('macdada@gmail.com', 'test subject', 'test content'));