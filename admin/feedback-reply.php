<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'FEEDBACK';
$created_by = $user;
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM feedbacks WHERE token = '$token'");
$qry->execute();
$rows = $qry->fetch();

$qryIn = $db->prepare("SELECT * FROM users WHERE token = '" . $rows['created_by'] . "'");
$qryIn->execute();
$rowsIn = $qryIn->fetch();
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="actions/feedback-reply.php" method="post" class="new-added-form" autocomplete="off">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">SENT BY</label>
                                                <h4><?php echo ucwords($rowsIn['name']) ?> | <?php echo ($rowsIn['email']) ?> | <?php echo ($rowsIn['contact_no']) ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">SUBJECT</label>
                                                <h4><?php echo $rows['subject'] ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">FEEDBACK</label>
                                                <h4><?php echo $rows['feedback'] ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">Reply<span class="text-danger">*</span></label>
                                                <textarea class="form-control textarea" rows="10" style="resize: none;" placeholder="" name="reply" required><?php echo $rows['reply'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark float-right ml-3" name="submit">SEND</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow float-right ml-3">RESET</button>
                                            <a href="feedback.php" class="btn-fill-lg bg-dark-high text-white float-right">GO BACK</a>
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