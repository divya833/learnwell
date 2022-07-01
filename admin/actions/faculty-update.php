<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');

$token = ($_POST["token"]);
$name = ($_POST["name"]);
$designation = ($_POST["designation"]);
$bio = ($_POST["bio"]);

$stmt = $db->prepare("UPDATE faculties SET name = :name, designation = :designation, bio = :bio WHERE token = :token");
$stmt->execute([':name' => $name, ':designation' => $designation, ':bio' => $bio, ':token' => $token]);

$email = ($_POST["email"]);
$password = ($_POST["password"]);

$stmt = $db->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE token = :token");
$stmt->execute([':name' => $name, ':email' => $email, ':password' => $password, ':token' => $token]);

$image = $_FILES["image"]["name"];
if ($image != '') {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $photo = genToken() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../files/" . $photo);

    $db->prepare("UPDATE faculties SET photo = '$photo' WHERE token = '$token'")->execute();
    $db->prepare("UPDATE users SET profile_dp = '$photo' WHERE token = '$token'")->execute();
}

header("location:../faculty-update.php?token=" . $token . "");
