<!DOCTYPE html>
<html>
    <head>
        <title>Programming Asignment Autogradder Plugin</title>
        <link rel="stylesheet" type="text/css" href="../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../styles/problem.css">

    </head>

    <body>
        <script src="../script/script.js"></script>  
        <div id="top_div">
            <h3>Automated Assignment Autograder</h3>
            <h4>Go back to list of problems</h4>
        </div>
        <div id="body_div">
            <div data-role="page" id="page1">
                <div id="head" data-role="header">
                    <h3>Problem Statement</h3> 
                </div>
                <div id = "topSection">

                    <div id = "problemStatement">
                        <div id="problemTitle"><strong>ProblemTitle</strong></div>
                        <div id="problemDescrption">problemDescriotion</div>
                        <div id="inputFile">
                            <div>For example; If these values are input, the code must produce the corresponding values</div>
                            <div></div>
                        </div>
                        <div>
                            <div><strong> Note: your code must meet the following conditions</strong></div>
                            <span>Time limit:  </span>
                            <span>Memory Limit: </span>
                        </div>

                    </div>

                    <div>I am left<div>

                    <!-- <div id="testInput">
                        <form>
                            <div>
                                <label>
                                    Input sample values
                                </label>
                    
                            <div>
                                <textarea spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
                            </div>
                            <div>
                                <label>
                                    Out put values
                                </label>
                    
                            <div>
                                <textarea spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
                            </div>
                        </form>
                    </div> -->

                    <?php
                        $problemTitle = $_GET["para1"];

                        $fullProblemArray = searchForProblemContent($problemTitle);                    
                        //echo "<strong> desc:".$fullProblemArray[3]."</strong><br><br>";
                    

                        function searchForProblemContent ($passedProblemTitle){
                            $file = file_get_contents('../filebase/problems.txt', true);
                            $n = explode("\n", $file);
                            foreach($n as $line){
                                $problemArray = explode("\t", $line);
                                if($problemArray[0] == $passedProblemTitle){
                                    return $problemArray;
                                }
                            }
                        }
                    ?>	

                </div>
            </div>
        </div>  
    </body>
</html>
