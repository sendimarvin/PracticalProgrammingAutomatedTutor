<?php
    //gets student's sbmission file, store it in DB & returns to problem page
    require_once('../account/connect.php');

    $submissionDirectory = "../filebase/studentsSubmissions/".substr($_GET['user'], 0,5);
    $studentResult = "Name = ".$_GET['user']."\n passed";
    $submission = $_FILES["file"]["tmp_name"];
    $sql = "INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `result`) VALUES ('".$_GET['user']."', '".$_GET[id]."', 'submission', 'result')";
    
    //make directory if does not exist
    if (!is_dir($submissionDirectory)){
        mkdir ($submissionDirectory, 0755, true);
    }
    
    if (($conn->query($sql) === TRUE) || ($conn->query("UPDATE `studentsubmissions` SET `submission` = 'submissionUpdate', `result` = 'resultsUpdate' WHERE `studentsubmissions`.`email` = '".$_GET['user']."'") === TRUE)){
        //insert results txt file in folder
        $results = fopen($submissionDirectory."/result.txt","w") or die("Unable to open file");
        fwrite($results, $studentResult);

        //save student submitted file
        $target_file = $submissionDirectory."/".basename("submission.txt");
        $check=move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }else{
        echo "Error:   sql <br>" . $conn->error;
    }

    //take user back to problems
    header("Location: problem.php?id=".$_GET['id']."&user=".$_GET['user']);
    exit();
?>