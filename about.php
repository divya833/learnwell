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
    <title>ABOUT US | LEARN WELL</title>
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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">about us</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <!-- Page Banner End -->

       
        <!-- About Section Start -->
        <section class="about-page-section pt-120 rpt-90">
            <div class="container">
                <div class="row align-items-center large-gap">
                    <div class="col-lg-5">
                        <div class="about-page-content wow fadeInLeft delay-0-2s">
                            <div class="section-title mb-30">
                                <span class="sub-title-two">About Learn Us</span>
                                <h2>We’re Experience to Online Education Learning Center</h2>
                            </div>
                            <div class="about-btns pt-25">
                                <a href="#" class="theme-btn my-15">Learn more <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-page-middle rpt-55 rpb-30 wow fadeInRight delay-0-2s">
                            <img src="assets/images/about/about-page.png" alt="About">
                            <div class="circle-content">
                                <b>25</b>
                                <span>Years Of Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="counter-wrap style-two wow fadeInRight delay-0-4s">
                            <div class="success-item">
                                <span class="count-text plus" data-speed="3000" data-stop="256">0</span>
                                <span>Enrolled Learner</span>
                            </div>
                            <div class="success-item">
                                <span class="count-text plus" data-speed="3000" data-stop="2.36">0</span>
                                <span>Finished Session</span>
                            </div>
                            <div class="success-item">
                                <span class="count-text percent" data-speed="3000" data-stop="99">0</span>
                                <span>Saticfaction Rate</span>
                            </div>
                            <div class="success-item">
                                <span class="count-text plus" data-speed="3000" data-stop="83">0</span>
                                <span>Awards Winning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->
       
       
        <!-- Features Section Start -->
        <section class="features-section-three rel z-1 pt-110 rpt-85 pb-100 rpb-70">
            <div class="container">
               <div class="section-title text-center mb-55">
                    <span class="sub-title-two">How About Learn Us</span>
                    <h2>Opportunity for Online Learning</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-three-item wow fadeInUp delay-0-2s">
                            <div class="icon">
                                <i class="flaticon-reading-book"></i>
                            </div>
                            <h4>Experts Minds</h4>
                            <p></p>
                            <a href="#" class="details-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-three-item wow fadeInUp delay-0-4s">
                            <div class="icon">
                                <img src="assets/images/features/icon7.png" alt="Icon">
                            </div>
                            <h4>Multiple Courses</h4>
                            <p></p>
                            <a href="#" class="details-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-three-item wow fadeInUp delay-0-6s">
                            <div class="icon">
                                <img src="assets/images/features/icon8.png" alt="Icon">
                            </div>
                            <h4>Hire Quickly</h4>
                            <p></p>
                            <a href="#" class="details-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature-three-item wow fadeInUp delay-0-8s">
                            <div class="icon">
                                <img src="assets/images/features/icon9.png" alt="Icon">
                            </div>
                            <h4>Video Tutorials</h4>
                            <p></p>
                            <a href="#" class="details-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->
       
       
        <!-- Team Section Start -->
        <section class="team-setion-two bg-lighter rel z-1 pt-120 rpt-90 pb-70 rpb-40">
            <div class="container">
               <div class="row justify-content-center">
                   <div class="col-lg-8">
                       <div class="section-title text-center mb-55">
                            <span class="sub-title-two">Meet Our Team</span>
                            <h2>We’ve Thousands Of Experience Faculties</h2>
                        </div>
                   </div>
               </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="assets/images/teams/team1.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>David S. Wickman</h4>
                                <span>Wed Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-4s">
                            <div class="image">
                                <img src="assets/images/teams/team2.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Walter J. Drake</h4>
                                <span>Wed Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-6s">
                            <div class="image">
                                <img src="assets/images/teams/team3.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Steven J. Voorhees</h4>
                                <span>Wed Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-8s">
                            <div class="image">
                                <img src="assets/images/teams/team4.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Herman C. Kennedy</h4>
                                <span>Wed Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="assets/images/teams/team5.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Nathan A. Browning</h4>
                                <span>Business Consultant</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-4s">
                            <div class="image">
                                <img src="assets/images/teams/team6.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Carmine M. Allen</h4>
                                <span>Senior Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-6s">
                            <div class="image">
                                <img src="assets/images/teams/team7.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Rubin R. Nelligan</h4>
                                <span>Wed Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-member-two wow fadeInUp delay-0-8s">
                            <div class="image">
                                <img src="assets/images/teams/team8.jpg" alt="Team Member">
                                <div class="social-style-two">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="member-description">
                                <h4>Jimmy T. Briley</h4>
                                <span>Programmer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="why-learn-area pb-120 rpb-100">
            <div class="container">
                <div class="row align-items-center large-gap wow fadeInLeft delay-0-2s">
                    <div class="col-lg-6">
                        <div class="why-learn-content rmb-35">
                            <div class="section-title mb-30">
                                <span class="sub-title-two">Why Learn Us</span>
                                <h2>Exclusive Online Course Provide Categories</h2>
                            </div>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue and equal blame belongs</p>
                            <div class="why-learn-feature pt-30">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="feature-three-item">
                                            <div class="icon">
                                                <img src="assets/images/features/icon10.png" alt="Icon">
                                            </div>
                                            <h4>Expert Advisors</h4>
                                            <a href="#" class="read-more color-two">Read more <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="feature-three-item">
                                            <div class="icon">
                                                <img src="assets/images/features/icon11.png" alt="Icon">
                                            </div>
                                            <h4>Popular Courses</h4>
                                            <a href="#" class="read-more color-two">Read more <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why-learn-image wow fadeInRight delay-0-2s">
                            <img src="assets/images/about/why-learn.jpg" alt="Why Learn">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("include/testi.php"); ?>
        <?php include("include/footer.php"); ?>
    </div>    
    
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
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