<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Főoldal';
include_once 'header.php';
?>

<body>

    <?php
    if (empty($_SESSION['username']) || !isset($_SESSION['username'])) {
        echo '<header class="clearfix">
    <!-- Start Header Section -->
    <div class="banner">
        <div class="overlay">
            <div class="container">
                <div class="intro-text">
                    <h1>Felsőpakonyi <span>Állatorvosi Rendelő</span></h1>
                    <p>Rendelőnk 2002 óta <br> várja pácienseit Felsőpakonyon</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->';
    } else {
        echo '<header class="clearfix">
        <!-- Start Header Section -->
        <div class="banner">
            <div class="overlay">
                <div class="container">
                    <div class="intro-text">
                        <h1>Felsőpakonyi <span>Állatorvosi Rendelő</span></h1>
                        <p>Rendelőnk 2002 óta <br> várja pácienseit Felsőpakonyon</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->';
    }

    include_once 'footer.php';

    ?>

</body>

</html>