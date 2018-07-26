<?php
//    require_once('../account/connect.php');

    $problemName = $_POST['problem_title'];
    $problemDescription = $_POST['problem_description'];
    $checkerFile = $_FILES["checker_file"]["name"];
    $inputFile = $_FILES["input_file"]["name"];
//    $timeLimit = set($_POST["time_limit"]);
//    $memoryLimit = set($_POST["memory_limit"]);
    $problemsDirectory = "../filebase/problems/";

    $formatProblemTitle = "".$problemName;
    $formatProblemDescription = "".$problemDescription;
    $formatInputFile = "".$inputFile;
    $formatCheckerFile = "".$checkerFile;
    $problemString = $formatProblemTitle."\t".$formatProblemDescription."\t".
    $formatInputFile."\t".$formatCheckerFile."\n";
//    $problemId = getProblemId();
//    $submissionDirectory = "../filebase/problems/p".$problemId."/";
//
//    //make directory if they do not exist
//    if (!is_dir($submissionDirectory)){
//        mkdir ($submissionDirectory, 0755, true);
//    }

//Count number of folders in problems directory to get id for the next problem
$problemTitle = "assignment";
$filesCount = 0;
$files = glob($problemsDirectory."*.txt");
if ($files) $filesCount = count($files);
$id = $filesCount + 1;
$problemTitle = $problemTitle.$id;

//Write to problem file
$problemsFile = "problems".$id.".txt";
$problemFile = fopen("../filebase/problems/".$problemsFile,"a") or die("Unable to open file");
fwrite($problemFile, $problemString);
fclose($problemFile);

if (!is_dir($problemsDirectory.$problemTitle)){
    mkdir ($problemsDirectory.$problemTitle, 0755, true);
}

$target_file = $problemsDirectory.$problemTitle."/".basename($inputFile);
$check = move_uploaded_file($_FILES["input_file"]["tmp_name"], $target_file);
$target_file2 = $problemsDirectory.$problemTitle."/".basename($checkerFile);
$check = move_uploaded_file($_FILES["checker_file"]["tmp_name"], $target_file2);
session_start();
$_SESSION["status"] = $problemTitle;
header("Location: ../problem/problems.php?user=".$_GET['user']);
exit();

//    if($problemName !==null & $problemDescription !==null & $timeLimit !==null & $memoryLimit !==null){
////        $sql= "INSERT INTO `problem` (`problemId`, `problemTitle`, `problemDescription`, `inputFile`, `checkerFile`, `timeLimit`, `memoryLimit`) VALUES ('".$problemId."', '".$problemName."', '".$problemDescription."', 'input".$problemId."', 'c".$problemId."', '".$timeLimit."', '".$memoryLimit."');";
//            if($conn->query($sql) === TRUE){
//                //save problem input submitted file
//                $target_file = $submissionDirectory.basename("input".$_GET['id'].".txt");
//                $check=move_uploaded_file($inputFile, $target_file);
//
//                //save problem checker submitted file
//                $target_file2 = $submissionDirectory.basename("output".$_GET['id'].".txt");
//                $check=move_uploaded_file($checkerFile, $target_file2);
//
//                //take user to home page
//                $_SESSION["email"] = $email;
//                header("Location: ../problem/problems.php?user=".$_GET['user']);
//                exit();
//            }else{
//                echo "Error:   sql <br>" . $conn->error;
//            }
//
//    }else{
//        echo "<br><span>Some values are null</span>";
//    }
//
//    $conn->close();
//
//    function set ($a){
//        if(isset($a)){
//            return $a;
//        }else{
//            return "";
//        }
//    }
//
////    function getProblemId($conn){
////        $sql = "SELECT COUNT(problemId) FROM problem WHERE 1";
////        $result = $conn->query($sql);
////
////        return $result->fetch_assoc()["COUNT(problemId)"];
////    }
//
//    function getProblemId() {
//        $problemsDirectory = "../filebase/problems";
//        $filesCount = 0;
//        $files = glob($problemsDirectory."*.txt");
//        if ($files) $filesCount = count($files);
//        $id = $filesCount + 1;
//        return $id;
//    }
    
?>