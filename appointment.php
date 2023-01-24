<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Időpontfoglalás';
session_start();
include_once 'header.php';
?>

<body>
    <?php
    if (empty($_SESSION['username']) || !isset($_SESSION['username'])) {
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
                    <p>Az időpontfoglaláshoz kérem <a href="login.php">jelentkezzen be!</a></p>
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

                    Ez a funkció még kidolgozás alatt áll!

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
    
                        Ez a funkció még kidolgozás alatt áll!
    
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