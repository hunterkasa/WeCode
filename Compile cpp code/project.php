<?php
    $cppPath = "C:\\mingw\\bin";
    $path = "C:\\xampp\\htdocs\\personal\\compile\\a";
    $inputPath = "C:\\xampp\\htdocs\\personal\\io\\";
    $outputPath = "C:\\xampp\\htdocs\\personal\\compile\\";
    $fileDir = "C:\\xampp\\htdocs\\personal\\io\\*.txt";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['btn'])) {
            $cppCode = $_POST['code']; // get the code

            file_put_contents($path.".cpp", $cppCode); // save the code to a file
            
            // !!IMPORTANT!! after g++ add -D"..."  to ignore useres code between ifndef and endif
            $compile = "$cppPath\\g++ -DONLINE_JUDGE $path.cpp -O3 -o $path.exe"; // command to run the code and generate the exe file
            exec($compile);
            
            // exec("$path.exe < $inputPath > $outputPath"); // single file input

            // using glob and including the desired file extension will take only the file ending with those extension
            // can use scandir() instead but those gives wired . .. file extension 
            $files = glob($fileDir);
            $id = 1;
            foreach ( $files as $input ){ // mmultiple file input
                // $INPUT = $inputPath.$input;
                exec("$path.exe <$input> $outputPath"."output".$id.".txt");
                $oo++;
            }

        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Save to file</title>
</head>
<body>
    <form method="POST">
        <textarea name="code" style="width:500px; height:500px" ></textarea><br>
        <button name="btn">submit</button>
    </form>
</body>
</html>