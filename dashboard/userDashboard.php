<?php

    session_start();
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm ">
        <img id="mLogo" src="../files/designImg/logo.png" alt="logo">
        <div class="navbar-nav mx-auto">
            <ul class="navbar-nav ">
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">
                        <div class="navText">Home</div>
                    </a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">
                        <div class="navText">Catalog</div>
                    </a> </li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="../contest/contestPage.php">
                        <div class="navText" id="contest">Contest</div>
                    </a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">
                        <div class="navText">Problem Set </div>
                    </a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">
                        <div class="navText">Ranking</div>
                    </a></li>
            </ul>
        </div>
        <div class="d-flex bd-highlight mx-4">
            <p class="mx-2 p-2 fw-bold" id="nav-text">Username</p>
            <div class="vr mt-2" id="navVr"></div>
            <p class="mx-2 p-2 fw-bold" id="nav-text"><a href="#" id="signUp">Signup</a></p>
        </div>
        <div class="">
            <i class="fa-solid fa-sun " id="navSun"></i>
        </div>
    </nav>
    <div class="container">
        <div class="container" id="mBody">
            <div class="row ">
                <div class="col">
                    <div>
                        <h1><?php echo $_SESSION['name']; ?></h1>
                    </div>
                    
                    <div id="rating">
                        <span><i class="fa-solid fa-chart-line"></i></span>
                        <span>Rating: <?php echo $_SESSION['rating']; ?></span>
                    </div>

                    <div id="totalContest">
                        Total Contest : <?php echo $_SESSION['contest_count']; ?>
                    </div>
                    <div id="totalProblem">
                        Total Problem Solved : <?php echo $_SESSION['problem_count']; ?>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-envelope"></i></i></span>
                        <span><?php echo $_SESSION['email']; ?></span>
                    </div>
                </div>
                <div class="col">
                    <!--user photo -->
                    <div class="d-flex justify-content-end">
                        <div class="" id="profileFrame">
                            <img id="uImage" src="https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1727481600&semt=ais_hybrid" alt="">
                            <div class="d-flex bd-highlight">
                               <div> <a href="#" class="cngPhoto" id="cngPhoto">
                                    Change Photo
                                </a></div>
                                <div><a href="" class="cngPhoto">
                                    Save Photo
                                </a></div>
                                <input type="file" id="file" style="display: none;">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
        <div class="container" id="mBody">
            <span><i class="fa-solid fa-gear"></i></span>
            <span>Edit your Profile</span>
            <div class="container mt-3" id="details">
                <form action="../../Controller/editInfo/editUserInfo.php" method="POST">
                    <div class="d-flex bd-highlight justify-content-between">
                        <input type="text" name="email" placeholder="Email" id="input" class="form-control mb-3">
                        <button type="submit" name="update_email" id="btn">Apply</button>
                    </div>
                    <div class="d-flex bd-highlight justify-content-between">
                        <input type="text" name="phone" placeholder="Phone" id="input" class="form-control mb-3">
                        <button type="submit" name="update_phone" id="btn">Apply</button>
                    </div>
                    <div class="d-flex bd-highlight justify-content-between">
                        <input type="password" name="password" placeholder="Password" id="input" class="form-control mb-3">
                        <button type="submit" name="update_password" id="btn">Apply</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>