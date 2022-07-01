<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = ($_POST["token"]);
$category = ($_POST["category"]);
$title = ($_POST["title"]);
$description = ($_POST["description"]);
$course_level = ($_POST["course_level"]);
$duration = ($_POST["duration"]);
$language = ($_POST["language"]);
$target = ($_POST["target"]);
$requirement = ($_POST["requirement"]);
$price = ($_POST["price"]);

$stmt = $db->prepare("UPDATE courses SET category = :category, title = :title, description = :description, course_level = :course_level, duration = :duration, language = :language, target = :target, requirement = :requirement, price = :price WHERE token = :token");
$stmt->execute([':category' => $category, ':title' => $title, ':description' => $description, ':course_level' => $course_level, ':duration' => $duration, ':language' => $language, ':target' => $target, ':requirement' => $requirement, ':price' => $price, ':token' => $token]);

$image = $_FILES["image"]["name"];
if ($image != '') {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $image = genToken() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../files/" . $image);
    $db->prepare("UPDATE courses SET image = '$image' WHERE token = '$token'")->execute();
}

header("location:../course-update.php?token=" . $token . "");
