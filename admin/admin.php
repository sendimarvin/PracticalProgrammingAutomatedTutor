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

    
    <div class="row">
            <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span> 
                        </button>
                        <a class="navbar-brand" href="../problem/problems.php">Programming Assignment Autograder</a>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="../problem/problems.php">Home</a></li>
                          <li><a href="#">Add Problem</a></li>
                          <li><a href="../problem/problems.php">View Problems</a></li> 
                          <li><a href="../problem/problems.php">View Students</a></li> 
                          <li><a href="../problem/problems.php">Add Student</a></li> 
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search Problem</button>
                        </form>
                      </div>
                    </div>
                  </nav>
        
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="panel-group">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"> <h4>Add Problem</h4></div>
                      <div class="panel-body">
                          <form class="form-horizontal" action = "addproblem.php" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="problem_title">Problem Title:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="problem_title" name= "problem_title" placeholder="Enter problem name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="problem_description">Problem Description:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="problem_description" name="problem_description" placeholder="Enter description">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="input_file">Input File:</label>
                                <div class="col-sm-6">
                                  <input type="file" class="form-control" id="input_file" name="input_file" placeholder="browse file">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="checker_file">Checker File:</label>
                                <div class="col-sm-6">
                                  <input type="file" class="form-control" id="checker_file" name="checker_file" placeholder="Browse checker file">
                                </div>
                              </div>
                              <span class="text-center">Other</span>
                              <hr>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="time_limit">Time Limit:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="time_limit" name ="time_limit" placeholder="time limit">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="memory_limit">Memory Limit:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="memory_limit" name="memory_limit" placeholder="memory limit">
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                              </div>
                            </form>
                      </div>
                    </div>
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