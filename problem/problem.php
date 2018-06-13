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

    <?php
      
      require_once('../account/connect.php');
      $sql = "SELECT * FROM `problem` WHERE problemId=".$_GET['id'];
      $result = $conn->query($sql)->fetch_assoc();
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
                        <a class="navbar-brand" href="problems.php">Programming Assignment Autograder</a>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="problems.php">Home</a></li>
                          <?php
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Category</a></li>";
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Easy</a></li>";
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Medium</a></li>";
                            echo "<li><a href='problems.php?user=".$_GET['user']."'>Hard</a></li>";
                          
                          ?>
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search Problem</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="../account/signup.php"><span class="glyphicon glyphicon-user"></span><?php echo $_GET['user']?></a></li>
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
                    <table class="table">
                      <thead>
                        <tr>
                        <th scope="col">Other Specification</th>
                        <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Test Input:</th>
                          <td>Test Input</td>
                        </tr>
                        <tr>
                          <th scope="row">Time Limit:</th>
                          <td><?php echo $result["timeLimit"]?></td>
                        </tr>
                        <tr>
                          <th scope="row">Memory Limit:</th>
                          <td><?php echo $result["memoryLimit"]?></td>
                        </tr>   
                    </table>
                  </div>


                  <?php
                    $sql2 = "SELECT * FROM `studentsubmissions` WHERE email = '".$_GET['user']."' AND problemId = '".$_GET['id']."'";
                    $result2 = $conn->query($sql2)->fetch_assoc();
                    $resultString = $result2["submission"];
                        
                    if($result2["result"]){
                      $resultPath = "";
                      $resultPath = "../filebase/student/results/r".$_GET["id"].".txt";
                      $resultsFile = file_get_contents($resultPath, true);
                      echo "<div class='panel panel-warning'>
                      <div class='panel-heading'> <h4 >previous results</h4></div>
                      <div class='panel-body'>
                        Here's your previous submision!<br>".
                        $resultsFile
                        ."
                      </div>
                    </div>";
                    }else{
                      echo "<div class='panel panel-warning'>
                      <div class='panel-heading'> <h4 >previous results</h4></div>
                      <div class='panel-body'>
                        No Previous results.
                      </div>
                    </div>";
                    }
                  ?>

                  <div class="panel panel-info">
                    <div class="panel-heading"> <h4 >Make your Submission</h4></div>
                    <div class="panel-body">
                    <form class="form-horizontal" <?php echo "action='results.php?id=".$_GET['id']."&user=".$_GET['user']."'"?> method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="file">Upload file:</label>
                      <div class="col-sm-6">
                        <input type="file" class="form-control" id="file" name="file">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-default">Submit</button>
                      </div>
                      </div> 
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-3">  
              <div class="panel panel-success">
                <div class="panel-heading"> <h4>Test your Program</h4></div>
                  <div class="panel-body">
                    <form class="form-horizontal"  method="POST">
                      <div class="form-group">
                        <label for="comment">Input Sample Values:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="comment">Output Results:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
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
