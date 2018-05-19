<!DOCTYPE html>
<html>
    <head>
        <title>Programming Asignment Autogradder Plugin</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <!-- <link rel="stylesheet" type="text/css" href="styles/index.css"> -->

    </head>

    <body>
    <script src="script/script.js"></script>
        <div id="top_div">
            <h3>Automated Assignment Autograder</h3>
            <h4>Home Page</h4>
        </div>
        <div id="body_div">
            <div data-role="page" id="page1">
            <div id="head" data-role="header">
                <h3>Choose Problem to try</h3> 
            </div> 	
            
            <!--List view in the webpage-->

            <?php
                $problemsFile = fopen ("filebase/problems.txt", "r");
                $problemTitle = "";
                $problemDescription = "";
                $tabsEncountered = 0;
                while(!feof($problemsFile)) {
                    $characterRead = fgetc($problemsFile);
                    if (!strcmp($characterRead, "\t")){
                        $tabsEncountered = $tabsEncountered + 1;
                    } else if (!strcmp($characterRead, "\n")) {
                        echo "<div class='list_holder' onclick = 'loadProblem()' style='height:  fit-content;width: 90%; margin-left:  5px; margin-right:  5px;  padding:  10px;
                        background-color: #dad1d1; margin-bottom: 5px;'>
                                    <div><strong>".$problemTitle."</strong></div>
                                    <div>".$problemDescription."</div>
                                    <div style = 'color: blue;'>attempt</div>
                                </div>";
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

            <div onClick = "loadProblem()" style="height:  fit-content;width: 90%; margin-left:  5px; margin-right:  5px;  padding:  10px;
    background-color: #dad1d1; margin-bottom: 5px;">
                <div>name</div>
                <div>Description</div>
            </div>

            
            </div>


        </div>
        </div>  

    </body>
</html>
