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
    <h4> Click <a href="../assignments.php">here</a> to go back to the assignments page. </h4>
</div>

<div id="body_div">
    <div data-role="page" id="page1">
        <div id="head" data-role="header">
            <h3>Problem Statement</h3>
        </div>

        <?php
        $problemTitle = $_GET["para1"];

        $fullProblemArray = searchForProblemContent($problemTitle);
//        echo "Problem is $problemTitle <br>";
        //echo "<strong> desc:".$fullProblemArray[3]."</strong><br><br>";

        function searchForProblemContent ($passedProblemTitle){
            $file = file_get_contents('problems.txt', true);
            $n = explode("\n", $file);
            foreach($n as $line){
                $problemArray = explode("\t", $line);
                if($problemArray[0] == $passedProblemTitle){
                    return $problemArray;
                }
            }
        }

//        echo "Here is the first item of the problem array.$fullProblemArray[0]";

        $checkerFile = file_get_contents("../assignments/".$fullProblemArray[0]."/".$fullProblemArray[2], true);
        echo "<div id = 'problemStatement'>
                                <div id='problemTitle'><strong>".$fullProblemArray[0]."</strong></div>
                                <div id='problemDescrption'>Problem Description</div>
                                <div>".$fullProblemArray[1]."</div>
                                <br>
                                <div id='inputFile'>
                                    <div> Test Input</div>
                                    <div>".$checkerFile."</div>
                                </div>
                                <div>
                                    <div><strong> Note: your code must meet the following conditions</strong></div><br>
                                    <span>Time limit: ".$fullProblemArray[4]." </span><br>
                                    <span>Memory Limit: .$fullProblemArray[5].</span><br>
                                </div>
                            </div>"
        ?>

        <div id="testInput">
            <form>
                <div>
                    <label>
                        Input sample values
                    </label>

                    <div>
                        <textarea spellcheck="true" rows="4" cols="10" tabindex="5" class="textArea"></textarea>
                    </div>
                    <div>
                        <label>
                            Output values
                        </label>
                        <div>
                            <textarea spellcheck="true" rows="4" cols="10" tabindex="5" class="textArea"></textarea>
                        </div>
                    </div>
                    <input type="submit"/>
                </div>
            </form>
        </div>

        <div id="submissionField">
            <br>

            <div id="formStyle">
                <div><span>Make your Submission from here</span></div>
                <form method="POST" action="autograderupload.php" enctype="multipart/form-data">
                    <input type="file" name = "filename">
                    <input type="submit" name="submittedCode">
                </form>
            </div>
        </div>

    </div>

</div>

</body>
</html>
