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
                        <a class="navbar-brand" href="problems.php">Programming Assignment Autograder</a>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="problems.php  ">Home</a></li>
                          <li><a href="problems.php">Category</a></li>
                          <li><a href="problems.php">Easy</a></li>
                          <li><a href="problems.php">Medium</a></li>
                          <li><a href="problems.php">Hard</a></li>
                        </ul>
                        <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">search Problem</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>

    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container-fluid">
                <h3>A Summary of your Results</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading"> <h4>Results</h4></div>
                    <div class="panel-body">
                      <span>Here are your results</span>
                    </div>
                    <table class="table">
                      <tbody>
                        <tr class="success">
                          <th scope="row" >verdict:</th>
                          <td> Correct</td>
                        </tr>
                        <tr>
                          <th scope="row">Run-time:</th>
                          <td>256ms</td>
                        </tr>
                        <tr class="warning">
                          <th scope="row">Memory Usage:</th>
                          <td>200kb</td>
                        </tr>   
                    </table>
                  </div>
                  <div class="panel panel-info">
                    <div class="panel-heading"> <h4 >Make Another Submission</h4></div>
                    <div class="panel-body">
                    <form class="form-horizontal" <?php echo "action = 'results.php?id=".$_GET['id']."'"?> method="POST">
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Upload file:</label>
                      <div class="col-sm-6">
                        <input type="file" class="form-control" id="file">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"></div>
    </div>
    </body>
</html>
