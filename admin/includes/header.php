<?php session_start();
if(!isset($_SESSION['admin']))
{
    header("location:index.php");
}
require ("../includes/functions.php");?>
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
        <a class="navbar-brand" href="adminindex.php"><img src="../img/logo-footer-menu.png" /></a>
    </div>

    
    <div class="collapse navbar-collapse" id="main-menu-collapse">
      <ul class="nav navbar-nav">
          <? if(isset($_SESSION['admin']))
          {?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="branch-add.php">Add</a></li>
            <li><a href="branch-list.php">List All</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Subjects <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="subject-add.php">Add</a></li>
            <li><a href="subject-list.php">List All</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Topics <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Add</a></li>
            <li><a href="#">List All</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Questions <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Add</a></li>
            <li><a href="#">List All</a></li>
            <li><a href="#">List All Topics Wise</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">List All</a></li>
            <li><a href="#">List All</a></li>
          </ul>
        </li>
        <?
          }
          ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
            <? if(isset($_SESSION['admin']))
            { ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?$a=adminName($_SESSION['admin']); echo $a; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Other Admins</a></li>
            <li class="divider"></li>
            <li><a href="../admin/logout.php">Logout</a></li>
          </ul>
            <? }
 else {
     ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Login</a></li>
            <li class="divider"></li>
            <li><a href="#">Apply to become Admin</a></li>
            
          </ul>
          
 <?}
 ?>
 
        </li>
      </ul>
    </div>
  </div>
            
        </header> <!-- Header Ends -->