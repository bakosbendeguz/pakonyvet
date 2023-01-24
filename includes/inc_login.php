<?php

session_start();

if (isset($_POST['f_login'])) {
    require_once 'inc_db.php';
    $username = mysqli_real_escape_string($mysqli, $_POST['f_username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['f_password']);

    if (
        empty($username) ||
        empty($password)
    ) {
        header("Location: ../login.php?error=EmptyFields");
        exit;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM `users` WHERE usersName = '$username' && usersPassword = '$password';";
        if (mysqli_num_rows(mysqli_query($mysqli, $query)) == 1) {
            $_SESSION['f_username'] = $username;
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../login.php?error=LoginFailed");
            exit;
        }
    }
}