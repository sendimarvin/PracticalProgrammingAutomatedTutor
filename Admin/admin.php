<!DOCTYPE html>
<html>
    <head>
        <title>Programming Asignment Autogradder Plugin</title>
        <link rel="stylesheet" type="text/css" href="../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../styles/admin.css">

    </head>

    <body>  
        <div id="top_div">
            <h3>Automated Assignment Autograder</h3>
            <h4>Admin Dashboard</h4>
        </div>
        <div id="body_div">
            <div id="formDiv">
                <form action="registerProblem.php" method="post" enctype="multipart/form-data">

                    <header style="text-align: center;">
                      <h2 >Add problem</h2>
                      <div>Enter problem specification</div>
                      <div id="status"> 
                        <?php
                          session_start();
                          echo "Problem:".$_SESSION["status"]." Has been successfully submitted";
                        ?>
                      </div>
                    </header>
                    
                    <div>
                      <label class="desc" id="title1" for="Field1">Problem Title</label>
                      <div>
                        <input id="Field1" name="problemTitle" type="text" class="field text fn" value="" size="8" tabindex="1">
                      </div>
                    </div>
                      
                    <div>
                      <label class="desc" id="title4" for="Field4">
                        Problem Description
                      </label>
                    
                      <div>
                        <textarea id="Field4" name="problemDescription" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
                      </div>
                    </div>

                    <div>
                        <label class="desc" id="title1" for="Field1">Input File</label>
                        <div>
                          <input id="Field1" name="inputFile" id="inputFile" type="file" class="field text fn" value="" size="8" tabindex="1">
                        </div>
                    </div>

                    <div>
                        <label class="desc" id="title1" for="Field1">Checker File</label>
                        <div>
                          <input id="Field1" name="checkerFile" id="checkerFile" type="file" class="field text fn" value="" size="8" tabindex="1">
                        </div>
                    </div>

                    <hr>
                    <div style="text-align: center;">Other Specifications (Optional)</div>
                    <div>
                        <label class="desc" id="title1" for="Field1">Time Limit</label>
                        <div>
                          <input id="Field1" name="timeLimit" type="text" class="field text fn" value="" size="8" tabindex="1">
                        </div>
                    </div>

                    <div>
                        <label class="desc" id="title1" for="Field1">Memory Limit</label>
                        <div>
                          <input id="Field1" name="memoryLimit" type="text" class="field text fn" value="" size="8" tabindex="1">
                        </div>
                    </div>

                    <div>
                          <div>
                            <input id="saveForm" name="saveForm" type="submit" value="Submit">
                      </div>
                      </div>
                    
                  </form>
            </div>
        </div>
        
    </body>
</html>