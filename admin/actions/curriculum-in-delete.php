<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = ($_GET["token"]);
$course = ($_GET["course"]);

$db->prepare("DELETE FROM courses_curriculum_in WHERE token = '$token'")->execute();

header("location:../course-update.php?token=" . $course . "");
