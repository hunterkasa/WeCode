<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
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
            <a href="#login">Login</a>
            
            <a href="registration.php"> register</a>
            
            <a href="" class="logo" id="logo2">
                <img src="WebTech/day-and-night.png"height="33px" width="35px">
            </a>
        
            <a href="#english"id="eng">EN</a>
        </nav>
    </header>

    <div class="login-box">
        <h2>Login</h2>
        <form action="../../Controller/login/loginController.php" method="POST">
            
            <input type="text" id="id" name="id" placeholder="Id">
            <input type="password" id="password" name="password" placeholder="Password">
            <div class="options">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#"id="forgot-pass">Forgot Password?</a>
            </div>
            <button type="submit" name="buttonlogin">Login</button>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='error'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
            ?>
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
                Don't have an account? <a href="registration.php">Sign Up</a>
            </div>
    </div>
    <?php session_unset(); ?>
</body>
</html>