<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Elfelejtett jelszó';
require_once 'controllers/authController.php';
include_once 'header.php';
?>

<body>

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
            <?php if (count($errors) > 0) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div>
                    <form action="forgotten-pass.php" method="POST">
                        <div class="row">
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" name="f_email" id="f_email" required data-validation-required-message="Írd be az E-Mail címedet!">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <input type="submit" name="f_forgotten_pass" id="f_forgotten_pass" class="btn btn-primary" value="Jelszó megváltoztatása">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>