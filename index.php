<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include './includes/db.php';?>
    </head>
    <body>
        <?php
        // put your code here
        if($conn)
        {
            echo 'Connection Sucess';
        }
        else
        {
            echo 'Fail'; 
        }
        ?>
        <a href="login.php">Login</a>
    </body>
</html>
