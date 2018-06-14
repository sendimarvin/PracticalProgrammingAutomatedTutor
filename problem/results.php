<?php
    //gets student's sbmission file, store it in DB & returns to problem page
    require_once('../account/connect.php');

    $counter = returnCounter($conn);
    $submissionDirectory = "../filebase/studentsSubmissions/s".$counter;
    $studentResult = "Name = ".$_GET['user']."\n passed";
    $submission = $_FILES["file"]["tmp_name"];
    $sql = "INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `result`) VALUES ('".$_GET['user']."', '".$counter."', 's".$_GET['id']."', 'r".$_GET['id']."')";
    
    //make directory if does not exist
    if (!is_dir($submissionDirectory)){
        mkdir ($submissionDirectory, 0755, true);
    }
    
    if (($conn->query($sql) === TRUE) || ($conn->query("UPDATE `studentsubmissions` SET `submission` = 's".$_GET['id']."', `result` = 'r".$_GET['id']."' WHERE `studentsubmissions`.`email` = '".$_GET['user']."'") === TRUE)){
        //insert results txt file in folder
        $results = fopen($submissionDirectory."/r".$_GET['id'].".txt","w") or die("Unable to open file");
        fwrite($results, $studentResult);

        //save student submitted file
        $target_file = $submissionDirectory."/".basename("s".$_GET['id']."txt");
        $check=move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }else{
        echo "Error:   sql <br>" . $conn->error;
    }

    function returnCounter($conn){
        $counter = 0;
        $sql2 = "SELECT * FROM `user` WHERE 1";
        $result2 = $conn->query($sql2);
        while($row2 = $result2->fetch_assoc()){
            $counter++;
            if($row2['email'] === $_GET['user']){
                break;
            }else;
        }
        return $counter;
    }

    //take user to problems
    header("Location: problem.php?id=".$_GET['id']."&user=".$_GET['user']);
    exit();
?>