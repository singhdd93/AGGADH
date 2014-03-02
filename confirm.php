<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation</title>
        <?php
        include 'includes/db.php';

//        if($conn)
//        {
//            echo "Connection Sucess";
//        }

        function random_numbers($digits) {
            $min = pow(10, $digits - 1);
            $max = pow(10, $digits) - 1;
            $no = mt_rand($min, $max);
            $cquery = "Select * from users_reg WHERE `profile_id`= ? ;";

            $q = $conn->prepare($cquery);
            if ($q === FALSE) {
                trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
            }
            $q->bind_param('i', $no);
            $q->execute();
            $q->store_result();
            if ($q->num_rows > 0) {
                $q->close();
                random_numbers(10);
            } else {
                $q->close();
                return $no;
            }
        }
        ?>

    </head>
    <body>  
        <?php
        // put your code here
        if (isset($_POST['submit'])) {
            $em = $_POST['email'];
            $psd = $_POST['pass'];

            $getquery = "Select * from users_reg WHERE `email`= ? ;";

            $q = $conn->prepare($getquery);
            if ($q === FALSE) {
                trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
            }
            $q->bind_param('s', $em);
            $q->execute();
            $q->store_result();
            if ($q->num_rows > 0) {
                echo 'YOu have Entered the Email : ' . "$em";
                echo "<p>" . " You are already registered. Login to enter." . "</p>";
                $q->close();
                $conn->close();
            } else {
                $q->close();

                $insquery = "INSERT INTO users_reg(`email`,`password`,`profile_id`,`confirm_code`) VALUES(?,?,?,?)";
                $qs = $conn->prepare($insquery);

                if ($q1 === FALSE) {
                    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                }

                $qs->bind_param('ssis', $ems, $pass, $pid, $cc);
                $ems = $em;
                $pass = sha1($psd) . md5($psd);
                $pid = random_numbers(10);
                $cc = md5($em);
                $qs->execute();
                $rows = $qs->affected_rows;
                $qs->close();
                $conn->close();
                if ($rows == 1) {
                    $subject = 'Confirm your Email Address';
                    $message = "Dear User"
                            . " \n Please Click on the link below to confirm your "
                            . " E-mail Address \n "
                            . "http://learning.singhdd.com/econfirm.php?email=$em&code=$cc"
                            . "\n If you are unable to open link directly please copy and "
                            . "paste the link in your browser. \n Thanks";

                    $header = "From: singh.damandeep@gmail.com \r\n";
                    $param = "-f singh.damandeep@gmail.com";

                    $send_mail = mail($em, $subject, $message, $headers, $param);

                    if ($send_mail) {
                        echo "<p>" . 'We have sent you a confimation email. Kindly click on the link'
                        . ' provided in the mail to activate your account.' . "</p>";
                        echo "<p>" . 'Thankyou!' . "</p>";
                    } else {
                        echo "Problem Sending Mail";
                    }
                } else {
                    echo "Problem in Registration";
                }
            }
        }
        ?>
    </body>
</html>
