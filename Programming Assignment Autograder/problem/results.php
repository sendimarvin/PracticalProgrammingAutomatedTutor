<?php
if ($_FILES) {
    echo "Compiling... <br>";
    $name = $_FILES['filename']['name'];

    $ext = explode(".", $name);
//     echo $name;
//     echo "<br>".count($ext)."<br>";
    if ((sizeof($ext) == 2) && $ext[1] == "java"){
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "File name is: $name <br> Received file. <br> Below are your results: <br>";
        $problemID = $_GET["id"];
        grade($name, $ext[0], $problemID);
    }
    else echo "Error: Invalid file uploaded";
}
else {
    echo "Failed to compile";
}

//This is a sample grade function for task 1: summing 2 numbers.
function grade($name, $classfile, $problemID){

    //Compile received file.
    shell_exec("Java\jdk1.8.0_77\bin\javac.exe $name 2>&1");

    //Get expected output.
    $problemFolder = "..\\filebase\problems\assignment".$problemID."\\";
    $fh = fopen($problemFolder."output.txt", 'r') or die("File does not exist or you lack permission to open it.");
    $line = trim(fgets($fh));
    fclose($fh);

    //Run received submission and get its output.
    $output = shell_exec("Java\jdk1.8.0_77\bin\java.exe $classfile"."< $problemFolder.'input.txt' > 'student-output.txt' 2>&1");
//    echo $output."\n";
    print_r("Contents of output array: ".$output."<br>");
    $fh = fopen("student-output.txt", 'r') or die("File does not exist or you lack permission to open it.");
    $lineRec = trim(fgets($fh));
    fclose($fh);

    //Output the correct answer and the received answer. And give correctness verdict.
    echo "<br>Correct Answer: $line <br> Received Answer: $lineRec";
    echo "<br>";

    if ($line == $lineRec) echo "<br> <p style='color: green'>Congratulations, you got the right answer.</p>";
    else echo "<br> <p style='color: red'>Unfortunately, your solution isn't correct.</p>";
}




//    //gets student's sbmission file, store it in DB & returns to problem page
//    require_once('../account/connect.php');
//
//    $submissionDirectory = "../filebase/studentsSubmissions/".substr($_GET['user'], 0,5)."/p".$_GET['id'];
//    $studentResult = "Name = ".$_GET['user']."\n passed";
//    $submission = $_FILES["file"]["tmp_name"];
//    $sqlNewRecord = "INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `result`) VALUES ('".$_GET['user']."', '".$_GET[id]."', 'submission', 'result')";
//    $sqlUpdateRecord = "UPDATE `studentsubmissions` SET `submission` = 'submissionUpdate', `result` = 'resultsUpdate' WHERE `studentsubmissions`.`id` = '".getRecordId($conn, $_GET['user'], $_GET['id'])."'";
//    $SubmissionAlreadyExists = checkIfSubmissionExists($conn, $_GET['user'], $_GET['id']);
//
//    //make directory if does not exist
//    if (!is_dir($submissionDirectory)){
//        mkdir ($submissionDirectory, 0755, true);
//    }
//
//    if ( (($conn->query($sqlUpdateRecord) === TRUE) && $SubmissionAlreadyExists) || (($conn->query($sqlNewRecord) === TRUE) && !$SubmissionAlreadyExists)){
//        //insert results txt file in folder
//        $results = fopen($submissionDirectory."/result.txt","w") or die("Unable to open file");
//        fwrite($results, $studentResult);
//
//        //save student submitted file
//        $target_file = $submissionDirectory."/".basename("submission.txt");
//        $check=move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//    }else{
//        echo "Error:   sql <br>" . $conn->error;
//    }
//
//    //take user back to problems
//    header("Location: problem.php?id=".$_GET['id']."&user=".$_GET['user']);
//    exit();
//
//    function getRecordId($conn, $email, $problemId){
//        $value;
//        $sql = "SELECT id FROM `studentsubmissions` WHERE email = '".$email."' AND problemId = '".$problemId."';";
//        $result = $conn->query($sql);
//        if ($row = $result->fetch_assoc()) {
//            $value = $row['id'];
//        }
//        return $value;
//    }
//
//    function checkIfSubmissionExists($conn, $email, $problemId){
//        $check;
//        $sql = "SELECT id FROM `studentsubmissions` WHERE email = '".$email."' AND problemId = '".$problemId."';";
//        $result = $conn->query($sql);
//        if ($row = $result->fetch_assoc()) {
//            $check = true;
//        }else{
//            $check = false;
//        }
//        return $check;
//    }
//?>