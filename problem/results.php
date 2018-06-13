<?php  
    //gets student's sbmission file, store it in DB & returns to problem page
    require_once('../account/connect.php');
    $submissionDirectory = "../filebase/student/";
    $studentResult = "Name = ".$_GET['user']."\npassed";

    

    $submission = $_FILES["file"]["tmp_name"];
    $sql = "INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `result`) VALUES ('".$_GET['user']."', '".$_GET['id']."', 's".$_GET['id']."', 'r".$_GET['id']."')";
    //$sql = "INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `results`) VALUES ('".$_GET['user']."', '".$_GET['id']."', '".$submission."', '".$results."')";
    if (($conn->query($sql) === TRUE) || ($conn->query("UPDATE `studentsubmissions` SET `submission` = 's".$_GET['id']."', `result` = 'r".$_GET['id']."' WHERE `studentsubmissions`.`email` = '".$_GET['user']."'") === TRUE)) {
        //insert results txt file in folder
        $results = fopen($submissionDirectory."/results/r".$_GET['id'].".txt","w") or die("Unable to open file");
        fwrite($results, $studentResult);

        //save student submitted file
        $target_file = $submissionDirectory."submissions/".basename("s".$_GET['id']."txt");
        $check=move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }else{
        echo "Error:   sql <br>" . $conn->error;
    }
    //store both submitted and results file
    if (!is_dir($submissionDirectory."submissions")){
        mkdir ($submissionDirectory."submissions", 0755, true);
    }
    if (!is_dir($submissionDirectory."results")){
        mkdir ($submissionDirectory."results", 0755, true);
    }

    //take user to problems
    header("Location: problem.php?id=".$_GET['id']."&user=".$_GET['user']);
    exit();
?>