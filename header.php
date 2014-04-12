<? session_start();
ob_start();?><!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>AGGADH</title> 
        <meta name="description" content="AGGADH"/>
        <meta name="keywords" content="AGGADH,e-learning,quiz,application" />
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: Facebook Open Graph -->
        <meta property="og:title" content=""/>
        <meta property="og:description" content=""/>
        <meta property="og:type" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:image" content=""/>
        <!-- end: Facebook Open Graph -->

        <?
        include './includes/functions.php';
        if (!isset($_SESSION['user'])) {
            ?>
            <script type="text/javascript">
                // alert("Not Logged In");
            </script>   

            <?
        }

        function echoActiveClassIfRequestMatches($requestUri) {
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'active';
        }
        ?>



        <!-- start: CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
        <!-- end: CSS -->


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>
    <body>

        <!--start: Header -->
        <header>

            <!--start: Container -->
            <div class="container">

                <!--start: Row -->
                <div class="row">

                    <!--start: Logo -->
                    <div class="logo span3">

                        <a class="brand" href="index.php"><img src="img/logo.png" alt="Logo"></a>

                    </div>
                    <!--end: Logo -->

                    <!--start: Navigation -->
                    <div class="span9">

                        <div class="navbar navbar-inverse">
                            <div class="navbar-inner">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                      
                                        <li class="<?=echoActiveClassIfRequestMatches("index")?>"><a href="index.php">Home</a></li>
                                        <li class="<?=echoActiveClassIfRequestMatches("about")?>"><a href="about.php">About</a></li>
                                        <li class="<?=echoActiveClassIfRequestMatches("services")?>"><a href="">Services</a></li>
                                        <li class="<?=echoActiveClassIfRequestMatches("contact")?>"><a href="">Contact</a></li>
                                        <? if(!isset($_SESSION['user'])) {?> <li class="<?=echoActiveClassIfRequestMatches("signup")?>"><a href="signup.php">Sign Up</a></li> <? } ?>
                                        <? if(!isset($_SESSION['user']))
                                        {?>
                                        <li class="dropdown ">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log In <b class="caret"></b></a>

                                            <div class="login-form dropdown-menu">
                                                <form  method="post" action="logincheck.php">
                                            <ul class="">
                                                
                                                    
                                                        <li>
                                                            <div class="input2">
                                                                <input type="text" name="user_name" value="" placeholder="Username"/>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input2">
                                                                <input type="password" name="pass" value="" placeholder="Password"/>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="actions2">
                                                                <input type="submit" name="sub" value="Login"/>
                                                            </div>
                                                        </li>                                                
                                            </ul>
                                                    </form>
                                                 </div>
                                        </li>
                                        <? }
                                        ?>
                                        
                                        <? if(isset($_SESSION['user']))
                                        {
                                            $info=  getUserInfo($_SESSION['user']);?>
                                        <li class="dropdown <?=echoActiveClassIfRequestMatches("profile")?>">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><? echo $info['name'] ?> <b class="caret"></b></a>

                                            
                                            <ul class="dropdown-menu">                                 
                                                        <li>
                                                            <a href="profile.php">My Profile</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="logout.php">Logout</a></li>                                                                 
                                            </ul>                                                 
                                        </li>
                                        <? }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>	
                    <!--end: Navigation -->

                </div>
                <!--end: Row -->

            </div>
            <!--end: Container-->			

        </header>
        <!--end: Header-->