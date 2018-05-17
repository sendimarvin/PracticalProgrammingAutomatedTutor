<?php
    $problemTitle = $_POST["problemTitle"];
    $problemDescription = $_POST["problemDescription"];
    $inputFile = $_FILES["inputFile"]["name"];
    $checkerFile = $_FILES["checkerFile"]["name"];
    $timeLimit = $_POST["timeLimit"];
    $memoryLimit = $_POST["memoryLimit"];

    $problemsDirectory = "../filebase/problems/";
    $_SESSION["status"] = "";

    echo "Problem Title: ".$problemTitle."<br>";
    echo "Problem Description: ".$problemDescription."<br>";
    echo "Input File Name: ".$inputFile."<br>";
    echo "checker File Name: ".$checkerFile."<br>";
    echo "time Limit: ".$timeLimit."<br>";
    echo "memory Limit: ".$memoryLimit."<br>";

    $formatProblemTitle = "problemTitle:".$problemTitle;
    $formatProblemDescription = "problemDescription:".$problemDescription;
    $formatInputFile = "inputFile:".$inputFile;
    $formatCheckerFile = "checkerFile:".$checkerFile;
    $formatTimeLimit = "timeLimit:".$timeLimit;
    $formatMemoryLimit = "memoryLimit:".$memoryLimit;

    $problemString = $formatProblemTitle."\t".$formatProblemDescription."\t".
    $formatInputFile."\t".$formatCheckerFile."\t".$formatTimeLimit."\t".
    $formatMemoryLimit."\n";

    echo $problemString;

    $problemFile = fopen("../filebase/problems.txt","a") or die("Unable to open file");
    fwrite($problemFile, $problemString);
    fclose();
    
    if (!is_dir($problemsDirectory.$problemTitle)){
        mkdir ($problemsDirectory.$problemTitle, 0755, true);
    }
    
    $target_file = $problemsDirectory.$problemTitle."/".basename($inputFile);
    $check=move_uploaded_file($_FILES["inputFile"]["tmp_name"], $target_file);
    $target_file2 = $problemsDirectory.$problemTitle."/".basename($checkerFile);
    $check=move_uploaded_file($_FILES["checkerFile"]["tmp_name"], $target_file2);

    session_start();
    $_SESSION["status"] = $problemTitle;

    header("Location: admin.php");
    exit();
?>