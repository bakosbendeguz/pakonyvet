<?php
$title = 'Felsőpakonyi Állatorvosi Rendelő | Email értesítő';
require_once 'controllers/authController.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

    <!-- Basic -->
    <title>Felsőpakonyi Állatorvosi Rendelő | Főoldal</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                    <?php echo $_SESSION['message']; ?>
                </div>

                <h3>Üdvözlünk, <?php echo $_SESSION['username']; ?></h3>
                <br>
                <?php if (!$_SESSION['verified']) : ?>
                    <div class="alert alert-warning">
                        Aktiválja fiókját a
                        <strong><?php echo $_SESSION['email']; ?></strong>
                        E-Mail címre küldött linken keresztül!
                        <br>
                        <br>
                        <form method="POST" action="includes/inc_logout.php">
                            <input type="submit" name="f_logout" id="f_logout" class="btn btn-primary" value="Kijelentkezés">
                        </form>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION['verified']) : ?>
                    <strong>Sikeresen aktiválta fiókját!</strong>
                    <br>
                    <br>
                    <form method="POST" action="index.php">
                        <input type="submit" name="f_index" id="f_index" class="btn btn-primary" value="Főoldal">
                        <input type="hidden" name="f_username" value="<?php echo $username; ?>">
                        <input type="hidden" name="f_password" value="<?php echo $password; ?>">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>