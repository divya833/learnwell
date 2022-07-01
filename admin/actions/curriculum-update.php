<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = ($_POST["token"]);
$course = ($_POST["course"]);
$title = ($_POST["title"]);

$stmt = $db->prepare("UPDATE courses_curriculum SET course = :course, title = :title WHERE token = :token");
$stmt->execute([':course' => $course, ':title' => $title, ':token' => $token]);

header("location:../course-update.php?token=" . $course . "");
