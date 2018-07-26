<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\custom.css">
    <script src="../node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  </head>
  <body>
    <?php
      require_once('../account/connect.php');
      $sql = "SELECT * FROM `problem` WHERE 1";
      $result = $conn->query($sql);
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
                        <a class="navbar-brand" href="#">Programming Assignment Autograder</a>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <li ><a href="#">Home</a></li>
                          <li ><a href="admin.php">Add Problem</a></li>
                          <?php
                            echo "<li class='active'><a href='problems.php?user=".$_GET['user']."'>Problems</a></li>";
                            echo "<li><a href='students.php?user=".$_GET['user']."'>Students</a></li>"; 
                          ?>
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="../account/signup.php"><span class="glyphicon glyphicon-user"></span><?php echo substr($_GET['user'], 0, 5)."...";?></a></li>
                          <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
        
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <?php
            if(isset($_GET['studentId'])){
              echo "<button> back</button>";
              $sqlProblemsAttempettedByStudent = "SELECT * FROM `studentSubmissions` WHERE email = '".$_GET['studentId']."'";
              $resultsForStudent = $conn->query($sqlProblemsAttempettedByStudent);
              echo "<div class='container-fluid'>
                <h3>Problems Attempted by ".getStudentNameFromEmail($conn, $_GET['studentId'])."</h3>
                <div class='list-group'>";
              while($row_temp = $resultsForStudent->fetch_assoc()){
                echo " <a href='#' class='list-group-item'>
                  <h4 class='list-group-item-heading'>". getProblemTitleFromProblemId($conn, $row_temp['problemId']). "</h4>
                  <p class='list-group-item-text'> Click to view Students submission</p>
                </a>";
                
              }
            }else{
              if(isset($_GET['id'])){
                echo "<button> back</button>";
                $sql2 = "SELECT * FROM `studentSubmissions` WHERE problemId = '".$_GET['id']."'";
                $result2 = $conn->query($sql2);
                echo "<div class='container-fluid'>
                <h3>Students the Attempted ".getIdToProblemName($conn, $_GET['id'])."</h3>
                <div class='list-group'>";
                while($row2 = $result2->fetch_assoc()){
                  $sql3 = "SELECT * FROM `user` WHERE email = '".$row2['email']."'";
                  $result3 = $conn->query($sql3);
                  $studentsName = "";
                  $studentEmail = "";
                  if($row3 = $result3->fetch_assoc()){
                    $studentsName = $row3['firstName']." ".$row3['secondName'];
                    $studentEmail = $row3['email'];
                  }
                  echo " <a href='problems.php?id=" . $row2['problemId']. "&user=".$_GET['user']."' class='list-group-item'>
                  <h4 class='list-group-item-heading'>". $studentsName."</h4>
                  <p class='list-group-item-text'> Click to view Students submission</p>
                  </a>";
                }
              }else{
                echo "<div class='container-fluid'>
                  <h3>Choose Problem to View Attempts</h3>
                  <p>click on the problem</p>
                  <div class='list-group'>";
                  while($row = $result->fetch_assoc()){
                    echo " <a href='problems.php?id=" . $row['problemId']. "&user=".$_GET['user']."' class='list-group-item'>
                    <h4 class='list-group-item-heading'>". $row['problemTitle']."</h4>
                    <p class='list-group-item-text'>" . $row["problemDescription"]. "</p>
                  </a>";
                }
              }
            }
            
            function getProblemTitleFromProblemId($conn, $id){
              $problemTitle = "";
              $sql = "SELECT * FROM `problem` WHERE problemId = '".$id."'";
              if($rowTemp2 = $conn->query($sql)->fetch_assoc()){
                $problemTitle = $rowTemp2['problemTitle'];
              }
              return $problemTitle;
            }

            function getProblemDescriptionFromProblemId($conn, $id){
              $problemDescription = "";
              $sql = "SELECT * FROM `problem` WHERE problemId = '".$id."'";
              if($rowTemp2 = $conn->query($sql)->fetch_assoc()){
                $problemDescription = $rowTemp['problemDescription'];
              }
              return $problemTitle;
            }

            function getStudentNameFromEmail($conn, $email){
              $name = "";
              $idToProblemName = "SELECT * FROM `user` WHERE email = '".$email."'";
              if($rowTemp = $conn->query($idToProblemName)->fetch_assoc()){
                $name = $rowTemp['firstName']." ".$rowTemp['secondName'];
              }
              return $name;
            }

            function getIdToProblemName($conn, $id){
              $name = "";
              $idToProblemName = "SELECT problemTitle FROM `problem` WHERE problemId = '".$id."'";
              if($rowTemp = $conn->query($idToProblemName)->fetch_assoc()){
                $name = $rowTemp['problemTitle'];
              }
              return $name;
            }
          ?>
            </div> 
          </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-12"></div>
    </div>
    </body>
</html>