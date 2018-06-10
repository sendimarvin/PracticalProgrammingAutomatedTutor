<?php
    require_once('../account/connect.php');

    $problemName = set($_POST['problem_title']);
    $problemDescription = set($_POST['problem_description']);
    $checkerFile = $_FILES["checker_file"]["tmp_name"];
    $inputFile = $_FILES["input_file"]["tmp_name"];
    $timeLimit = set($_POST["time_limit"]);
    $memoryLimit = set($_POST["memory_limit"]);
    $problemId = getProblemId($conn);
    echo $problemId;

    if($problemName !==null & $problemDescription !==null & $timeLimit !==null & $memoryLimit !==null){
        $sql= "INSERT INTO `problem` (`problemId`, `problemTitle`, `problemDescription`, `inputFile`, `checkerFile`, `timeLimit`, `memoryLimit`) VALUES ('".$problemId."', '".$problemName."', '".$problemDescription."', '".$inputFile."', '".$checkerFile."', '".$timeLimit."', '".$memoryLimit."');";
            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            echo "<br>";

            //take user to home page
            $_SESSION["email"] = $email;
            header("Location: ../problem/problems.php");
            exit();
        }else{
            echo "Error:   sql <br>" . $conn->error;
        }

    }else{
        echo "<br><span>Some values are null</span>";
    }

    $conn->close();

    function set ($a){
        if(isset($a)){
            return $a;
        }else{
            return "";
        }
    }

    function getProblemId($conn){
        $sql = "SELECT COUNT(problemId) FROM problem WHERE 1";
        $result = $conn->query($sql);
        
        return $result->fetch_assoc()["COUNT(problemId)"];
       
    }
    
?>