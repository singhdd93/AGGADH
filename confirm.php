<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation Sent</title>
        <?php include 'includes/db.php' ;
        
        function random_numbers($digits) 
            {
            $min = pow(10, $digits - 1);
            $max = pow(10, $digits) - 1;
            return mt_rand($min, $max);
            }
    ?>;

    </head>
    <body>
        <p>We have sent you a confimation email. Kindly click on the link 
        provided in the mail to activate your account.<br>
        Thankyou! </p>
        <?php
        // put your code here
        if(isset($_POST['submit']))
    {
        $em=$_POST['email'];
        $psd=$_POST['pass'];
        $query="Select * from users_reg WHERE email= ? ";
        
        $q=$conn->prepare($query);
        if($q === FALSE)
        {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        $q->bind_param('s',$em);
        $q->execute();
        
        if($q->num_rows>0)
        {
            echo "<p>"." You are already registered. Login to enter."."</p>";
        }
 else {
     $pid=random_numbers(10);
     $cc= md5($em);
     $query="INSERT INTO users_reg VALUES(NULL,$em,$psd,$pid,$cc)"; 
 }
    }
        ?>
    </body>
</html>
