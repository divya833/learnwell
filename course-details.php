<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM courses WHERE token = '$token'");
$qry->execute();
$rows = $qry->fetch();
$title = ucwords($rows['title']);
$price = $rows['price'];

$qry2 = $db->prepare("SELECT * FROM courses_opted WHERE course = '$token'");
$qry2->execute();
$enrolled = $qry2->rowCount();

$faculty_token = $rows['faculty'];
$faculty = 0;

$qry3 = $db->prepare("SELECT * FROM faculties WHERE token = '$faculty_token'");
$qry3->execute();
$faculty = $qry3->rowCount();
if ($faculty > 0) {
    $rows_faculty = $qry3->fetch();
}

$qry4 = $db->prepare("SELECT * FROM courses_opted WHERE course = '$token' AND opt_by = '$user'");
$qry4->execute();
$enrolled_byme = $qry4->rowCount();
if ($enrolled_byme > 0) {
    $rows_opted = $qry4->fetch();
    $price = $rows_opted['price'];
    $enrolled_on = date_convert($rows_opted['created_at']);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?> | LEARN WELL</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;family=Oswald:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome-5.9.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.5.3.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="page-wrapper">

        <?php include("include/header.php"); ?>
        <section class="course-details-area pt-130 rpt-100">
            <div class="container">
                <div class="row large-gap mb-100">
                    <div class="col-lg-8">
                        <div class="course-details-content">
                            <div class="course-header">
                                <span class="category"><?php echo ucwords($rows['category']) ?></span>
                            </div>
                            <h2><?php echo ucfirst($rows['title']) ?></h2>
                            <ul class="author-date-enroll">
                                <li><i class="far fa-user"></i> <?php echo $enrolled ?> Enrolled</li>
                            </ul>
                            <div class="image mb-35">
                                <img src="<?php echo "files/" . $rows['image'] ?>" alt="Course Details">
                            </div>
                            <p><?php echo ucfirst($rows['description']) ?></p>
                            <h3 class="mt-40">Requirements</h3>
                            <ul class="list-style-two mb-45">
                                <?php echo nl2br($rows['requirement']) ?>
                            </ul>
                            <h3>Target Audience</h3>
                            <ul class="list-style-two mb-45">
                                <?php echo nl2br($rows['target']) ?>
                            </ul>
                            <?php if ($faculty > 0) { ?>
                                <h3>Faculty</h3>
                                <div class="course-instructor pt-10 pb-55 wow fadeInUp delay-0-2s">
                                    <div class="row align-items-center">
                                        <div class="col-sm-5">
                                            <div class="instructor-image">
                                                <img src="<?php echo '../files/' . ($rows_faculty['photo']) ?>" alt="instructor">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="instructor-details">
                                                <h4><?php echo ucwords($rows_faculty['name']) ?></h4>
                                                <span class="designations"><?php echo ucwords($rows_faculty['designation']) ?></span>
                                                <p><?php echo ucwords($rows_faculty['bio']) ?></p>
                                                <h5>Follow Me</h5>
                                                <div class="social-style-two">
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <h3>Course Curriculum</h3>
                            <div class="faq-accordion pt-10 pb-50 wow fadeInUp delay-0-2s" id="course-faq">
                                <?php
                                $qry_curriculum = $db->prepare("SELECT * FROM courses_curriculum WHERE course = '$token' ORDER BY id");
                                $qry_curriculum->execute();
                                for ($i2 = 0; $row_curriculum = $qry_curriculum->fetch(); $i2++) {
                                ?>
                                    <div class="card">
                                        <a class="card-header" href="#" data-toggle="collapse" data-target="#collapse<?php echo $i2 ?>" aria-expanded="false" aria-controls="collapse<?php echo $i2 ?>"><?php echo ucfirst($row_curriculum['title']) ?> <span class="toggle-btn"></span>
                                        </a>
                                        <div id="collapse<?php echo $i2 ?>" class="collapse" data-parent="#course-faq">
                                            <div class="card-body">
                                                <ul class="course-video-list">
                                                    <?php
                                                    $qry_curriculum_in = $db->prepare("SELECT * FROM courses_curriculum_in WHERE course = '$token' AND curriculum = '" . $row_curriculum['token'] . "'");
                                                    $qry_curriculum_in->execute();
                                                    for ($i3 = 0; $row_curriculum_in = $qry_curriculum_in->fetch(); $i3++) {
                                                        $icon = '<i class="fa fa-align-justify"></i>';
                                                        if ($row_curriculum_in['material_type'] == 'Video') {
                                                            $icon = '<i class="far fa-play-circle"></i>';
                                                        }

                                                    ?>
                                                        <li>
                                                            <?php
                                                            if ($enrolled_byme > 0) {
                                                                if ($row_curriculum_in['material_type'] == 'Video') { ?>
                                                                    <a href="javascript:void(0)" class="dynamicPopup-video" data-url="play.php?token=<?php echo $row_curriculum_in['token'] ?>" data-toggle="modal" data-target="#dynamicPopup-video">
                                                                        <span class="title"><?php echo ucwords($row_curriculum_in['material']) ?></span>
                                                                        <?php echo $icon ?>
                                                                        <span class="duration"><?php echo $row_curriculum_in['duration'] ?></span>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="javascript:void(0)" class="dynamicPopup-lg" data-url="read.php?token=<?php echo $row_curriculum_in['token'] ?>" data-toggle="modal" data-target="#dynamicPopup-lg">
                                                                        <span class="title"><?php echo ucwords($row_curriculum_in['material']) ?></span>
                                                                        <?php echo $icon ?>
                                                                        <span class="duration"><?php echo $row_curriculum_in['duration'] ?></span>
                                                                    </a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <a href="javascript:void(0)">
                                                                    <span class="title"><?php echo ucwords($row_curriculum_in['material']) ?></span>
                                                                    <?php echo $icon ?>
                                                                    <span class="duration"><?php echo $row_curriculum_in['duration'] ?></span>
                                                                </a>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- <h3>Student Feedback</h3>
                            <div class="student-feedback pt-10 wow fadeInUp delay-0-2s">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="student-average-feedback bg-green text-center text-white">
                                            <b>5.0</b>
                                            <div class="ratting mb-10">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h6>Total 1 Rating</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 align-self-center">
                                        <div class="student-feedback-details">
                                            <div class="student-feedback-author mb-20">
                                                <img src="assets/images/coachs/feedback-author.jpg" alt="Authro">
                                                <div class="content">
                                                    <h4>Lucius D. Thomas</h4>
                                                    <span class="designations">IT Students (Basic)</span>
                                                </div>
                                            </div>
                                            <div class="ratting-total">
                                                <div class="ratting-total-item">
                                                    <div class="ratting mb-10">
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                    <span class="ratting-bar">
                                                        <span style="width: 100%;"></span>
                                                    </span>
                                                    <span class="ratting-number">1 Rating</span>
                                                </div>
                                                <div class="ratting-total-item">
                                                    <div class="ratting mb-10">
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(4)</span>
                                                    </div>
                                                    <span class="ratting-bar">
                                                        <span style="width: 0;"></span>
                                                    </span>
                                                    <span class="ratting-number">0 Rating</span>
                                                </div>
                                                <div class="ratting-total-item">
                                                    <div class="ratting mb-10">
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3)</span>
                                                    </div>
                                                    <span class="ratting-bar">
                                                        <span style="width: 0;"></span>
                                                    </span>
                                                    <span class="ratting-number">0 Rating</span>
                                                </div>
                                                <div class="ratting-total-item">
                                                    <div class="ratting mb-10">
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2)</span>
                                                    </div>
                                                    <span class="ratting-bar">
                                                        <span style="width: 0;"></span>
                                                    </span>
                                                    <span class="ratting-number">0 Rating</span>
                                                </div>
                                                <div class="ratting-total-item">
                                                    <div class="ratting mb-10">
                                                        <i class="fas fa-star selected"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(1)</span>
                                                    </div>
                                                    <span class="ratting-bar">
                                                        <span style="width: 0;"></span>
                                                    </span>
                                                    <span class="ratting-number">0 Rating</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course-sidebar rmt-75 shadow">
                            <div class="widget widget-course-details wow fadeInUp delay-0-2s">
                                <div class="widget-video">
                                    <img src="<?php echo "files/" . $rows['image'] ?>" alt="Course Details">
                                </div>
                                <div class="price-off">
                                    <span class="price"> <?php echo number_format($price, 2) ?></span>
                                </div>
                                <ul class="course-details-list mb-25">
                                    <li><i class="far fa-file-alt"></i> <span>Course Level</span> <b><?php echo $rows['course_level'] ?></b></li>
                                    <li><i class="far fa-clock"></i> <span>Duration</span> <b><?php echo $rows['duration'] ?></b></li>
                                    <li><i class="far fa-clipboard"></i> <span>Category</span> <b><?php echo $rows['category'] ?></b></li>
                                    <li><i class="fas fa-globe"></i> <span>Language</span> <b><?php echo $rows['language'] ?></b></li>
                                    <?php if ($enrolled_byme > 0) { ?>
                                        <li><i class="fas fa-clock"></i> <span>Enrolled On</span> <b><?php echo $enrolled_on ?></b></li>
                                    <?php } ?>
                                </ul>
                                <?php if ($enrolled_byme == 0) { ?>
                                    <a href="javascript:void(0);" class="theme-btn" data-toggle="modal" data-target="#staticBackdrop">Opt In to course <i class="fas fa-arrow-right"></i></a>
                                <?php } ?>
                                <div class="social-style-two d-flex">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($enrolled_byme > 0) { ?>
                        <div class="col-12">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Ask Doubts
                                    <?php if ($faculty > 0) {
                                        echo " to " . ucwords($rows_faculty['name']);
                                    } ?>
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body p-1">
                                    <form id="contact-form" class="contact-fordm p-50 z-1 rel" name="contact-form" action="actions/doubt.php" method="post" accept-charset="utf-8" autocomplete="off">
                                        <input type="hidden" name="course" value="<?php echo $token ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="doubt" placeholder="type your doubt here" rows="6" style="resize: none;" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-right mb-0">
                                                <button type="submit" name="submit" class="theme-btn">ASK QUESTION <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="faq-accordion">
                                <?php
                                $qry = $db->prepare("SELECT * FROM courses_doubts WHERE student = '$user' AND course = '$token' ORDER BY id DESC");
                                $qry->execute();
                                if ($qry->rowCount() > 0) {
                                    for ($i2 = 0; $rows = $qry->fetch(); $i2++) {
                                ?>
                                        <div class="card">
                                            <a class="collapsed card-header" href="#" data-toggle="collapse" data-target="#collapseh<?php echo $i2 ?>" aria-expanded="false" aria-controls="collapseh<?php echo $i2 ?>">
                                                <?php echo ucfirst($rows['doubt']) ?>
                                                <span class="small"><?php echo time_convert($rows['created_at']) ?></span>
                                                <span class="toggle-btn"></span>
                                            </a>
                                            <div id="collapseh<?php echo $i2 ?>" class="collapse" data-parent="#tabContent1">
                                                <div class="card-body">
                                                    <?php if ($rows['answer'] != '') { ?>
                                                        <p class="p-3">
                                                            <?php echo ucfirst($rows['answer']) ?><br>
                                                            <span class="small"><?php echo time_convert($rows['answered_on']) ?></span>
                                                        </p>
                                                    <?php } else { ?>
                                                        <p class="p-3">WAITING FOR RESPOND</p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-md-6 offset-md-3">
                                        <img src="images/mt.webp" class="w-100">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php include("include/footer.php"); ?>
    </div>
    <?php if ($enrolled_byme == 0) { ?>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="course-details-content">
                            <div class="course-header">
                                <span class="category"><?php echo ucwords($rows['category']) ?></span>
                            </div>
                            <h2><?php echo ucfirst($rows['title']) ?></h2>
                            <ul class="author-date-enroll">
                                <li><i class="far fa-user"></i> <?php echo $enrolled ?> Enrolled</li>
                            </ul>
                            <h3 class="mt-40">Requirements</h3>
                            <ul class="list-style-two mb-45">
                                <?php echo nl2br($rows['requirement']) ?>
                            </ul>
                            <h3>Target Audience</h3>
                            <ul class="list-style-two mb-45">
                                <?php echo nl2br($rows['target']) ?>
                            </ul>
                            <h3>Fee Payable</h3>
                            <ul class="list-style-two mb-45">
                                <?php echo number_format($price, 2) ?>/- only
                            </ul>
                        </div>
                        <h4>Are you sure you want to select the course "<?php echo ucfirst($rows['title']) ?>"?</h4>
                    </div>
                    <div class="modal-footer w-100">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Not now</button>
                        <a type="button" class="theme-btn float-right" href="actions/optin.php?token=<?php echo $token ?>&price=<?php echo $price ?>">Yes, Opt In</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php include("include/dynamicPopup.php"); ?>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/appear.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/circle-progress.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="include/dynamicPopup.js"></script>
    <script src="https://cdn.plyr.io/3.6.5/plyr.polyfilled.js"></script>

</body>

</html>