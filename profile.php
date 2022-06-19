<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qry = $db->prepare("SELECT * FROM users WHERE token = '$user'");
$qry->execute();
$rows = $qry->fetch();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>COURSES | LEARN WELL</title>
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
    <style>
        /* .padding {
            padding: 3rem !important;
            margin-left: 200px
        } */

        .card-img-top {
            height: 200px;
        }

        .card-no-border .card {
            border-color: #d7dfe3;
            border-radius: 4px;
            margin-bottom: 30px;
            -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .pro-img {
            margin-top: -80px;
            margin-bottom: 20px
        }

        .little-profile .pro-img img {
            width: 128px;
            height: 128px;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 100%
        }

        html body .m-b-0 {
            margin-bottom: 0px
        }

        h3 {
            line-height: 30px;
            font-size: 21px
        }

        .btn-rounded.btn-md {
            padding: 12px 35px;
            font-size: 16px
        }

        html body .m-t-10 {
            margin-top: 10px
        }

        .btn-primary,
        .btn-primary.disabled {
            background: #7460ee;
            border: 1px solid #7460ee;
            -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in
        }

        .btn-rounded {
            border-radius: 60px;
            padding: 7px 18px
        }

        .m-t-20 {
            margin-top: 20px
        }

        .text-center {
            text-align: center !important
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #455a64;
            font-family: "Poppins", sans-serif;
            font-weight: 400
        }
    </style>

</head>

<body>
    <div class="page-wrapper">

        <?php include("include/header.php"); ?>
        <section class="course-left-area py-130 rpy-100">
            <div class="container">
                <div class="row large-gap">
                    <div class="col-12">
                        <div class="padding">
                            <div class="col-md-6 offset-md-3">
                                <div class="card"> <img class="card-img-top" src="assets/images/bgbg.jpg" alt="Card image cap">
                                    <div class="card-body little-profile text-center mb-10">
                                        <div class="pro-img"><img src="assets/images/avatar.jpg" alt="user"></div>
                                        <h3 class="m-b-0"><?php echo ucwords($_SESSION['SESS_USER_NAME2']) ?></h3>
                                        <p>Since <?php echo date_convert($rows['approved_at']) ?></p>
                                        <a href="update.php" class="m-t-10 waves-effect waves-dark btn btn-success btn-md btn-rounded" data-abc="true">Update</a>
                                        <a href="my-courses.php" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">My Courses</a>
                                        <a href="feedback.php" class="m-t-10 waves-effect waves-dark btn btn-info btn-md btn-rounded" data-abc="true">Feedback</a>
                                        <a href="logout.php" class="m-t-10 waves-effect waves-dark btn btn-danger btn-md btn-rounded" data-abc="true">Logout</a>
                                    </div>
                                </div>
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