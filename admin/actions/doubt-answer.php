<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_POST['token'];
$answer = $_POST['answer'];
$answer_by = $_SESSION['SESS_USER_TOKEN'];
$answered_on = $current_date_time_local;

$db->prepare("UPDATE courses_doubts SET answer = '$answer', answer_by = '$answer_by', answered_on = '$answered_on' WHERE token = '$token'")->execute();

header("location:../doubt-answer.php?token=" . $token . "");
