<?php 

    session_start();

    include '../../Model/databaseConnection/db.php';

    $conn = getConnection();

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    if (empty($_POST['user_name'])) {
        $_SESSION['error'] = "username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $_POST['user_name'])) {
        $_SESSION['error'] = "username must be between 3 and 20 characters and can only contain letters, numbers, and underscores.";
    } 
    
    ////////////////////// email
    elseif (empty($_POST['email'])) {
        $_SESSION['error'] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
    }

    ////////////////////// phoneNumber
    elseif (empty($_POST['phone'])) {
        $_SESSION['error'] = "Phone number is required.";
    } 
 
    elseif (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNumber)) {
        $_SESSION['error'] = "Invalid phone number. It must contain only numbers and can optionally start with '+'.";
    } 


    elseif (empty($_POST['dob'])) {
        $_SESSION['error'] = "Date of birth is required.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['dob'])) {
        $_SESSION['error'] = "Invalid date format. Please use YYYY-MM-DD.";
    }

 
    elseif (empty($_POST['password'])) {
        $_SESSION['error'] = "Password is required.";
    } elseif (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 32) {
        $_SESSION['error'] = "Password must be between 8 and 32 characters.";
    } elseif (!preg_match("/[A-Z]/", $_POST['password'])) {
        $_SESSION['error'] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match("/[a-z]/", $_POST['password'])) {
        $_SESSION['error'] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match("/[0-9]/", $_POST['password'])) {
        $_SESSION['error'] = "Password must contain at least one number.";
    } elseif (!preg_match("/[\W]/", $_POST['password'])) {
        $_SESSION['error'] = "Password must contain at least one special character.";
    }



    elseif (empty($_POST['confirmPassword'])) {
        $_SESSION['error'] = "Password confirmation is required.";
    } elseif ($_POST['confirmPassword'] !== $_POST['password']) {
        $_SESSION['error'] = "Passwords do not match.";
    }
    

    elseif ( $conn->connect_error ) {
        $_SESSION['error'] = "Something went wrong try again!";
    }
    $isok = register( $user_name, $email, $phone, $dob, $password );
    $conn->close();

    header("location: ../../View/login.php");
    
?>