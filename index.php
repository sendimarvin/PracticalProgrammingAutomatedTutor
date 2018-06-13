<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\custom.css">
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
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
                            <img src="img/logo.png" class="img-circle" alt="Logo" width="90" height="70">
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
                <p>Login to continue <a href="account/signup.php"> signUp</a></p>
                <?php
                  if(isset($_GET['error'])){
                    echo "<p class='bg-danger'>".$_GET['error']."</p>";
                  }else{

                  }
                ?>
                
                <div class="panel-group">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"> <h4>Login/SignUp</h4></div>
                      <div class="panel-body">
                          <form class="form-horizontal" action = "account/request_login.php" method="POST">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="password">Password:</label>
                                <div class="col-sm-10"> 
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit"  name="submit" class="btn btn-default">login</button>
                                  
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