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
    <title>CONTACT US | LEARN WELL</title>
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
                    <h2 class="page-title wow fadeInUp delay-0-2s text-dark">Contact Us</h2>
                </div>
            </div>
            <img class="circle-one" src="assets/images/shapes/circle-one.png" alt="Circle">
            <img class="circle-two" src="assets/images/shapes/circle-two.png" alt="Circle">
        </section>
        <section class="contact-info-area rel z-1 py-130 rpt-90 rpb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="contact-info-wrap rmb-75 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-25">
                                <span class="sub-title-two">Need Any Helps ?</span>
                                <h2>Contact For Information</h2>
                            </div>
                            <div class  ="row no-gap mt-50">
                                <div class="col-md-4 col-sm-6">
                                    <div class="contact-info-box">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h4>Locations</h4>
                                        <span>55 Main Street, 2nd Block, Kerala</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="contact-info-box">
                                        <i class="far fa-envelope"></i>
                                        <h4>Email Us</h4>
                                        <span>
                                            <a href="#">info@learnwell.com</a><br>
                                            <a href="#">info@learnwell.com</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="contact-info-box">
                                        <i class="fas fa-phone-volume"></i>
                                        <h4>Hotlines</h4>
                                        <span>
                                            <a href="callto:+896(321)4600">+896 (321) 46 00</a><br>
                                            <a href="callto:+012(345)678">+012 (345) 678</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-page-image wow fadeInUp delay-0-4s">
                            <img src="assets/images/contact/contact-page.png" alt="Contact Page">
                        </div>
                    </div>
                </div>
            </div>
            <span class="bg-text">coach</span>
        </section>
        <!-- Contact Info End -->
        
       
        <!-- Contact Form Start -->
        <section class="contact-form-area wow fadeInUp delay-0-2s">
            <div class="container">
                <form id="contact-form" class="contact-form p-50 z-1 rel" name="contact-form" action="#" method="post">
                   <div class="section-title text-center mb-50">
                       <span class="sub-title-two">Send Us Message</span>
                       <h2>Have Any Questions! Say Hello</h2>
                   </div>
                    <div class="row mt-25">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="full-name" name="full-name" class="form-control" value="" placeholder="Full Name" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" id="email-address" name="email" class="form-control" value="" placeholder="Email Address" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write Message" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="theme-btn">send Message <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Contact Form End -->
        
       
        <!-- Location Map Area Start -->
        <div class="contact-page-map">
            <div class="our-location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.42235459804!2d76.42440681532527!3d10.778928362093698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7d92a2b80911f%3A0x1d1cfbcdba4de166!2sEwolwe!5e0!3m2!1sen!2sin!4v1653585902495!5m2!1sen!2sin" height="975" style="border:0; width: 100%;"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>    
    
    <?php include("include/footer.php"); ?>
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