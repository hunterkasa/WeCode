<?php
    session_start();

    if (isset($_SESSION['user_name'])) {
        header('location: home.php');
    }
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="registration.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>

    <header class="header">
        <a href="" class="logo" id="logo">
            <img src="WebTech/BRANDd-1-01.png" alt="logo" height="53px" width="194px">
        </a>
        <nav class="navbar" id="navbar1">
            <a href="/code-cafe-/home.php">home</a>
            <a href="#catalog">catalog</a>
            <a href="#contests">contests</a>
            <a href="#problem">problem set</a>
            <a href="#ranking">ranking</a>
            <a href="login.php">Login</a>
            <a href="#register"> register</a>

            <a href="" class="logo" id="logo2">
                <img src="WebTech/day-and-night.png" height="33px" width="35px">
            </a>

            <a href="#english" id="eng">EN</a>
        </nav>

    </header>


    <div class="login-box">
        <h2>Register</h2>
        <form action="../../Controller/register/regController.php" method="POST">

            <input type="text" name="user_name" placeholder="Username" required>
            <input type="tel" name="phone" placeholder="Phone" required>

            <input type="date" name="dob" placeholder="Date of Birth" required>
            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_password" placeholder="Confirm Password" required>
            <div class="options">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#" id="forgot-pass">Forgot Password?</a>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="separator"><span>OR</span></div>
        <p>or you can sign in with</p>
        <div class="social-icons">
            <a href="#" class="google">
                <img src="WebTech/google.png" height="45px">
            </a>
            <a href="#" class="github">
                <img src="WebTech/github.png" height="45px">
            </a>
            <a href="#" class="linkedin">
                <img src="WebTech/linkedin.png" height="45px">
            </a>
            <a href="#" class="facebook">
                <img src="WebTech/facebook.png" height="45px">
            </a>
        </div>
        <div class="sign-up">
            Already have an account? <a href="registration.php">Log In</a>
        </div>
    </div>
    







    </div>
    </div>
</body>

</html>