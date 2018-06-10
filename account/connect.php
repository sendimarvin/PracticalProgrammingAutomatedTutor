<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "autograder";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed to connect to server: " . $conn->connect_error);
    }


?>