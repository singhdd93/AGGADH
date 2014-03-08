<?php
include './header.php';

function getProfileid() {
    $pi = uniqid();
    $pis = hexdec($pi);
    $len = strlen($pis);
    $st = $len - 8;
    $ret_id = substr($pis, $st);
    return $ret_id;
}
?>

<div id="page-title">

    <div id="page-title-inner">

        <!-- start: Container -->
        <div class="container">

            <h2><i class="ico-stats ico-white"></i>Sign Up</h2>

        </div>
        <!-- end: Container  -->

    </div>	

</div>
<!-- end: Page Title -->

<!--start: Wrapper-->
<div id="wrapper">

    <!--start: Container -->
    <div class="container">

        <!--start: Row -->
        <div class="row">

            <div class="span12">


                <div class="message">

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
                            echo "<p>" . 'YOu have Entered the Email : ' . "$em". "</p>";
                            echo "<p>" . " You are already registered. Login to enter." . "</p>";
                            $q->close();
                            $conn->close();
                        } else {
                            $q->close();

                            $insquery = "INSERT INTO users_reg(`email`,`password`,`profile_id`,`confirm_code`) VALUES(?,?,?,?)";
                            $qs = $conn->prepare($insquery);

                            if ($qs === FALSE) {
                                trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $qs->bind_param('ssis', $ems, $pass, $pid, $cc);
                            $ems = $em;
                            $pass = sha1($psd) . md5($psd);
                            $pid = getProfileid();
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

                                $headers = "From: singh.damandeep@gmail.com \r\n";
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

                </div>




            </div>	



        </div>
        <!--end: Row-->

    </div>
    <!--end: Container-->



</div>
<!-- end: Wrapper  -->	



<? include './footer.php'; ?>

