<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php 
        if(isset($_SESSION['user']))
        {
            header("location:profile.php");
        }
?>
    </head>
    <body>
        <form  class="login" method="post" action="profile.php">
            <input type="text" name="user_name" value="" />
            <input type="password" name="pass" value="" />
            <input type="submit" name="sub" value="Login"/>
        </form>
       
    </body>
</html>
