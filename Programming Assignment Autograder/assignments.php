<!DOCTYPE html>
<html>
<head>
    <title>Programming Asignment Autogradder Plugin</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>

<body>
<script src="script/script.js"></script>
<div id="top_div">
    <h3>Automated Assignment Autograder</h3>
    <h4>Assignment List </h4>
</div>
<div id="body_div">
    <div data-role="page" id="page1">
        <div id="head" data-role="header">
            <h3>This is the list of available programming assignments, click on a problem to attempt it.</h3>
        </div>

        <!--List view in the webpage-->

        <?php
        $problemsFile = fopen ("assignments/problems.txt", "r");
        $problemTitle = "";
        $problemDescription = "";
        $tabsEncountered = 0;
        $idCount = 0;
        while(!feof($problemsFile)) {
            $characterRead = fgetc($problemsFile);
            if (!strcmp($characterRead, "\t")){
                $tabsEncountered = $tabsEncountered + 1;
            } else if (!strcmp($characterRead, "\n")) {
                $idCount++;
                $output = <<<_END
<div class='list_holder' id = 'problem".$idCount."' onclick = 'loadProblem(this.id)'>
    <div id = 'titleproblem".$idCount."'><strong>$problemTitle</strong></div>
    <div>".$problemDescription."</div>
    <div class = 'attempt' style = 'color: blue;'>attempt</div>
</div>
_END;
                echo $output;
                // echo "<br>".$problemTitle."0000".$problemDescription."<br>";
                $problemTitle = $problemDescription = "";
                $tabsEncountered = 0;
            } else if($tabsEncountered == 0) {
                $problemTitle = $problemTitle.$characterRead;
            } else if ($tabsEncountered == 1) {
                $problemDescription = $problemDescription.$characterRead;
            }

        }
        ?>

        <div id = "try" onclick = "loadProblem()" style="height:  fit-content;width: 90%; margin-left:  5px; margin-right:  5px;  padding:  10px;
    background-color: #dad1d1; margin-bottom: 5px;">
            <div>name</div>
            <div>Description</div>
        </div>


    </div>


</div>

</body>
</html>
