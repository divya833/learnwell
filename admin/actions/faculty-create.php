<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');

$token = genToken();
$name = ($_POST["name"]);
$designation = ($_POST["designation"]);
$bio = ($_POST["bio"]);

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$photo = genToken() . '.' . $ext;
move_uploaded_file($_FILES["image"]["tmp_name"], "../../files/" . $photo);

$stmt = $db->prepare("INSERT INTO faculties (token, name, designation, bio, photo) VALUES (:token, :name, :designation, :bio, :photo)");
$stmt->execute([':token' => $token, ':name' => $name, ':designation' => $designation, ':bio' => $bio, ':photo' => $photo]);

$user_type = "faculty";
$email = ($_POST["email"]);
$profile_dp = $photo;
$password = $_POST["password"];
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO users (token, user_type, name, email, profile_dp, password, created_at) VALUES (:token, :user_type, :name, :email, :profile_dp, :password, :created_at)");
$stmt->execute([':token' => $token, ':user_type' => $user_type, ':name' => $name, ':email' => $email, ':profile_dp' => $profile_dp, ':password' => $password, ':created_at' => $created_at]);

header("location:../faculties.php?filter=1");
