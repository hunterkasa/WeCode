<?php
session_start();
include '../../Model/databaseConnection/registerContestModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_contest'])) {
    $user_id = $_SESSION['id'];
    $contest_id = isset($_POST['contest_id']) ? $_POST['contest_id'] : null;
    if ($contest_id !== null) {
        try {
            registerUserForContest($user_id, $contest_id);
            header('Location: ../../View/contest/contestPage.php');
            exit();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>