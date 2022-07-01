<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_GET['token'];
$status = $_GET['status'];
$db->prepare("UPDATE courses SET status = '$status' WHERE token = '$token'")->execute();

header("location:../course-update.php?token=" . $token . "");
