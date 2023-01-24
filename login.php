<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Bejelentkezés';
require_once 'controllers/authController.php';
include_once 'header.php';
?>

<body>

    <header class="clearfix">
        <!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Bejelentkezés</h1>
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
                            <h2>Bejelentkezés</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <form method="POST" action="login.php">
                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="2s" data-wow-delay="600ms">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Felhasználónév *" name="f_username" id="f_username">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Jelszó *" name="f_password" id="f_password">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                    <div id="success"></div>
                                    <p>Nincs még fiókod? <a href="register.php">Regisztrálj</a> egyet!</p>
                                    <p>Elfelejtetted a jelszavadat? <a href="forgotten-pass.php">Változtasd meg!</a></p>
                                    <input type="submit" name="f_login" id="f_login" class="btn btn-primary" value="Bejelentkezés">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <?php include_once 'footer.php' ?>

</body>

</html>