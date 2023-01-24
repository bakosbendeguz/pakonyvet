<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Kisállat hozzáadása';
session_start();
include_once 'header.php';
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<body>
    <?php
    if (empty($_SESSION['f_username']) || !isset($_SESSION['f_username'])) {
        echo '<!-- Start Header Section -->
    <div class="page-header">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Időpontfoglalás</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->

        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <p>A kisállat hozzáadáshoz kérem <a href="login.php">jelentkezzen be!</a></p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Start Portfolio items -->

                    

                    <!-- End Portfolio items -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->';
    } else {
        echo '<!-- Start Header Section -->
    <div class="page-header">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Időpontfoglalás</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->

    <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <p>Az időpontfoglaláshoz kérem <a href="addpet.php">adjon hozzá kisállatot!</a></p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Start Portfolio items -->

                    <!-- End Portfolio items -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->';
    }
    include_once 'footer.php';
    ?>
</body>

</html>