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
                          <div id="logo_image" class="menu_items">
                            <img src="../img/logo.png" class="img-circle" alt="Logo" width="90" height="70">
                          </div>
                          <div class="menu_items" id="title_div">
                            <a class="navbar-brand" href="#"><h1>Programming Assignment Autograder</h1></a>
                          </div>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                    </div>
                  </nav>
        
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container-fluid">
                <h3>Welcome to prgramming Assignment Autograder</h3>
                <p>Login to continue <a href="../index.php"> login</a></p>
                
                <div class="panel-group">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"> <h4>SignUp</h4></div>
                      <div class="panel-body">
                          <form class="form-horizontal" action = "createAccount.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Email:</label>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control" id="email" name = "email" placeholder="Enter email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="fNmae">Fisrt Name:</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="fName" name = "fName" placeholder="Enter first name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="sNmae">Second Name:</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="sName" name = "sName" placeholder="Enter first name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Password:</label>
                                <div class="col-sm-9"> 
                                  <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
                                </div>
                              </div>
                              
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-default" value="Submit" name="Submit">create account</button>
                                  
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