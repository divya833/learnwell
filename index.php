<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WELCOME TO LEARN WELL</title>
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
        <section class="hero-section-three bg-lighter rel z-1 pt-150 rpt-150">
            <div class="container">
                <div class="row large-gap">
                    <div class="col-lg-6 align-self-end">
                        <div class="hero-three-image-part">
                            <img src="assets/images/hero/hero-three-man.png" alt="Hero">
                            <div class="hero-chart wow fadeInUp delay-0-2s">
                                <img src="assets/images/hero/hero-chart.png" alt="Chart">
                                <h5>95% Success Results</h5>
                            </div>
                            <div class="hero-over-text">
                                <div class="about-image-over-item wow fadeInRight delay-0-2s">
                                    <img src="assets/images/about/icon1.png" alt="Icon">
                                    <h5>Experience Advisor</h5>
                                </div>
                                <div class="about-image-over-item wow fadeInLeft delay-0-2s">
                                    <img src="assets/images/about/icon2.png" alt="Icon">
                                    <h5>Quality Video Tutorials</h5>
                                </div>
                            </div>
                            <img class="hero-circle" src="assets/images/shapes/circle-dots-two.png" alt="Shape">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="hero-content-three pt-10 pb-100 rpt-40">
                            <span class="hero-sub-title mb-10 wow fadeInUp delay-0-2s"><span>2563+</span> Students</span>
                            <h1 class="mb-25 wow fadeInUp delay-0-4s">We’re Best <span>Online</span> Education Partners University 2022</h1>
                            <ul class="list-style-one wow fadeInUp delay-0-6s">
                                <li>Experts Advisors</li>
                                <li>538+ Courses</li>
                            </ul>
                            <div class="hero-btns mt-10 wow fadeInUp delay-0-8s">
                                <a href="contact.php" class="theme-btn mt-10">Get started <i class="fas fa-arrow-right"></i></a>
                                <a href="courses.php" class="theme-btn style-two mt-10">our courses <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="hero-rectangle" src="assets/images/shapes/rectangle-dots-two.png" alt="Shape">
            <div class="hero-circles-one wow fadeInUpRight delay-0-4s"></div>
            <div class="hero-circles-two wow fadeInUpRight delay-0-2s"></div>
        </section>
        <!-- Hero Section End -->


        <!-- Feature Section Start -->
        <section class="freature-section-six pt-120 rpt-90 pb-90 rpb-60">
            <div class="container">
                <div class="row large-gap mb-30">
                    <div class="col-lg-6">
                        <div class="freature-six-left wow fadeInUp delay-0-2s">
                            <div class="section-title mb-30">
                                <span class="sub-title-three">Why Learn Us</span>
                                <h2>Experience to <span>Online</span> Learning Center</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="freature-six-right pt-55 rpt-0 wow fadeInUp delay-0-4s">
                            <p>Syllabus of any competitive examination is an ocean, and to swim the ocean, it is necessary to know where the sea coast is exactly located. Before starting the preparation, it is necessary to divide the syllabus and schedule your studies. There are different techniques to divide the syllabus, and we are here to help you with a well arranged timetable capable of deliver the whole syllabus.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-six-item mt-30 wow fadeInUp delay-0-2s">
                            <div class="content">
                                <div class="icon">
                                    <img src="assets/images/features/feature-five-icon1.png" alt="Icon">
                                </div>
                                <h5>Exclusive Courses</h5>
                                <p></p>
                            </div>
                            <a href="about.php" class="read-more color-two">raed more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-six-item wow fadeInUp delay-0-4s">
                            <div class="content">
                                <div class="icon">
                                    <img src="assets/images/features/feature-five-icon2.png" alt="Icon">
                                </div>
                                <h5>Creative Advisors</h5>
                                <p></p>
                            </div>
                            <a href="about.php" class="read-more color-two">raed more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-six-item mt-30 wow fadeInUp delay-0-6s">
                            <div class="content">
                                <div class="icon">
                                    <img src="assets/images/features/feature-five-icon3.png" alt="Icon">
                                </div>
                                <h5>Certifications</h5>
                                <p></p>
                            </div>
                            <a href="about.php" class="read-more color-two">raed more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-six-item wow fadeInUp delay-0-8s">
                            <div class="content">
                                <div class="icon">
                                    <img src="assets/images/features/feature-five-icon4.png" alt="Icon">
                                </div>
                                <h5>Video Tutorials</h5>
                                <p></p>
                            </div>
                            <a href="about.php" class="read-more color-two">raed more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Section End -->


        <!-- About Start -->
        <section class="about-four-section pb-130 rpb-100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="about-four-content rmb-55 wow fadeInLeft delay-0-2s">
                            <div class="section-title mb-25">
                                <span class="sub-title-three">About Wellearn</span>
                                <h2>Know <span>Something</span> About Our Programs Culture at Wellearn</h2>
                            </div>
                            <p></p>
                            <ul class="list-style-four pt-5 pb-35">
                                <li>Best Instructor & Best Programs</li>
                                <li>100% ISO Certified Gruentee</li>
                            </ul>
                            <a href="about.php" class="theme-btn style-three">Learn more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-four-right-part mt-10 wow fadeInRight delay-0-2s">
                            <img class="image-one" src="assets/images/about/about-four1.jpg" alt="About">
                            <img class="image-two" src="assets/images/about/about-four2.jpg" alt="About">
                            <div class="saticfiction bg-green br-5 text-white">
                                <span class="counter-number"><span></span></span>
                                <h4>85% Saticfied Students</h4>
                            </div>
                            <div class="experience text-white bg-light-blue br-5">
                                <i class="fas fa-graduation-cap"></i>
                                <h5>Experience Advisor</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->


        <!-- Counter Start -->
        <div class="counter-section-three">
            <div class="container">
                <div class="counter-three-wrap bg-light-blue text-white">
                    <div class="success-item">
                        <span class="count-text plus" data-speed="3000" data-stop="256">0</span>
                        <span>Students<br>Enrolled</span>
                    </div>
                    <div class="success-item">
                        <span class="count-text plus" data-speed="3000" data-stop="2456">0</span>
                        <span>Finished<br>Seasons</span>
                    </div>
                    <div class="success-item">
                        <span class="count-text percent" data-speed="3000" data-stop="99.9">0</span>
                        <span>Saticfaction<br>Rate</span>
                    </div>
                    <div class="success-item">
                        <span class="count-text plus" data-speed="3000" data-stop="2563">0</span>
                        <span>Experience<br>Instructors</span>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/testi.php"); ?>
        <section class="newsletter-video-section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-10">
                        <div class="newsletter-video-part overlay p-100 rp-50 wow fadeInRight delay-0-2s" style="background-image: url(assets/images/video/newslatter-video-bg.jpg);">
                            <!-- <a href="#" class="mfp-iframe video-play"><i class="fas fa-play"></i></a> -->
                            <div class="notification br-5 bg-white text-center">
                                <img src="assets/images/shapes/notification.png" alt="Notification">
                                <div class="content">
                                    <h4>Get Our Online Courses</h4>
                                </div>
                            </div>
                            <span class="bg-text">LearnWell</span>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="newsletter-video-content bg-light-blue text-white wow fadeInLeft delay-0-2s">
                            <div class="section-title mb-20">
                                <span class="sub-title-two mb-15">Our Newsletter</span>
                                <h2>Get Our Every <span>Single</span> Notifications</h2>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter Section End -->


        <!-- Blog Section Start -->
        <section class="blog-section pt-120 rpt-90 pb-100 rpb-70">
            <div class="container">
                <div class="section-title text-center mb-70">
                    <span class="sub-title-two">Latest News & Blog</span>
                    <h2>Learn Every News <span>& Blog</span></h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item style-two middle-image wow fadeInUp delay-0-2s">
                            <h4><a href="#">Designing Better Link Web Site and Emailsite</a></h4>
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="#">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                            <div class="blog-image">
                                <img src="assets/images/blog/blog-two4.jpg" alt="Blog">
                                <span class="date">March <span>15</span></span>
                            </div>
                            <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item style-two middle-image wow fadeInUp delay-0-4s">
                            <h4><a href="#">Variables In The Hugo Seen Static Sitegen</a></h4>
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="#">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                            <div class="blog-image">
                                <img src="assets/images/blog/blog-two5.jpg" alt="Blog">
                                <span class="date">March <span>15</span></span>
                            </div>
                            <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item style-two middle-image wow fadeInUp delay-0-6s">
                            <h4><a href="#">Complete Gude Switch From HTTP To HTTPS</a></h4>
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="#">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                            <div class="blog-image">
                                <img src="assets/images/blog/blog-two6.jpg" alt="Blog">
                                <span class="date">March <span>15</span></span>
                            </div>
                            <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
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