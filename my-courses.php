<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MY COURSES | LEARN WELL</title>
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

</head>

<body>
    <div class="page-wrapper">

        <?php include("include/header.php"); ?>
        <section class="page-banner-area rel z-1 text-white text-center" style="background-image: url(assets/images/banner.jpg);">
            <div class="container">
                <div class="banner-inner rpt-10">
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">My Courses</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <!-- Page Banner End -->


        <!-- Course Left Start -->
        <section class="course-left-area py-130 rpy-100">
            <div class="container">
                <div class="row large-gap">
                    <div class="col-12">
                        <div class="course-grids">
                            <div class="row">

                                <?php
                                $qryM = $db->prepare("SELECT * FROM courses_opted WHERE opt_by = '$user'");
                                $qryM->execute();
                                for ($i = 0; $rowsM = $qryM->fetch(); $i++) {

                                    $enrolled_on = date_convert($rowsM['created_at']);

                                    $qry = $db->prepare("SELECT * FROM courses WHERE token = '" . $rowsM['course'] . "'");
                                    $qry->execute();
                                    $rows = $qry->fetch();
                                    $qry_curriculum_in = $db->prepare("SELECT * FROM courses_curriculum_in WHERE course = '" . $rows['token'] . "'");
                                    $qry_curriculum_in->execute();
                                ?>
                                    <div class="col-md-4">
                                        <div class="coach-item wow fadeInUp delay-0-4s">
                                            <div class="coach-image">
                                                <a href="course-details.php?token=<?php echo $rows['token'] ?>" class="category"><?php echo ucwords($rows['category']) ?></a>
                                                <img src="<?php echo "files/" . $rows['image'] ?>" alt="Coach">
                                            </div>
                                            <div class="coach-content">
                                                <h4><a href="course-details.php?token=<?php echo $rows['token'] ?>"><?php echo ucfirst($rows['title']) ?></a></h4>
                                                <div class="ratting-price">
                                                    <span class="price"> <?php echo number_format($rowsM['price'], 2) ?></span>
                                                </div>
                                                <ul class="coach-footer">
                                                    <li><i class="far fa-file-alt"></i><span><?php echo $qry_curriculum_in->rowcount(); ?> Lessions</span></li>
                                                </ul>
                                                <ul class="coach-footer">
                                                    <li><i class="far fa-file-alt"></i><span><?php echo "Enrolled On " . $enrolled_on; ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("include/footer.php"); ?>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
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

</body>

</html>