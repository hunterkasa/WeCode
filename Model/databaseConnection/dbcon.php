<?php 

    function getConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "codecafe";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function register($user_name, $email, $phone, $dob, $password) {
        $conn = getConnection();
        $sql = "INSERT INTO users (user_name, email, phone, dob, password) VALUES ('$user_name', '$email', '$phone', '$dob', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function login($id, $password) {
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE id='$id' AND password='$password'";
        $result = $conn->query($sql);
        return $result;
    }

?>