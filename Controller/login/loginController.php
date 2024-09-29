<?php
session_start();
include '../../Model/databaseConnection/dbcon.php';
$conn = getConnection();

function validateInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = validateInput($_POST['id']);
    $password = validateInput($_POST['password']);

    if (empty($id) || empty($password)) {
        $_SESSION['error'] = "ID and Password are required.";
        header("Location: ../../View/login/login.php");
        exit();
    }

    $res = login($id, $password);
    if ($res->num_rows > 0) {
        $res = $res->fetch_assoc();
        $_SESSION['name'] = $res['user_name'];

        if ( $res['id'] == 1) {
            // contests
            $contestQuery = "SELECT COUNT(*) as contest_count FROM contests WHERE admin_id = 1";
            $contestResult = $conn->query($contestQuery);
            $contestCount = $contestResult->fetch_assoc()['contest_count'];
            $_SESSION['contest_count'] = $contestCount;

            // problems
            $problemQuery = "SELECT COUNT(*) as problem_count FROM problems WHERE admin_id = 1";
            $problemResult = $conn->query($problemQuery);
            $problemCount = $problemResult->fetch_assoc()['problem_count'];
            $_SESSION['problem_count'] = $problemCount;
            header("Location: ../../View/dashboard/adminDashboard.php");
        } else {
            $_SESSION['id'] = $res['id'];
            $_SESSION['name'] = $res['user_name'];
            $_SESSION['rating'] = $res['rating'];
            $_SESSION['email'] = $res['email'];

            // Total contests participated
            $contestQuery = "SELECT COUNT(*) as contest_count FROM registrations WHERE user_id = " . $res['id'];
            $contestResult = $conn->query($contestQuery);
            $contestCount = $contestResult->fetch_assoc()['contest_count'];
            $_SESSION['contest_count'] = $contestCount;

            // Total problems solved
            $problemQuery = "SELECT COUNT(*) as problem_count FROM submissions WHERE user_id = " . $res['id'] . " AND status = 'solved'";
            $problemResult = $conn->query($problemQuery);
            $problemCount = $problemResult->fetch_assoc()['problem_count'];
            $_SESSION['problem_count'] = $problemCount;

            
            header("Location: ../../View/dashboard/userDashboard.php");
        }
    } else {
        $_SESSION['error'] = "Invalid user ID or password.";
        header("Location: ../../View/login/login.php");
    }



} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: ../../View/login/login.php");
}
?>