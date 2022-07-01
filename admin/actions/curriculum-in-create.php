<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');

$token = genToken();
$course = ($_POST["course"]);
$curriculum = ($_POST["curriculum"]);
$material = ($_POST["material"]);
$material_type = ($_POST["material_type"]);
$duration = ($_POST["duration"]);

$material_file = addslashes(file_get_contents($_FILES['material_file']['tmp_name']));
$material_file_name = addslashes($_FILES['material_file']['name']);
$material_file_size = getimagesize($_FILES['material_file']['tmp_name']);
$ext = pathinfo($_FILES['material_file']['name'], PATHINFO_EXTENSION);
$material_file = genToken() . '.' . $ext;
move_uploaded_file($_FILES["material_file"]["tmp_name"], "../../files/" . $material_file);

$stmt = $db->prepare("INSERT INTO courses_curriculum_in (token, course, curriculum, material, material_file, material_type, duration) VALUES (:token, :course, :curriculum, :material, :material_file, :material_type, :duration)");
$stmt->execute([':token' => $token, ':course' => $course, ':curriculum' => $curriculum, ':material' => $material, ':material_file' => $material_file, ':material_type' => $material_type, ':duration' => $duration]);

if ($material_type == 'PDF') {
    $msg = file_get_contents('../../files/' . $material_file);
    $msg_encrypted = my_encrypt($msg, $key);

    $material_file2 = genToken() . '.pdf';

    $file = fopen('../../files/'.$material_file2, 'wb');
    fwrite($file, $msg_encrypted);
    fclose($file);

    $stmt = $db->prepare("UPDATE courses_curriculum_in SET material_file2 = :material_file2 WHERE token = :token");
    $stmt->execute([':material_file2' => $material_file2, ':token' => $token]);
}

header("location:../course-update.php?token=" . $course . "");
