<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$err = '';
$token = $_SESSION['SESS_USER_TOKEN'];

if (isset($_POST['cPassword'], $_POST['nPassword'], $_POST['rPassword'])) {
    $stmt = $db->prepare("SELECT * FROM users WHERE token = ? LIMIT 0,1");
    $stmt->bindParam(1, $token);
    $stmt->execute();
    $usercount = $stmt->rowCount();
    if ($usercount > 0) {
        $user_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if (trim($_POST['cPassword']) == $user_rows['password']) {
            if (trim($_POST['nPassword']) == trim($_POST['rPassword'])) {
                $nPassword = trim($_POST['nPassword']);
                $updateData = $db->prepare("UPDATE users SET password = :password WHERE token = :token");
                $updateData->bindParam(':password', $nPassword, PDO::PARAM_STR);
                $updateData->bindParam(':token', $token, PDO::PARAM_STR);
                $updateData->execute();
                $err = 'Password Updated.';
                header("location:logout.php");
            } else {
                $err = 'Repeat password is not matching.';
            }
        } else {
            $err = 'Current password is wrong.';
        }
    } else {
        $err = 'Somehting went wrong wrong.';
    }
}
$title = 'UPDATE PASSWORD';
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
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" class="new-added-form">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label>Current password</label>
                                            <input type="password" name="cPassword" class="form-control" placeholder="Current password" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>New password</label>
                                            <input type="password" name="nPassword" class="form-control" placeholder="New password" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Repeat new password</label>
                                            <input type="password" name="rPassword" class="form-control" placeholder="Repeat new password" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <?php if ($err != '') {
                                                echo '<h6 class="text-danger text-center">' . $err . '</h6>';
                                            } ?>
                                        </div>
                                        <div class="col-12 mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark float-right ml-3" name="submit">UDPATE</button>
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