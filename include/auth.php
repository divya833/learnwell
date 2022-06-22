<?php
session_start();
if (!isset($_SESSION['SESS_USER_TOKEN2']) || trim($_SESSION['SESS_USER_TOKEN2']) == '') {
    header("location: ../login.php?expired");
}
$user = trim($_SESSION['SESS_USER_TOKEN2']);
