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
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Category</a></li>
                          <li><a href="#">Easy</a></li> 
                          <li><a href="#">Medium</a></li> 
                          <li><a href="#">Hard</a></li> 
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search Problem</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="../account/signup.php"><span class="glyphicon glyphicon-user"></span><?php echo $_GET['user'];?></a></li>
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
                <h3>Choose Problem to Try</h3>
                <p>click on the problem</p>
                <div class="list-group">
                <?php
                  //print_r($result);
                  while($row = $result->fetch_assoc()) {
                    echo " <a href='problem.php?id=" . $row['problemId']. "&user=".$_GET['user']."' class='list-group-item'>
                    <h4 class='list-group-item-heading'>". $row['problemTitle']."</h4>
                    <p class='list-group-item-text'>" . $row["problemDescription"]. "</p>
                  </a>";
                  }
                ?>  
                    <a href="problem.php" class="list-group-item">
                      <h4 class="list-group-item-heading">First List Group Item Heading</h4>
                      <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="problem.php" class="list-group-item">
                      <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
                      <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    
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