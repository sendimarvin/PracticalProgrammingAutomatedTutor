<?php
if ($_FILES) {
    echo "Compiling <br>";
    $name = $_FILES['filename']['name'];
    
    $ext = explode(".", $name);
//     echo $name;
//     echo "<br>".count($ext)."<br>";
    if ((sizeof($ext) == 2) && $ext[1] == "java"){
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "File name is: $name <br> Received file. <br> Below are your results: <br>";
        grade($name, $ext[0]);
    }
    else echo "Error: Invalid file uploaded";
}
else {
    echo "Failed to compile";
}

//This is a sample grade function for task 1: summing 2 numbers.
function grade($name, $classfile){
    
    //Compile received file.
    shell_exec("Java\jdk1.8.0_77\bin\javac.exe $name 2>&1");
    
    //Get expected output.
    //TODO: Pass a parameter that indicates where the problem folder is.
    $fh = fopen("Add 2 numbers/output.txt", 'r') or die("File does not exist or you lack permission to open it.");
    $line = trim(fgets($fh));
    fclose($fh);
    
    //Run received submission and get its output.
    $output = shell_exec("Java\jdk1.8.0_77\bin\java.exe $classfile".'< "Add 2 numbers/input.txt" > "Add 2 numbers/student-output.txt" 2>&1');
//    print_r("Contents of output array: ".$output."<br>");
    $fh = fopen("Add 2 numbers/student-output.txt", 'r') or die("File does not exist or you lack permission to open it.");
    $lineRec = trim(fgets($fh));
    fclose($fh);
    
    //Output the correct answer and the received answer. And give correctness verdict.
    echo "<br>Correct Answer: $line <br> Received Answer: $lineRec";
    echo "<br>";
    
    if ($line == $lineRec) echo "<br> Congratulations, you got the right answer.";
    else echo "<br>Unfortunately, your solution isn't correct.";
}

//TODO: Make this file generic: ie can autograde all tasks.
//TODO: Put the different assignments in their own folder along with their statements, output and input files.
//TODO: When someone submits a solution, their output file will be generated in their user (temporary) folder and then this will be compared to the correct file. Also add modules for timing and memory checks.
