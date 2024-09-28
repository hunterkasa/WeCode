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
            <p class="mx-2 p-2 fw-bold" id="nav-text">Login</p>
            <div class="vr mt-2" id="navVr"></div>
            <p class="mx-2 p-2 fw-bold" id="nav-text"><a href="#" id="signUp">Signup</a></p>
        </div>
        <div class="">
            <i class="fa-solid fa-sun " id="navSun"></i>
        </div>
    </nav>
    <div class="container" id="contestTitle">
        <div class="text-center">
            <h4>Contest</h4>
            <p> Join code from around the globe to takle challenging problems and showcase<br>your skills in our programming contests!</p>
            <p></p>
        </div>
    </div>

    <div class="text-center mt-3">
        <h3>UP COMING CONTEST</h3>
    </div>
    <div class="d-flex bd-highlight text-center justify-content-center">


    </div>

    <div class="d-flex bd-highlight justify-content-center ">
        <div class="container" id="carD">
            <div class="image">
                <img id="carD-image" src="https://static-cse.canva.com/blob/1210661/10SimplewaystoenhanceyourimageFeaturedImage1.jpg" alt="contest">
            </div>
            <div class="carD-body fw-bold text-center">
                Weekly Contest #16 <br>
                3 days 12 hours left
            </div>
        </div>
        <div class="container" id="carD">
            <div class="image">
                <img id="carD-image" src="https://static-cse.canva.com/blob/1210661/10SimplewaystoenhanceyourimageFeaturedImage1.jpg" alt="contest">
            </div>
            <div class="carD-body fw-bold text-center">
                Weekly Contest #16 <br>
                3 days 12 hours left
            </div>
        </div>
        <div class="container" id="carD">
            <div class="image">
                <img id="carD-image" src="https://static-cse.canva.com/blob/1210661/10SimplewaystoenhanceyourimageFeaturedImage1.jpg" alt="contest">
            </div>
            <div class="carD-body fw-bold text-center">
                Weekly Contest #16 <br>
                3 days 12 hours left
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-10">
            <div class="container">
                <div class="container">

                </div>
                <div class="container">
                    <table>
                        <tr>
                            <th>Contest ID</th>
                            <th>Contest Type</th>
                            <th>Rating</th>
                            <th>Starting Date</th>
                            <th>Problems</th>
                            <th>Participants</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td><a href="#">Enter Contest</a></td>
                        </tr>

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
        </div>
        <div class="col-2">
            <div class="container" id="filteR">
                  <div class="text-center text-white fw-bold p-2">
                    Contest Filter
                  </div>
                  <hr class="text-white">
                   <p class="fw-bold text-white">Contest Type</p>
                        <div class="text-white">
                            <input type="checkbox" id="ckBox"> All Contest <br>
                            <input type="checkbox" name="" id="ckBox"> Weekly Contest <br>
                            <input type="checkbox" name="" id="ckBox"> Monthly Contest <br>
                        </div>
                    <div class="bd-highlight text-center mt-4">
                         <button>Apply</button>
                         <button>Cancel</button>
                    </div>  
            </div>
        </div>
    </div>
</body>

</html>