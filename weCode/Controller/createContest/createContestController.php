<?php
include '../../Model/databaseConnection/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contestName = $_POST['contestName'];
    $contestStartTime = $_POST['contestStartTime'];
    $contestDuration = $_POST['contestDuration'];
    $adminId = $_POST['adminId'];
    $problemTitles = $_POST['problemTitle'];
    $problemDescriptions = $_POST['problemDescription'];
    $inputs = $_POST['input'];
    $outputs = $_POST['output'];

    $contestEndTime = date('Y-m-d H:i:s', strtotime($contestStartTime . " + $contestDuration minutes"));

    $conn = getConnection();

    $sql = "INSERT INTO contests (admin_id, contest_name, start_date, end_date, duration) VALUES ('$adminId', '$contestName', '$contestStartTime', '$contestEndTime', '$contestDuration')";
    if ($conn->query($sql) !== TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
    $contestId = $conn->insert_id;

    foreach ($problemTitles as $index => $title) {
        $problemDir = "../../Model/problemDiscriptionAndInput/$contestId";
        if (!file_exists($problemDir)) {
            mkdir($problemDir, 0777, true);
        }

        $problemId = uniqid();
        $problemPath = "$problemDir/$problemId";
        mkdir($problemPath, 0777, true);

        file_put_contents("$problemPath/description.txt", $problemDescriptions[$index]);
        foreach ($inputs[$index] as $inputIndex => $input) {
            file_put_contents("$problemPath/input$inputIndex.txt", $input);
        }
        foreach ($outputs[$index] as $outputIndex => $output) {
            file_put_contents("$problemPath/output$outputIndex.txt", $output);
        }

        $sql = "INSERT INTO problems (admin_id, contest_id, problem_name, description) VALUES ('$adminId', '$contestId', '$title', '$problemPath/description.txt')";
        if ($conn->query($sql) !== TRUE) {
            die("Error: " . $sql . "<br>" . $conn->error);
        }
    }

    $conn->close();
    header("Location: ../../View/dashboard/adminDashboard.php");
}
?>