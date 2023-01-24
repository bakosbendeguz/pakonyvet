<?php
ob_start();
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="hu">

<head>

    <!-- Basic -->
    <title><?php echo $title ?></title>

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
    <?php
    if (!empty($_SESSION['username']) && isset($_SESSION['username']) && $_SESSION['verified'] == 0 && !isset($_POST['f_logout'])) {
        header('location: unverifiedemail.php');
        if (isset($_POST['f_logout'])) {
            header('location: includes/inc_logout.php');
            exit();
        }
        exit();
    }
    else if (empty($_SESSION['username']) || !isset($_SESSION['username']) && !isset($_SESSION['verified'])) {
        echo '<header class="clearfix">

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
                    <img src="asset/images/logo/logo.bmp" class="navbar-brand" href="index.php"></img>
                </div>
                <div class="navbar-collapse collapse">

                    <!-- Start Navigation List -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="active" href="index.php">Főoldal</a>
                        </li>
                        <li>
                            <a href="about.php">Rendelőnkről</a>
                        </li>
                        <li>
                            <a href="coworkers.php">Munkatársaink</a>
                        </li>
                        <li>
                            <a href="service.php">Szolgáltatásaink</a>
                        </li>
                        <li>
                            <a href="appointment.php">Időpontfoglalás</a>
                        </li>
                        <li><a href="contact.php">Elérhetőségeink</a>
                        </li>
                    </ul>
                    <!-- End Navigation List -->
                </div>
            </div>
        </div>
        <!-- End Header Logo & Naviagtion -->

    </header>';
    } else if (!empty($_SESSION['username']) || isset($_SESSION['username'])) {
        echo '<header class="clearfix">

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
                                    <a href="includes/inc_logout.php">Kijelentkezés</a>
                                </li>
                            </ul>
                            <!-- End Social Links -->
                        </div><!-- .col-md-6 -->
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
                    <img src="asset/images/logo/logo.bmp" class="navbar-brand" href="index.php"></img>
                </div>
                <div class="navbar-collapse collapse">

                    <!-- Start Navigation List -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="active" href="index.php">Főoldal</a>
                        </li>
                        <li>
                            <a href="about.php">Rendelőnkről</a>
                        </li>
                        <li>
                            <a href="coworkers.php">Munkatársaink</a>
                        </li>
                        <li>
                            <a href="service.php">Szolgáltatásaink</a>
                        </li>
                        <li>
                            <a href="appointment.php">Időpontfoglalás</a>
                        </li>
                        <li><a href="contact.php">Elérhetőségeink</a>
                        </li>
                    </ul>
                    <!-- End Navigation List -->
                </div>
            </div>
        </div>
        <!-- End Header Logo & Naviagtion -->

    </header>';
    }
    ?>