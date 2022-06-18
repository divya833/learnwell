<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
    echo '<script>window.location.href = "../profile.php";</script>';
}
$err = '';
$err2 = '';
$redirect = '../profile.php';
$otpVerification = 0;
if (isset($_GET['signout'])) {
    $err = 'Logged out successfully';
} elseif (isset($_GET['expired'])) {
    $err = 'Session expired, please login again.';
}
if (isset($_GET['login'])) {
    $err2 = 'Registration successfull, you can login now.';
}
if (isset($_GET['updated'])) {
    $err2 = 'Password updated, please login with new password.';
}
if (isset($_POST['submit'], $_POST['email'], $_POST['password'])) {
    $remember_token = genToken();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $redirect = $_POST['redirect'];

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = 'user'");
    $qryadmn->execute();
    if ($qryadmn->rowcount() > 0) {
        $rowadmn = $qryadmn->fetch();
        if ($rowadmn['status'] == 1) {
            $_SESSION['SESS_USER_TOKEN2'] = $rowadmn['token'];
            $_SESSION['SESS_USER_NAME2'] = $rowadmn['name'];
            $_SESSION['SESS_USER_TYPE2'] = $rowadmn['user_type'];
            $_SESSION['SESS_USER_EMAIL2'] = $rowadmn['email'];
            $_SESSION['SESS_USER_CONTACT2'] = $rowadmn['contact_no'];

            setcookie("LU001", $remember_token, time() + (10 * 365 * 24 * 60 * 60), '/');

            $db->prepare("UPDATE users SET remember_token = '$remember_token' WHERE  token = '" . $rowadmn['token'] . "'")->execute();

            echo '<script>window.location.href = "' . $redirect . '";</script>';
        } else {
            $err = 'Something went wrong!<br>Contact LEARN WELL to fix.';
        }
    } else {
        $err = 'Username or password is wrong! Try Again.';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN | LEARN WELL</title>
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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">Login</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <div class="container">
                <form id="contact-form" class="contact-fordm p-50 z-1 rel" name="contact-form" action="login.php" method="post" accept-charset="utf-8" autocomplete="off">
                            <input type="hidden" name="redirect" value="<?php echo $redirect ?>">
                    <div class="section-title text-center mb-50">
                        <h3>Login into your account</h3>
                        <div class="col-md-6 offset-md-3">
                            <p>Start learning by choosing from a wide range of courses</p>
                        </div>
                    </div>
                    <div class="row mt-25">
                        <div class="col-md-6 offset-md-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <?php if ($err != '') {
                                        echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                    } ?>
                                    <?php if ($err2 != '') {
                                        echo '<h6 class="text-success text-center alert-success py-3">' . $err2 . '</h6><br>';
                                    } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center mb-0">
                                    <button type="submit" name="submit" class="theme-btn">LOGIN <i class="fas fa-arrow-right"></i></button>
                                </div>
                                <br><br>
                                <h6 class="text-center mt-5"><a href="register.php">New here? Register now.</a></h6>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <?php include("include/footer.php"); ?>
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