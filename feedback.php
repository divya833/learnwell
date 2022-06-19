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
    <title>FEEDBACK | LEARN WELL</title>
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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">Feedback</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <div class="col-12">
            <div class="row mt-25">
                <div class="col-md-6">
                    <form id="contact-form" class="contact-fordm p-50 z-1 rel" name="contact-form" action="actions/feedback.php" method="post" accept-charset="utf-8" autocomplete="off">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="form-control" placeholder="type subject here" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your Feedback</label>
                                    <textarea class="form-control" name="feedback" placeholder="type your feedback" rows="6" style="resize: none;" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php if ($err != '') {
                                    echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center mb-0">
                                    <button type="submit" name="submit" class="theme-btn">SEND <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 p-0">
                    <div class="faq-accordion">
                        <?php
                        $qry = $db->prepare("SELECT * FROM feedbacks WHERE created_by = '$user' ORDER BY id DESC");
                        $qry->execute();
                        if ($qry->rowCount() > 0) {
                            for ($i = 0; $rows = $qry->fetch(); $i++) {
                        ?>
                                <div class="card">
                                    <a class="collapsed card-header" href="#" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?>"><?php echo ucfirst($rows['subject']) ?><span class="toggle-btn"></span>
                                    </a>
                                    <div id="collapse<?php echo $i ?>" class="collapse" data-parent="#tabContent1">
                                        <div class="card-body">
                                            <p class=" p-3">
                                                <?php echo time_convert($rows['created_at']) ?><br>
                                                <?php echo ucfirst($rows['feedback']) ?>
                                            </p>
                                            <?php if ($rows['reply'] != '') { ?>
                                                <h6 class="p-3 pb-0 mt-3 mb-1">REPLY BY ADMIN</h6>
                                                <p class="p-3">
                                                    <?php echo ucfirst($rows['reply']) ?>
                                                </p>
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
            </div>
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