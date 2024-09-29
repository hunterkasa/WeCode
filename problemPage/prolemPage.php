<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="problemPageCss.css">
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
    <div id="seNav" class="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="container" id="leftWindow">
                    <h4 id="nav-text" class="text-center p-4">Problem title</h4>
                    <p>
                        lrem ipsum dolor sit amet consectetur adipisicing elit
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae inventore earum, praesentium sunt debitis, itaque quis voluptatibus fugiat rem ad hic odit voluptate laborum consequatur cum, repellat aut! Aut, tenetur.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum, maiores repellat at nulla excepturi laborum beatae. Illo quasi accusantium, in molestias asperiores minima laudantium vitae deleniti, quidem ipsum fuga doloribus!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit impedit autem, hic vero officiis et atque nostrum ducimus minima quod at maiores nobis expedita recusandae, laborum voluptate! Quidem, ducimus sint.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum molestias excepturi delectus laborum ab itaque, eum ut, deserunt accusamus assumenda et quasi quos, totam ea quod illum fugiat iusto expedita.
                    </p>
                    <h6>Input Format</h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eaque iusto, voluptatibus illum facere et, repellendus qui quidem, fugiat beatae aut magni eum ipsa sint itaque hic minima blanditiis. Nesciunt.
                    </p>
                    <h6>
                        Output Format
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eaque iusto, voluptatibus illum facere et, repellendus qui quidem, fugiat beatae aut magni eum ipsa sint itaque hic minima blanditiis. Nesciunt.
                    </p>
                    <h6>Constraints</h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <div class="d-flex bd-highlight justify-content-between">
                                        <div>
                                            Input
                                        </div>
                                        <div>
                                            <button class="fw-bold" id="cpyButton">Copy</button>
                                        </div>
                                    </div>
                                </th>
                                <th>Output</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>4</td>
                            </tr>
                        </table>
                    </div>

                    <h6>Explanation:</h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eaque iusto, voluptatibus illum facere et, repellendus qui quidem, fugiat beatae aut magni eum ipsa sint itaque hic minima blanditiis. Nesciunt.
                    </p>

                </div>

            </div>
            <div class="col">
                <div class="container" id="rightWindow" ;>
                    <div class="container d-flex bd-highlight justify-content-between p-2" id="codeBox">
                        <div class="text-white px-3">
                            Code
                        </div>

                        <form form action="../../Controller/problemSubmit/submitted.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                            <div class="px-3">
                                <select name="selectLang" id="selectLang">
                                    <option value="cpp">C++</option>
                                    <option value="c">C</option>
                                    <option value="python">python</option>
                                    <!-- languiage -->
                                </select>
                            </div>
                            </div>
                            <div class="container">
                                <textarea name="codeArea" cols="120" rows="25" class=" " id="codeArea"></textarea> 
                                <!-- codeArea = text file  -->
                            </div>
                            <div class="container d-flex bd-highlight justify-content-between p-2" id="inputTitle">
                                <div class="px-3">
                                <input type="file" name="file" id="selectFile" accept=".c,.cpp,.py">
                                </div>
                            </div>

                            <div class="d-flex bd-hightlight justify-content-center mt-3">
                                <button class="mx-2" id="buttomBtn">Submit</button>
                            </div>
                            
                        </form>

                        <script>
                            function validateForm() {
                                const fileInput = document.getElementById('selectFile');
                                const filePath = fileInput.value;
                                const codeArea = document.getElementById('codeArea').value.trim();

                                // Allowed extensions
                                const allowedExtensions = /(\.c|\.cpp|\.py)$/i;

                                if (!filePath && !codeArea) {
                                    alert('Please either select a file or enter code in the text area.');
                                    return false;
                                }

                                if (filePath && !allowedExtensions.exec(filePath)) {
                                    alert('Invalid file type. Only .c, .cpp, and .py files are allowed.');
                                    fileInput.value = '';  // Clear the file input
                                    return false;
                                }

                                return true;
                            }
                        </script>
                        
                </div>
            </div>
        </div>
    </div>
</body>

</html>