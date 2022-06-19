<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$err = '';
$token = $user;

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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">Update Password</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <div class="container">
            <form id="contact-form" class="contact-fordm p-50 z-1 rel" name="contact-form" action="" method="post" accept-charset="utf-8" autocomplete="off">
                <div class="row mt-25">
                    <div class="col-md-6 offset-md-3">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" name="cPassword" class="form-control" placeholder="Current password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" name="nPassword" class="form-control" placeholder="New password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" name="rPassword" class="form-control" placeholder="Repeat new password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php if ($err != '') {
                                    echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center mb-0">
                                    <button type="submit" name="submit" class="theme-btn">UPDATE <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
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