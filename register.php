<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Regisztráció';
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
                        <h1>Regisztráció</h1>
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
                        <h2>Regisztráció</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>    
                    </div>
                    <?php endif; ?>
                    <form action="register.php" method="POST">
                        <div class="row">
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Teljes név *" id="f_fullname" name="f_fullname">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-Mail cím *" id="f_email" name="f_email" value="<?php echo $email; ?>">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefonszám (+36301234567) *" pattern="+[0-99]{1}[0-99]{1}[0-9]{7}" id="f_phone" name="f_phone">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Felhasználónév *" id="f_username" name="f_username" value="<?php echo $username; ?>">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Jelszó *" id="f_password" name="f_password">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Jelszó megerősítése *" id="f_passwordconf" name="f_passwordconf">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <p>Van már fiókod? <a href="login.php">Lépj be!</a></p>
                                <input type="submit" class="btn btn-primary" id="f_register" name="f_register" value="Regisztráció">
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
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>