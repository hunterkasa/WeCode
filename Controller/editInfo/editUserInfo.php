<?php
include '../../Model/databaseConnection/userEditData.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['id']; // Replace with actual user ID from session or other source

    if (isset($_POST['update_user_name'])) {
        $user_name = $_POST['user_name'];
        updateUserName($user_id, $user_name);
    } 
    if (isset($_POST['update_email'])) {
        $email = $_POST['email'];
        updateUserEmail($user_id, $email);
    } 
    if (isset($_POST['update_phone'])) {
        $phone = $_POST['phone'];
        updateUserPhone($user_id, $phone);
    } 
    if (isset($_POST['update_password'])) {
        $password = $_POST['password'];
        updateUserPassword($user_id, $password);
    }

    header('Location: ../../View/dashboard/userDashboard.php');
    exit();
}
?>