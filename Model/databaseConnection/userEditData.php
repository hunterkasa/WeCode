<?php
include 'dbcon.php';

function updateUserName($user_id, $user_name) {
    $conn = getConnection();
    $sql = "UPDATE users SET user_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $user_name, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updateUserEmail($user_id, $email) {
    $conn = getConnection();
    $sql = "UPDATE users SET email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $email, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updateUserPhone($user_id, $phone) {
    $conn = getConnection();
    $sql = "UPDATE users SET phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $phone, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updateUserPassword($user_id, $password) {
    $conn = getConnection();
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $password, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>