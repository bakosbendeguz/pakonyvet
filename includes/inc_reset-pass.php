<?php
require_once 'inc_db.php';
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

    <!-- Basic -->
    <title>Felsőpakonyi Állatorvosi Rendelő | Jelszó változtatás</title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <meta name="description" content="Sulfur - Responsive HTML5 Template">
    <meta name="author" content="Shahriyar Ahmed">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" type="text/css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="asset/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.transitions.css" type="text/css">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="asset/css/animate.css">

    <!-- Lightbox CSS -->
    <link rel="stylesheet" type="text/css" href="asset/css/lightbox.css">

    <!-- Sulfur CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="asset/css/responsive.css">


    <script src="asset/js/modernizrr.js"></script>




</head>

<body>

    <header class="clearfix">

        <!-- Start Top Bar -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-bar">
                        <div class="row">

                            <div class="col-md-10">
                                <!-- Start Contact Info -->
                                <ul class="contact-details">
                                    <li><a href="#"><i class="fa fa-phone"></i> +29 317 224</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i> felsopakonyiallatorvosirendelo@gmail.com</a>
                                    </li>
                                    <li><a href="https://www.facebook.com/pakonyvet/" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a>
                                    </li>
                                </ul>
                                <!-- End Contact Info -->
                            </div><!-- .col-md-6 -->

                            <div class="col-md-2">
                                <!-- Start Social Links -->
                                <ul class="contact-details">
                                    <li>
                                        <a href="login.php">Bejelentkezés</a>
                                    </li>
                                </ul>
                                <!-- End Social Links -->
                            </div><!-- .col-md-6 -->
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .row -->
        </div><!-- .container -->
        <!-- End Top Bar -->

        <!-- Start  Logo & Naviagtion  -->
        <div class="navbar navbar-default navbar-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Stat Toggle Nav Link For Mobiles -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- End Toggle Nav Link For Mobiles -->
                    <img src="asset/images/logo/logo.bmp" class="navbar-brand" href="index.html"></img>
                </div>
                <div class="navbar-collapse collapse">

                    <!-- Start Navigation List -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="active" href="index.html">Főoldal</a>
                        </li>
                        <li>
                            <a href="about.html">Rendelőnkről</a>
                        </li>
                        <li>
                            <a href="blog-item.html">Munkatársaink</a>
                        </li>
                        <li>
                            <a href="service.html">Szolgáltatásaink</a>
                        </li>
                        <li>
                            <a href="portfolio.html">Időpontfoglalás</a>
                        </li>
                        <li><a href="contact.html">Eérhetőségeink</a>
                        </li>
                    </ul>
                    <!-- End Navigation List -->
                </div>
            </div>
        </div>
        <!-- End Header Logo & Naviagtion -->

    </header>


    <!-- Start Header Section -->
    <div class="page-header">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Jelszó megváltoztatása</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->








    <!-- Start Contact Us Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div>
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Jelszó megváltoztatása</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                <?php
                  if($_GET['key'] && $_GET['token'])
                  {
                  $email = $_GET['key'];
                  $token = $_GET['token'];
                  $query = mysqli_query($conn,
                  "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
                  );
                  $curDate = date("Y-m-d H:i:s");
                  if (mysqli_num_rows($query) > 0) {
                  $row= mysqli_fetch_array($query);
                  if($row['exp_date'] >= $curDate){ ?>
                    <form action="includes/inc_pass-reset.php" method="POST">
                        <div class="row">
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email *" name="f_email" id="f_email" required data-validation-required-message="Írd be az E-Mail címedet!">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <input type="submit" name="f_submit_email" id="f_submit_email" class="btn btn-primary" value="Jelszó megváltoztatása">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <div class="google-map">
        <div id="map" data-position-latitude="48.858370" data-position-longitude="2.294481"></div>
    </div>



    <!-- Start Footer Section -->
    <section id="footer-section" class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>Office Address</span>
                        </h3>
                    </div>

                    <div class="footer-address">
                        <ul>
                            <li class="footer-contact"><i class="fa fa-home"></i>123, Second Street name, Address</li>
                            <li class="footer-contact"><i class="fa fa-envelope"></i><a href="#">info@domain.com</a></li>
                            <li class="footer-contact"><i class="fa fa-phone"></i>+1 (123) 456-7890</li>
                            <li class="footer-contact"><i class="fa fa-globe"></i><a href="#" target="_blank">www.domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <!--/.col-md-3 -->


                <div class="col-md-3">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>Latest Tweet</span>
                        </h3>
                    </div>

                    <div class="latest-tweet">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-twitter fa-2x media-object"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">About 15 days ago</h4>
                                <p>Finally #tutsplus start a tutorial on A Beginner’s Guide to Using #joomla . Check it out here http://t.co/i6S4zeW8Z0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.col-md-3 -->

                <div class="col-md-3">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>Stay With us</span>
                        </h3>
                    </div>
                    <div class="subscription">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your E-mail" id="name" required data-validation-required-message="Please enter your name.">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>FLICKR STREAM</span>
                        </h3>
                    </div>

                    <div class="flickr-widget">
                        <ul class="flickr-list">
                            <li>
                                <a href="asset/images/portfolio/img1.jpg" data-lightbox="picture-1">
                                    <img src="asset/images/portfolio/img1.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img2.jpg" data-lightbox="picture-2">
                                    <img src="asset/images/portfolio/img2.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img3.jpg" data-lightbox="picture-3">
                                    <img src="asset/images/portfolio/img3.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img4.jpg" data-lightbox="picture-4">
                                    <img src="asset/images/portfolio/img4.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img5.jpg" data-lightbox="picture-5">
                                    <img src="asset/images/portfolio/img5.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img6.jpg" data-lightbox="picture-6">
                                    <img src="asset/images/portfolio/img6.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img1.jpg" data-lightbox="picture-7">
                                    <img src="asset/images/portfolio/img1.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                            <li>
                                <a href="asset/images/portfolio/img2.jpg" data-lightbox="picture-8">
                                    <img src="asset/images/portfolio/img2.jpg" alt="" class="img-responsive">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/.col-md-3 -->
            </div>
            <!--/.row -->
        </div><!-- /.container -->
    </section>
    <!-- End Footer Section -->


    <!-- Start Copyright Section -->
    <div id="copyright-section" class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="copyright">
                        Copyright © 2014. All Rights Reserved.Design and Developed by <a href="http://www.themefisher.com">Themefisher</a>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="copyright-menu pull-right">
                        <ul>
                            <li><a href="#" class="active">Home</a></li>
                            <li><a href="#">Sample Site</a></li>
                            <li><a href="#">getbootstrap.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </div><!-- /.container -->
    </div>
    <!-- End Copyright Section -->



    <!-- Sulfur JS File -->
    <script src="asset/js/jquery-2.1.3.min.js"></script>
    <script src="asset/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/jquery.appear.js"></script>
    <script src="asset/js/jquery.fitvids.js"></script>
    <script src="asset/js/jquery.nicescroll.min.js"></script>
    <script src="asset/js/lightbox.min.js"></script>
    <script src="asset/js/count-to.js"></script>
    <script src="asset/js/styleswitcher.js"></script>
    <!-- Google Map -->
    <script src="asset/js/map.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script src="asset/js/script.js"></script>


</body>

</html>