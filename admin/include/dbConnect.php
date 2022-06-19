<?php
set_time_limit(0);
$server = 1;
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'learnwell';
if ($server == 1) {
    $db_host        = 'localhost';
    $db_user        = 'ewolwk2y_basic_user';
    $db_pass        = 'uc8j0c9cj7dd';
    $db_database    = 'ewolwk2y_learnwell';
}
$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
