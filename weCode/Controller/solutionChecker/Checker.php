<?php
    function cppChecker($file) {
        $inputDir = "../../Model/problemDiscriptionAndInput/problem1/input/";
        $outputDir = "../../Model/problemDiscriptionAndInput/problem1/output/";
        $timeLimit = 5; // Time limit in seconds
    
        file_put_contents("a.cpp", $file);
        $compile = "g++ -DONLINE_JUDGE a.cpp -O3 -o a.exe";
        exec($compile, $output, $return_var);
        if ($return_var !== 0) {
            return "Compilation failed.";
            exit;
        }
    
        $id = 1;
        $files = glob($inputDir . "input" . $id . ".txt");
        foreach ($files as $input) {
            $curoutput = file_get_contents($outputDir . "output" . $id . ".txt");
    
            $descriptorspec = [
                0 => ["file", $input, "r"], // stdin
                1 => ["file", "output.txt", "w"], // stdout
                2 => ["pipe", "w"] // stderr
            ];
    
            $process = proc_open("a.exe", $descriptorspec, $pipes);
            if (is_resource($process)) {
                $start = microtime(true);
                $status = proc_get_status($process);
                while ($status['running'] && (microtime(true) - $start) < $timeLimit) {
                    usleep(100000); // Sleep for 0.1 seconds
                    $status = proc_get_status($process);
                }
    
                if ($status['running']) {
                    proc_terminate($process);
                    return "Test case " . $id . " exceeded time limit.";
                }
    
                proc_close($process);
            }
    
            $output = file_get_contents("output.txt");
    
            if ($output != $curoutput) {
                return "Test case " . $id . " failed.";
            }
    
            $id++;
        }
    
        unlink("a" . ".cpp");
        unlink("a" . ".exe");
        unlink("output.txt");
        return "All test cases passed.";
    }

    function cChecker($file) {
        $cfilePath = "C:\\MinGW\\bin";
        $inputDir = "../../Model/problemDiscriptionAndInput/problem1/input/";
        $outputDir = "../../Model/problemDiscriptionAndInput/problem1/output/";
        $timeLimit = 5; // Time limit in seconds
    
        file_put_contents("a.c", $file);
        $compile = "gcc -DONLINE_JUDGE a.c -O3 -o a.exe";
        exec($compile, $output, $return_var);
        if ($return_var !== 0) {
            return "Compilation failed.";
            exit;
        }
    
        $id = 1;
        $files = glob($inputDir . "input" . $id . ".txt");
        foreach ($files as $input) {
            $curoutput = file_get_contents($outputDir . "output" . $id . ".txt");
    
            $descriptorspec = [
                0 => ["file", $input, "r"], // stdin
                1 => ["file", "output.txt", "w"], // stdout
                2 => ["pipe", "w"] // stderr
            ];
    
            $process = proc_open("a.exe", $descriptorspec, $pipes);
            if (is_resource($process)) {
                $start = microtime(true);
                $status = proc_get_status($process);
                while ($status['running'] && (microtime(true) - $start) < $timeLimit) {
                    usleep(100000); // Sleep for 0.1 seconds
                    $status = proc_get_status($process);
                }
    
                if ($status['running']) {
                    proc_terminate($process);
                    return "Test case " . $id . " exceeded time limit.";
                }
    
                proc_close($process);
            }
    
            $output = file_get_contents("output.txt");
    
            if ($output != $curoutput) {
                return "Test case " . $id . " failed.";
            }
    
            $id++;
        }
    
        unlink("a" . ".c");
        unlink("a" . ".exe");
        unlink("output.txt");
        return "All test cases passed.";
    }

    function pythonChecker($file) {
        $inputDir = "../../Model/problemDiscriptionAndInput/problem1/input/";
        $outputDir = "../../Model/problemDiscriptionAndInput/problem1/output/";
        $timeLimit = 5; // Time limit in seconds
    
        file_put_contents("a.py", $file);
    
        $id = 1;
        $files = glob($inputDir . "input" . $id . ".txt");
        foreach ($files as $input) {
            $curoutput = file_get_contents($outputDir . "output" . $id . ".txt");
    
            $descriptorspec = [
                0 => ["file", $input, "r"], // stdin
                1 => ["file", "output.txt", "w"], // stdout
                2 => ["pipe", "w"] // stderr
            ];
    
            $process = proc_open("python a.py", $descriptorspec, $pipes);
            if (is_resource($process)) {
                $start = microtime(true);
                $status = proc_get_status($process);
                while ($status['running'] && (microtime(true) - $start) < $timeLimit) {
                    usleep(100000); // Sleep for 0.1 seconds
                    $status = proc_get_status($process);
                }
    
                if ($status['running']) {
                    proc_terminate($process);
                    return "Test case " . $id . " exceeded time limit.";
                }
    
                proc_close($process);
            }
    
            $output = file_get_contents("output.txt");
    
            if ($output != $curoutput) {
                return "Test case " . $id . " failed.";
            }
    
            $id++;
        }
    
        unlink("a" . ".py");
        unlink("output.txt");
        return "All test cases passed.";
    }
    
?>