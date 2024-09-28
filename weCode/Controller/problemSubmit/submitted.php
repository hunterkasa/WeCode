<?php

    require_once '../solutionChecker/Checker.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedExtensions = array('c', 'cpp', 'py');

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/weCode/Controller/problemSubmit/uploads/';
                $destPath = $uploadFileDir . $fileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $fileContents = file_get_contents($destPath);

                    if ( $fileExtension == 'c' ) {
                        $result = cChecker($fileContents);
                    } else if ( $fileExtension == 'cpp' ) {
                        $result = cppChecker($fileContents);
                    } else if ( $fileExtension == 'py' ) {
                        $result = pythonChecker($fileContents);
                    }
                    // result here 
                    var_dump($result);
                }
                unlink($destPath);
                
            } 
        } else {
            if ( isset($_POST['codeArea']) ) {
                $code = $_POST['codeArea'];
                $lang = $_POST['selectLang'];

                if ( $lang == 'c' ) {
                    $result = cChecker($code);
                } else if ( $lang == 'cpp' ) {
                    $result = cppChecker($code);
                } else if ( $lang == 'python' ) {
                    pythonChecker($code);
                }
                // result here 
                var_dump($result);
            }

        }
    }

?>