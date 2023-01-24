<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Jelszó megváltoztatása';
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
            <div class="row">
                <div>
                    <?php if (count($errors) > 0) : ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form action="pass-reset.php" method="POST">
                        <div class="row">
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Új jelszó *" name="f_password" id="f_password">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Új jelszó konfirmálása *" name="f_passwordconf" id="f_passwordconf">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                            <div id="success"></div>
                            <input type="submit" name="f_reset-password" id="f_reset-password" class="btn btn-primary" value="Jelszó megváltoztatása">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>