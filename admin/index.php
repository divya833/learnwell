<?php
session_start();
if (isset($_SESSION['SESS_USER_TOKEN']) && trim($_SESSION['SESS_USER_TOKEN']) != '') {
    header("location: ../dashboard.php");
}

$err = '';
if (isset($_GET['signout'])) {
    $err = 'Signed out successfully';
} elseif (isset($_GET['expired'])) {
    $err = 'Session expired, please login again.';
}
if (isset($_POST['submit'], $_POST['email'], $_POST['password'])) {
    include('include/dbConnect.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND (user_type = 'admin' OR user_type = 'faculty')");
    $qryadmn->execute();
    if ($qryadmn->rowcount() > 0) {
        $rowadmn = $qryadmn->fetch();
        $_SESSION['SESS_USER_ID'] = $rowadmn['id'];
        $_SESSION['SESS_USER_TOKEN'] = $rowadmn['token'];
        $_SESSION['SESS_USER_NAME'] = $rowadmn['name'];
        $_SESSION['SESS_USER_TYPE'] = $rowadmn['user_type'];
        $_SESSION['SESS_USER_EMAIL'] = $rowadmn['email'];
        header("location: dashboard.php");
        exit();
    } else {
        $err = 'Username or password is wrong! Try Again.';
    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOGIN | LEARN WELL ADMIN PANEL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="img/logo2.png" alt="logo">
                    <hr>
                    <h3>ADMIN PANEL</h3>
                </div>
                <form action="" method="POST" class="login-form" autocomplete="off">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="email" name="email" placeholder="Enter usrename" class="form-control" required>
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <?php if ($err != '') {
                        echo '<h6 class="text-danger text-center">' . $err . '</h6>';
                    } ?>
                    <div class="form-group">
                        <button type="submit" name="submit" class="login-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>