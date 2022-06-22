<div class="preloader"></div>

<header class="main-header header-four">
    <div class="header-top bg-light-blue text-white">
        <div class="container-fluid">
            <div class="top-inner">
                <div class="top-left">
                    <p><i class="far fa-clock"></i> <b>Working Hours</b> : Manday - Friday, 08am - 05pm</p>
                    <p><i class="fas fa-phone"></i> <b>Hotline</b> : <a href="callto:+012(345)6789">+012 (345) 67 89</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Header-Upper -->
    <div class="header-upper">
        <div class="container-fluid clearfix">

            <div class="header-inner d-flex align-items-center justify-content-between">
                <div class="logo-outer">
                    <div class="logo"><a href="../"><img src="assets/images/logos/logo-three.png" alt="Logo" title="Logo"></a></div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            <div class="mobile-logo">
                                <a href="../">
                                    <img src="assets/images/logos/logo-three.png" alt="Logo" title="Logo">
                                </a>
                            </div>

                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="../">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="courses.php">Courses</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <?php
                                if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
                                ?>
                                    <li class="dropdown"><a href="#">Profile</a>
                                        <ul>
                                            <li><a href="profile.php"><?php echo ucwords($_SESSION['SESS_USER_NAME2']) ?></a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="register.php">Register</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                    </nav>
                </div>
                <div class="menu-btns d-lg-flex d-none align-items-center">
                    <?php
                    if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
                    ?>
                        <a href="logout.php" class="theme-btn">Logout</a>
                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="theme-btn">Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>