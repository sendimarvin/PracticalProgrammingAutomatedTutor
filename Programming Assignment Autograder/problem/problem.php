<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\custom.css">
    <script src="../node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
    <script src="../node_modules\bootstrap\dist\js\custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  </head>
  <body>

<!--    --><?php
//
//      require_once('../account/connect.php');
//      $sql = "SELECT * FROM `problem` WHERE problemId=".$_GET['id'];
//      $result = $conn->query($sql)->fetch_assoc();
//    ?>

    <?php
        $id = $_GET["id"];
        $result = array();
        $file = "../filebase/problems/problems".$id.".txt";
        $file = fopen($file, 'r') or die("Can't open file".$file);
        $tabs = 0;
        $problemTitle = $problemDescription = "";
        while (!feof($file)) {
            $char = fgetc($file);
            if (!strcmp($char, "\t")) $tabs++;
            else if ($tabs == 0) $problemTitle = $problemTitle.$char;
            else if ($tabs == 1) $problemDescription = $problemDescription.$char;
            else if ($tabs == 2) break;
        }
        fclose($file);
        $result['problemTitle'] = $problemTitle;
        $result['problemDescription'] = $problemDescription;
        $inputFile = "../filebase/problems/assignment".$id."/input.txt";
        $outputFile = "../filebase/problems/assignment".$id."/output.txt";
    ?>
    <div class="row">
            <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        echo "<a class='navbar-brand' href='problems.php?user='".$_GET['user'].">Programming Assignment Autograder</a>";
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <?php
                            echo "<li class='active'><a href='problems.php?user=".$_GET['user']."'>Home</a></li>";
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Easy</a></li>";
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Hard</a></li>";
                          
                          ?>
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="../account/signup.php"><span class="glyphicon glyphicon-user"></span><?php echo substr($_GET['user'], 0,15)."...";?></a></li>
                          <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>

    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="container-fluid">
                <h3>Problem Statement</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading"> <h4><?php echo $result["problemTitle"]?></h4></div>
                    <div class="panel-body">
                      <span><?php echo $result["problemDescription"]?></span>
                    </div>
                  </div>

                  <div class="panel panel-info">
                    <div class="panel-heading"> <h4 >Make your Submission</h4></div>
                    <div class="panel-body">
                    <form class="form-horizontal" <?php echo "action='results.php?id=".$_GET['id']."&user=".$_GET['user']."'"?> method="POST" enctype="multipart/form-data">
<!--                      <div class="form-group">-->
<!--                        <label class="control-label col-sm-3" for="file">Upload file:</label>-->
<!--                      <div class="col-sm-6">-->
<!--                        <input type="file" class="form-control" id="file" name="filename">-->
<!--+                      </div>-->
<!--                      <div class="col-sm-3">-->
<!--                        <button type="submit" class="btn btn-default">Submit</button>-->
<!--                      </div>-->
<!--                      </div> -->
                        <input type="file" name = "filename">
                        <input type="submit" name="submittedCode">
                    </form>
                    </div>
                  </div>
                </div>
              </div>

              <?php
                $output = "your results";
                if(isset($_POST['submit'])){
                  $input = "";
                  $input = $_POST['inputValues'];
                  $output = $input;
                }else{

                }
              ?>


            <div class="col-md-3">  
              <div class="panel panel-success">
                <div class="panel-heading"> <h4>Test your Program</h4></div>
                  <div class="panel-body">
                    <form class="form-horizontal"  method="POST" action="#">
                      <div class="form-group">
                        <label for="inputValues">Input Sample Values:</label>
                        <textarea class="form-control" rows="3" id="inputValues" name="inputValues"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="outputResults">Output Results:</label>
                        <?php
                          echo "<textarea class='form-control' rows='3' id='outputResults' placeholder='$output' id='outputResults'></textarea>";
                        ?>
                      </div>
                      <button type="submit" class="btn btn-default" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            <div class="col-md-0"></div>
          </div>
          <div class="row">
            <div class="col-md-12"></div>
          </div>
    </body>
</html>
