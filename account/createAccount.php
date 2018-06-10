<?php
    require_once('connect.php');

    $email = $_POST["email"];
    $fName = $_POST["fName"];
    $sName = $_POST["sName"];
    $password = $_POST["password"];
    $role = "student";

    if($email !==null & $fName !==null & $sName !==null & $password !==null){
        $sql=   "INSERT INTO `user` (`email`, `firstName`, `secondName`, `password`, `role`) VALUES ('".$email."', '".$fName."', '".$sName."', '".$password."', NULL);";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";

            //take user to home page
            $_SESSION["email"] = $email;
            header("Location: ../problem/problems.php");
            exit();
        } else {
            if ($conn->error === "Duplicate entry '".$email."' for key 'PRIMARY'"){
                echo "email exists";
                $_SESSION["error"] = "email exists";
                header("Location: signup.php");
                exit();
            }
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    $conn->close();
    
?>