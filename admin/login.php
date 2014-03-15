<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AGGADH Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">AGGADH</a>
        </div>
        
        <ul class="nav navbar-nav navbar-right">
            
            
            <li class="dropdown user-dropdown">
              <a href="#" ><i class="fa fa-user"></i> Login </a>
              
            </li>
          </ul>
        </nav>
        
        <div class="row">
          <div class="col-lg-12">
              <div class="login-form">
                  <img src="../img/logo-footer-menu.png" />
            <h2>Admin's Log In</h2>
            <form method="post" action="index.php">
                                <input type="text" name="admin_us_name" placeholder="User Name" />
                                <br/>
                                <input type="password" name="admin_pass" placeholder="Password" />                               
                                <br/>
                                <input type="submit" name="admin_login" value="Login" />
                            </form>
              </div>
              
          </div>
        </div>


    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>

                            
                        