<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_POST['token'];
$faculty = $_POST['faculty'];
$db->prepare("UPDATE courses SET faculty = '$faculty' WHERE token = '$token'")->execute();

header("location:../faculty-update.php?token=" . $faculty . "");
