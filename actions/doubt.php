<?php
session_start();
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');
$token = genToken();
$student = $_SESSION['SESS_USER_TOKEN2'];
$course = $_POST['course'];
$doubt = $_POST['doubt'];
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO courses_doubts(token, course, student, created_at, doubt) VALUES (?, ?, ?, ?, ?)");
$stmt->bindParam(1, $token);
$stmt->bindParam(2, $course);
$stmt->bindParam(3, $student);
$stmt->bindParam(4, $created_at);
$stmt->bindParam(5, $doubt);
$stmt->execute();

header("location:../course-details.php?token=" . $course . "");
