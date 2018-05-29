<!DOCTYPE html>
<html>
<head>
    <title>Programming Asignment Autograder</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>

<body>
<script src="script/script.js"></script>
<div id="top_div">
    <h3>Programming Assignment Autograder</h3>
    <h4>Home Page</h4>
</div>
<div id="body_div">
    <div data-role="page" id="page1">
        <div id="head" data-role="header">
            <h3>Hello, welcome to the MUK programming assignment autograder. Are you a student or a lecturer? </h3>
        </div>

        <div class='list_holder' id = 'problem".$idCount."' onclick="window.location = 'assignments.php'">
            <div id = 'titleproblem".$idCount."'><strong>Student</strong></div>
            <div>If you're a student, click here to view the list of assignments. </div>
            <div class = 'attempt' style = 'color: #4697e4;'>VIEW ASSIGNMENTS</div>
        </div>

        <div class='list_holder' id = 'problem".$idCount."' onclick="window.location = 'lecturer.php'">
            <div id = 'titleproblem".$idCount."'><strong>Lecturer / Instructor</strong></div>
            <div>If you're a lecturer, click here to create new problems or view the students submissions.</div>
            <div class = 'attempt' style = 'color: #4697e4;'>ACCESS LECTURER PAGE</div>
        </div>

    </div>
</div
</body>
</html>