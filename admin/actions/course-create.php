<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');

$token = genToken();
$category = ($_POST["category"]);
$title = ($_POST["title"]);
$description = ($_POST["description"]);
$course_level = ($_POST["course_level"]);
$duration = ($_POST["duration"]);
$language = ($_POST["language"]);
$target = ($_POST["target"]);
$requirement = ($_POST["requirement"]);
$price = ($_POST["price"]);
$created_at = $current_date_time_local;

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$image = genToken() . '.' . $ext;
move_uploaded_file($_FILES["image"]["tmp_name"], "../../files/" . $image);

$stmt = $db->prepare("INSERT INTO courses (token, category, title, description, course_level, duration, language, target, requirement, price, image, created_at) VALUES (:token, :category, :title, :description, :course_level, :duration, :language, :target, :requirement, :price, :image, :created_at)");
$stmt->execute([':token' => $token, ':category' => $category, ':title' => $title, ':description' => $description, ':course_level' => $course_level, ':duration' => $duration, ':language' => $language, ':target' => $target, ':requirement' => $requirement, ':price' => $price, ':image' => $image, ':created_at' => $created_at]);

header("location:../course-update.php?token=" . $token . "");
