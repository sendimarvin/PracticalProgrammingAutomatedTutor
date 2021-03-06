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
      $sql = "SELECT * FROM `user` WHERE role != 'admin'";
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
                          <li ><a href="#">Add Problem</a></li>
                          <?php
                            echo "<li ><a href='problems.php?user=".$_GET['user']."'>Problems</a></li>";
                            echo "<li class='active'><a href='problems.php?user=".$_GET['user']."'>Students</a></li>"; 
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
            <div class="container-fluid">
                <h3>View Student Submission to Try</h3>
                <p>click on the student</p>
                <div class="list-group">
                <?php
                  while($row = $result->fetch_assoc()){
                    echo " <a href='problems.php?studentId=" . $row['email']. "&user=".$_GET['user']."' class='list-group-item'>
                    <h4 class='list-group-item-heading'>". $row['firstName']." ".$row['secondName']."</h4>
                    <p class='list-group-item-text'> View Problems Attempted by the Student</p>
                  </a>";
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