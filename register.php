<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
    header("location: ../profile.php");
}
$err = '';
$err2 = '';
if (isset($_POST['submit'], $_POST['name'], $_POST['email'], $_POST['contact_no'], $_POST['qualification'])) {
    $token = genToken();
    $user_type = 'user';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $qualification = $_POST['qualification'];
    $status = 2;

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email'");
    $qryadmn->execute();

    if ($qryadmn->rowcount() > 0) {
        $err = 'Email already registered with us.';
    } else {
        $db->prepare("INSERT INTO users (user_type, token, name, email, qualification, contact_no, status) VALUES ('$user_type', '$token', '$name', '$email', '$qualification', '$contact_no', '$status')")->execute();
?>
        <script>
            window.location.href = '../register.php?done';
        </script>
<?php
    }
}
if (isset($_GET['done'])) {
    $err2 = "Your details submitted successfully, we'll send you an email with your login credentials once we've verified your information.";
}
$err2 = "Your details submitted successfully, we'll send you an email with your login credentials once we've verified your information.";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REGISTER | LEARN WELL</title>
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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">Register</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <div class="container">
                    <?php if (isset($_GET['done'])) {
                    ?>
                        <div class="col-md-6 offset-md-3 pt-100 pb-100 text-center">
                            <img src="assets/images/done.png" class="mb-10 wow fadeInUp delay-0-2s" width="150">
                            <h4 class="text-success text-center wow fadeInUp delay-0-2s"><?php echo $err2 ?></h4>
                        </div>
                    <?php } ?>
            <?php if (!isset($_GET['done'])) { ?>
                <form id="contact-form" class="contact-fordm p-50 z-1 rel" name="contact-form" action="" method="post" autocomplete="off">
                    <div class="section-title text-center mb-50">
                        <h3>Create your account</h3>
                        <div class="col-md-6 offset-md-3">
                            <p>To register, simply fill out the form below, and we'll send you an email with your login credentials once we've verified your information.</p>
                        </div>
                    </div>
                    <div class="row mt-25">
                        <div class="col-md-6 offset-md-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" id="email-address" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="contact_no" name="contact_no" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="qualification" name="qualification" class="form-control" placeholder="Qualification" required>
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
                                <div class="form-group text-center mb-5">
                                    <button type="submit" name="submit" class="theme-btn">REGISTER NOW <i class="fas fa-arrow-right"></i></button>
                                </div>
                                <br><br>
                                <h6 class="text-center mt-5"><a href="login.php">Already have an account?</a></h6>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
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