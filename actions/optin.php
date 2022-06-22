<?php
include('../include/auth.php');
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');

$token = genToken();
$opt_by = $user;
$course = ($_GET["token"]);
$price = ($_GET["price"]);
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO courses_opted (token, opt_by, course, price, created_at) VALUES (:token, :opt_by, :course, :price, :created_at)");
$stmt->execute([':token' => $token, ':opt_by' => $opt_by, ':course' => $course, ':price' => $price, ':created_at' => $created_at]);

header("location:../profile.php");
