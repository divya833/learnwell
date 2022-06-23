<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_GET['token'];
$status = $_GET['status'];
if (isset($_GET['approve'])) {
    $password = genPassword();
    $approved_at = $current_date_time_local;
    $db->prepare("UPDATE users SET status = '$status', approved_at = '$approved_at', password = '$password' WHERE token = '$token'")->execute();

    $qry = $db->prepare("SELECT * FROM users WHERE token = '$token'");
    $qry->execute();
    $rows = $qry->fetch();
    $notification = '<html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <h3>Hi ' . ucwords($rows['name']) . ', Welcome to the well secured e-learning platform, we are the best online education partner 2022. You can choose from a wide range of courses. Your username is "' . $rows['email'] . '" and your password is "' . $rows['password'] . '". Do not share your login credentials with anyone.</h3>
    <h3><a href="https://learnwell.ewolwe.in/login.php">Click here</a> to login to Learn Well</h3>
    <h3>Happy learning.</h3>
    </body>
    </html>';
    
    Notify($notification, $rows['email']);
} else {
    $db->prepare("UPDATE users SET status = '$status' WHERE token = '$token'")->execute();
}
header("location:../learners.php?filter=" . $status . "");
