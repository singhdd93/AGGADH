<?php
session_start();
ob_start();
require ("../includes/functions.php");
if (isset($_SESSION['admin'])) {
    header("location:adminindex.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <title>AGGADH Admin</title>
    </head>
    <body>

        <!-- Header Start -->
        <header>
            <div class="navbar navbar-inverse navbar-static-top" >

                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="../img/logo-footer-menu.png" /></a>
                    </div>


                    <div class="collapse navbar-collapse" id="main-menu-collapse">


                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Login</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Apply to become Admin</a></li>

                                </ul>


                            </li>
                        </ul>
                    </div>
                </div>

        </header>


        <div class="row">
            <div class="container-fluid">

                <div class="container-fluid">
                    <div class="col-lg-12"><h1 class="mainheading"> AGGADH Admin Login</h1></div>
                </div>
                <div class="container-fluid">
                    <div class="alert alert-danger login-error"><h4> You have entered wrong Username/Password</h4><p>Please try again</p></div>
                </div>

                <div class="container-fluid">
                    <div class="col-lg-4"></div> 
                    <div class="col-lg-4">
                        <form  class="login-form" action="" method="post">
                            <input class="form-control" type="text" name="us_name" placeholder="User Name" />
                            <input class="form-control" type="password" name="us_pass" placeholder="Password" />
                            <input class="btn btn-primary btn-lg" type="submit" name="admin_login" value="Login" />
                        </form>
                    </div>

                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>

        <?php
        
        if (isset($_POST['admin_login'])) {
            $username = $_POST['us_name'];
            $password = md5($_POST['us_pass']);
            $a_id = adminLogin($username, $password);
            if ($a_id > 0) {
                $_SESSION['admin'] = $a_id;
                ob_start();
                header("location:adminindex.php");
                ob_flush();
            } else {
                ?>
                <style type="text/css">
                    .login-error{
                        display: block;
                    }
                </style>
    <?
    }
}
ob_end_flush();
?>  


<? include './includes/footer.php'; ?>