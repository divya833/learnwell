<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'CREATE COURSE';
?>
<!doctype html>
<html class="no-js" lang="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | LEARN WELL ADMIN PANEL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="datatable/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include("include/header.php"); ?>
        <div class="dashboard-page-one">
            <?php include("include/sidebar.php"); ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="new-added-form" action="actions/course-create.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Category<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="web design/photography/app development etc" name="category" class="form-control" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Basic Web Design by Photoshop and Figma" name="title" class="form-control" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" name="description" id="form-message" rows="5" required></textarea>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Course Level<span class="text-danger">*</span></label>
                                            <select class="select2" required name="course_level">
                                                <option value="">Please Select*</option>
                                                <option>Beginner</option>
                                                <option>Intermediate</option>
                                                <option>Advanced</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Duration<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="25.5 Hrs" name="duration" class="form-control" required>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Language<span class="text-danger">*</span></label>
                                            <select class="select2" required name="language">
                                                <option value="">Please Select*</option>
                                                <option>English</option>
                                                <option>Malayalam</option>
                                                <option>Hindi</option>
                                                <option>Tamil</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Target Audience<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" placeholder="Any Job Holders, Students etc" name="target" id="form-message" rows="5" required></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Requirements<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" placeholder="DevTools Debugging Tips And Shortcuts (Chrome, Firefox, Edge)" name="requirement" id="form-message" rows="5" required></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Course Price in INR<span class="text-danger">*</span></label>
                                            <input type="number" name="price" class="form-control" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Image<span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                        <div class="col-12 mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark float-right ml-3" name="submit">CREATE</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow float-right">RESET</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="datatable/DataTables-1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/main.js"></script>

</body>

</html>