<?php
    require_once('connect.php');

    $email = "";
    $password = "";
    $errorMessage = "user_doesnt_exist";
   if(isset($_POST['submit'])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM `user` WHERE email = '".$email."' AND password = '".$password."';";
        $result = $conn->query($sql)->fetch_assoc();
        print_r($result);

        if(is_null($result)){
            echo "<h1>results is null</h1>";
            header("Location: ../index.php?error=".$errorMessage);
            exit();
        }else{
            if($result["role"] === "admin"){
                header("Location: ../admin/admin.php?user=".$email);
                exit();
            }else if($result["role"] === "student") {
                header("Location: ../problem/problems.php?user=".$email);
                exit();
            }else{
                header("Location: ../problem/problems.php?user=".$email);
                exit();
            }
        }
        echo "email: ".$result['email'] ."role = ".$result['role'];
        echo "<br>";
    }else{
       echo "Please put in login credentials";
       header("Location: ../index.php?error=".$errorMessage);
       exit();
   }
?>