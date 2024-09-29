<?php
session_start();
include '../../Controller/contest/contestPageController.php';
$userId = $_SESSION['id'];
$contests = returnContests($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cPage.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <img id="mLogo" src="../src/BRANaaaaDd-1-01.png" alt="logo">
        <div class="navbar-nav mx-auto">
            <ul class="navbar-nav">
                <li class="nav-item px-3 fw-bold"><a class="nav-link" id="nav-text" href="#">Home</a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link" id="nav-text" href="#">Catalog</a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link" id="nav-text" href="#">Contest</a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link" id="nav-text" href="#">Problem Set</a></li>
                <li class="nav-item px-3 fw-bold"><a class="nav-link" id="nav-text" href="#">Ranking</a></li>
            </ul>
        </div>
        <div class="d-flex bd-highlight mx-4">
            <?php if (isset($_SESSION['name'])): ?>
                <p class="mx-2 p-2 fw-bold" id="nav-text">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <form action="../logout.php" method="post" class="mx-2 p-2">
                    <button type="submit" class="btn btn-link" id="logout-button">Logout</button>
                </form>
            <?php else: ?>
                <p class="mx-2 p-2 fw-bold" id="nav-text">Login</p>
                <div class="vr mt-2" id="navVr"></div>
                <p class="mx-2 p-2 fw-bold" id="nav-text"><a href="#" id="signUp">Signup</a></p>
            <?php endif; ?>
        </div>
        <div class="">
            <i class="fa-solid fa-sun" id="navSun"></i>
        </div>
    </nav>
    <div class="container" id="contestTitle">
        <div class="text-center">
            <h4>Contest</h4>
            <p>Join code from around the globe to tackle challenging problems and showcase<br>your skills in our programming contests!</p>
        </div>
    </div>

    <div class="text-center mt-3">
        <h3>UPCOMING CONTEST</h3>
    </div>
    <div class="d-flex bd-highlight text-center justify-content-center">
        <!-- Contest Cards -->
        <?php foreach ($contests['future'] as $contest): ?>
            <div class="container" id="carD">
                <div class="image">
                    <img id="carD-image" src="../src/1.jpg" alt="contest">
                </div>
                <div class="carD-body fw-bold text-center">
                    <?php echo htmlspecialchars($contest['contest_name']); ?> <br>
                    Time Left: <?php echo gmdate("H:i:s", $contest['time_left']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <form action="../../Controller/contest/registerContestController.php" method="POST">
        <div class="container">
            <div class="container">
                <h2>Upcoming Contests</h2>
                <div class="row">
                    <?php foreach ($contests['future'] as $contest): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <input type="hidden" name="contest_id" value="<?php echo $contest['id']; ?>">
                                    <h5 class="card-title">Contest ID: <?php echo htmlspecialchars($contest['id']); ?></h5>
                                    <p class="card-text">Starting Date: <?php echo htmlspecialchars($contest['start_date']); ?></p>
                                    <p class="card-text">Problems: <?php echo htmlspecialchars($contest['problems']); ?></p>
                                    <p class="card-text">Participants: <?php echo htmlspecialchars($contest['participants']); ?></p>
                                    <p>
                                        <?php if ($contest['is_registered']): ?>
                                            <button class="btn btn-enter">Enter Contest</button>
                                        <?php else: ?>
                                            <button type="submit" name="register_contest" class="btn btn-register">Register</button>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </form>



    <div class="container">
        <h2>Current Contests</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Contest ID</th>
                    <th>Starting Date</th>
                    <th>Problems</th>
                    <th>Participants</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contests['current'] as $contest): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contest['id']); ?></td>
                        <td><?php echo htmlspecialchars($contest['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($contest['problems']); ?></td>
                        <td><?php echo htmlspecialchars($contest['participants']); ?></td>
                        <td><a href="#">Enter Contest</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Past Contests</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Contest ID</th>
                    <th>Starting Date</th>
                    <th>Problems</th>
                    <th>Participants</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contests['previous'] as $contest): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contest['id']); ?></td>
                        <td><?php echo htmlspecialchars($contest['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($contest['problems']); ?></td>
                        <td><?php echo htmlspecialchars($contest['participants']); ?></td>
                        <td><a href="#">View Results</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>

    <div class="d-flex justify-content-center" id="pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

</body>

</html>