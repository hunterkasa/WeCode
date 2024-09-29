<?php
include 'dbcon.php';

function contestExists($contest_id) {
    $conn = getConnection();
    $sql = "SELECT id FROM contests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $contest_id);
    $stmt->execute();
    $stmt->store_result();
    $exists = $stmt->num_rows > 0;
    $stmt->close();
    $conn->close();
    return $exists;
}

function registerUserForContest($user_id, $contest_id) {
    if (!contestExists($contest_id)) {
        throw new Exception("Contest ID does not exist.");
    }
    $conn = getConnection();
    $sql = "INSERT INTO registrations (user_id, contest_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $contest_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>