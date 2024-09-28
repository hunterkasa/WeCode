<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="aDashboard.css">
    <script src="aDashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addProblemBtn').addEventListener('click', function(e) {
                e.preventDefault();
                var problemTemplate = document.getElementById('problemTemplate');
                var newProblem = problemTemplate.cloneNode(true);
                newProblem.style.display = 'block';
                newProblem.removeAttribute('id');
                document.getElementById('problemsContainer').appendChild(newProblem);
            });

            document.getElementById('problemsContainer').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('addInputBtn')) {
                    e.preventDefault();
                    var inputTemplate = e.target.closest('.problem').querySelector('.inputTemplate');
                    var newInput = inputTemplate.cloneNode(true);
                    newInput.style.display = 'block';
                    newInput.removeAttribute('class');
                    e.target.closest('.problem').querySelector('.inputsContainer').appendChild(newInput);
                }
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-sm ">
        <img id="mLogo" src="../files/designImg/logo.png" alt="logo">
        <div class="navbar-nav mx-auto">
            <ul class="navbar-nav ">
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">Home</a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">Catalog</a> </li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">Contest </a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">Problem Set </a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link " id="nav-text" href="#">Ranking </a></li>
            </ul>
        </div>
        <div class="d-flex bd-highlight mx-4">
            <p class="mx-2 p-2 fw-bold" id="nav-text">
                <?php
                if (isset($_SESSION['name'])) {
                    echo htmlspecialchars($_SESSION['name']);
                } else {
                    echo 'Username';
                }
                ?>
            </p>
            <div class="vr mt-2" id="navVr"></div>
            <p class="mx-2 p-2 fw-bold" id="nav-text">
                <?php
                if (isset($_SESSION['name'])) {
                    echo '<a href="../login/login.php" id="logout">Logout</a>';
                } else {
                    echo '<a href="../register/register.php" id="signUp">Signup</a>';
                }
                ?>
            </p>
        </div>
        <div class="">
            <i class="fa-solid fa-sun " id="navSun"></i>
        </div>
    </nav>
    <div class="container-fluid " id="mBody">
        <div class="row ">
            <div class="col">
                <div>
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo "<h1>Welcome " . $_SESSION['name'] . "</h1>";
                    }
                    ?>
                </div>
                <div id="totalContest">
                    <?php
                    if (isset($_SESSION['contest_count'])) {
                        echo "Contest created: " . $_SESSION['contest_count'];
                    } else {
                        echo "Contest created: " . '0';
                    }
                    ?>
                </div>
                <div id="totalProblem">
                    <?php
                    if (isset($_SESSION['problem_count'])) {
                        echo "Problems created: " . $_SESSION['problem_count'];
                    } else {
                        echo "Problems created: " . '0';
                    }
                    ?>

                </div>
                <div>
                    <span><i class="fa-solid fa-envelope"></i></i></span>
                    <span>xyz@gmail.com</span>
                </div>
            </div>
            <div class="col">
                <!--user photo -->
                <div class="container" id="profileFrame">
                    <img src="https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1727481600&semt=ais_hybrid" alt="">
                    <a href="#">
                        Change Photo
                    </a>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid " id="mBody">
        <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseExample">Create a new contest</a>
        <div class="collapse" id="collapseExample">
            <div class="container" id="addContest">
                <form id="contestForm" method="POST" action="../../Controller/createContest/createContestController.php">
                    <h3>Create your own contest</h3>
                    <input name="contestName" type="text" class="form-control mt-2" placeholder="Contest Name" required>
                    <input name="contestStartTime" type="datetime-local" class="form-control mt-2" placeholder="Contest Start Time" required>
                    <input name="contestDuration" type="number" class="form-control mt-2" placeholder="Contest Duration (minutes)" required>
                    <input name="adminId" type="hidden" value="1"> <!-- Assuming admin ID is 1 for now -->

                    <!-- Problem fields -->
                    <div id="problemsContainer">
                        <div class="problem">
                            <input name="problemTitle[]" class="form-control mt-2" type="text" placeholder="Problem Title" required>
                            <textarea name="problemDescription[]" class="form-control mt-2" cols="30" rows="5" placeholder="Problem Description" required></textarea>
                            <textarea name="input[][]" class="form-control mt-2" cols="30" rows="5" placeholder="Input" required></textarea>
                            <textarea name="output[][]" class="form-control mt-2" cols="30" rows="5" placeholder="Output" required></textarea>
                        </div>
                    </div>
                    <button type="button" id="addProblemBtn" class="btn btn-secondary mt-2">Add Problem</button>
                    <button type="submit" class="btn btn-primary mt-2">Add Contest</button>
                </form>

                <script>
                    document.getElementById('addProblemBtn').addEventListener('click', function() {
                        var problemTemplate = document.querySelector('.problem').cloneNode(true);
                        problemTemplate.querySelectorAll('input, textarea').forEach(function(input) {
                            input.value = '';
                        });
                        document.getElementById('problemsContainer').appendChild(problemTemplate);
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>