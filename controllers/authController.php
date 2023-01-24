<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

require 'includes/inc_db.php';
require_once 'emailController.php';

$errors = array();
$username = "";
$email = "";
$password = "";

if (isset($_POST['f_register'])) {
    $fullname = mysqli_real_escape_string($mysqli, $_POST['f_fullname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['f_email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['f_phone']);
    $username = mysqli_real_escape_string($mysqli, $_POST['f_username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['f_password']);
    $passwordconf = mysqli_real_escape_string($mysqli, $_POST['f_passwordconf']);

    if (empty($fullname)) {
        $errors['f_fullname'] = "Kérem írja be a teljes nevét!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['f_email'] = "Az E-Mail cím formátuma nem megfelelő!";
    }
    if (empty($email)) {
        $errors['f_email'] = "Kérem írja be az E-Mail címét!";
    }
    if (empty($phone)) {
        $errors['f_phone'] = "Kérem írja be a telefonszámát!";
    }
    if (empty($username)) {
        $errors['f_username'] = "Kérem írja be a felhasználónevét!";
    }
    if (empty($password)) {
        $errors['f_password'] = "Kérem írja be a jelszavát!";
    }
    if ($password !== $passwordconf) {
        $errors['f_password'] = "A jelszavak nem egyeznek!";
    }
    if (strlen($password) < 8 || strlen($passwordconf) < 8 ) {
        $errors['f_password'] = "A jelszó minimum 8 karaktert kell tartalmazzon!";
    }

    $emailQuery = "SELECT * FROM `users` WHERE usersEmail=? LIMIT 1;";
    $stmt = $mysqli->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['f_email'] = "Ez az E-Mail cím már használatban van!";
    }

    $userQuery = "SELECT * FROM `users` WHERE usersName=? LIMIT 1;";
    $stmt = $mysqli->prepare($userQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['f_username'] = "Ez a felhasználónév már használatban van!";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $query = "INSERT INTO `users`(`usersFullName`, `usersName`, `usersPassword`, `usersPhone`, `usersEmail`, `usersVerified`, `usersToken`) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssssbs', $fullname, $username, $password, $phone, $email, $verified, $token);

        if ($stmt->execute()) {
            $userid = $mysqli->insert_id;
            $_SESSION['id'] = $user['usersID'];
            $_SESSION['username'] = $user['usersName'];
            $_SESSION['email'] = $user['usersEmail'];
            $_SESSION['verified'] = $user['usersVerified'];

            sendVerificationEmail($email, $token);

            $_SESSION['message'] = "Sikeres bejelentkezés!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: unverifiedemail.php');
            exit();
        } else {
            $errors['db_error'] = "Adatbázis hiba: Sikertelen regisztráció";
        }
    }
}

if (isset($_POST['f_login'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['f_username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['f_password']);

    if (empty($username)) {
        $errors['f_username'] = "Kérem írja be a felhasználónevét!";
    }
    if (empty($password)) {
        $errors['f_password'] = "Kérem írja be a jelszavát!";
    }

    if (count($errors) === 0) {
        $query = "SELECT * FROM `users` WHERE  usersEmail=? OR usersName=? LIMIT 1";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['usersPassword'])) {
            $userid = $mysqli->insert_id;
            $_SESSION['id'] = $user['usersID'];
            $_SESSION['username'] = $user['usersName'];
            $_SESSION['email'] = $user['usersEmail'];
            $_SESSION['verified'] = $user['usersVerified'];
            $_SESSION['message'] = "Sikeres bejelentkezés!";
            $_SESSION['alert-class'] = "alert-success";
            if ($_SESSION['verified'] == 0) {
                header('location: unverifiedemail.php');
                exit();
            } else if ($_SESSION['verified'] == 1) {
                header('location: index.php');
                exit();
            }
        } else {
            $errors['login_fail'] = "Nem megfelelő adatok!";
        }
    }
}

function verifyUser($token)
{
    global $mysqli;
    $query = "SELECT * FROM `users` WHERE  usersToken='$token' LIMIT 1";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $updatequery = "UPDATE `users` SET usersVerified = 1 WHERE usersToken = '$token'";

        if (mysqli_query($mysqli, $updatequery)) {
            $_SESSION['id'] = $user['usersID'];
            $_SESSION['username'] = $user['usersName'];
            $_SESSION['email'] = $user['usersEmail'];
            $_SESSION['verified'] = 1;
            $_SESSION['message'] = "Sikeres aktiváció!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: unverifiedemail.php');
            exit();
        } else {
            echo 'User not found';
        }
    }
}

if (isset($_POST['f_forgotten_pass'])) {
    $email = $_POST['f_email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['f_email'] = "Az E-Mail cím formátuma nem megfelelő!";
    }
    if (empty($email)) {
        $errors['f_email'] = "Kérem írja be az E-Mail címét!";
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM `users` WHERE `usersEmail` = '$email' LIMIT 1;";
        $result = mysqli_query($mysqli, $query);
        $user = mysqli_fetch_assoc($result);
        $token = $user['usersToken'];
        header('location: password_message.php');
        sendPasswordResetLink($email, $token);
        exit();
    }
}

if (isset($_POST['f_reset-password'])) {
    $password = $_POST['f_password'];
    $passwordconf = $_POST['f_passwordconf'];

    if (empty($password) || empty($passwordconf)) {
        $errors['f_password'] = "Kérem írja be a jelszavát!";
    }
    if ($password !== $passwordconf) {
        $errors['f_password'] = "A jelszavak nem egyeznek!";
    }
    if (strlen($password) < 8 || strlen($passwordconf) < 8 ) {
        $errors['f_password'] = "A jelszó minimum 8 karaktert kell tartalmazzon!";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if (count($errors) == 0) {
        $query = "UPDATE `users` SET `usersPassword` = '$password' WHERE `usersEmail` = '$email';";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            header('location: login.php');
            exit();
        }
    }
}

function resetPassword($token)
{
    global $mysqli;
    $query = "SELECT * FROM `users` WHERE `usersToken` = '$token' LIMIT 1;";
    $result = mysqli_query($mysqli, $query);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['usersEmail'];
    header('location: pass-reset.php');
    exit();
}
if (isset($_POST['f_addpet'])) {
    global $mysqli;
    $pet = $_POST['f_pets'];
    $name = $_POST['f_name'];
    $email = $_SESSION['email'];
    $query = "SELECT `usersID` FROM `users` WHERE `usersEmail` = '$email';";
    $result = mysqli_query($mysqli, $query);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $user['usersID'];
    $id = $_SESSION['id'];

    if (empty($pet)) {
        $errors['f_pets'] = "Kérem válassza ki a kisállat fajtáját!";
        header('location: login.php');
    }
    if (empty($name)) {
        $errors['f_name'] = "Kérem írja be a kisállat nevét!";
        header('location: login.php');
    }
    $query = "INSERT INTO `pets`(`petsType`, `petsName`, `petsOwner`) VALUES ('$pet', '$name', $id);";
    $result = mysqli_query($mysqli, $query);
    echo $query;
    if ($result) {
        header('location: login.php');
        exit();
    }
    /*if (count($errors) == 0) {
        $query = "INSERT INTO `pets`(`petsType`, `petsName`) VALUES (?, ?);";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $pet, $name);
        if ($stmt->execute()) {
            echo $query;
            //$_SESSION['message'] = "Kisállat sikeresen hozzáadva!";
            //$_SESSION['alert-class'] = "alert-success";
            exit();
        }
        else {
            $errors['db_error'] = "Adatbázis hiba: Sikertelen hozzáadás!";
        }*/
}