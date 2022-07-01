<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = genToken();
$course = ($_POST["course"]);
$title = ($_POST["title"]);
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO courses_curriculum (token, course, title, created_at) VALUES (:token, :course, :title, :created_at)");
$stmt->execute([':token' => $token, ':course' => $course, ':title' => $title, ':created_at' => $created_at]);

header("location:../course-update.php?token=" . $course . "");
