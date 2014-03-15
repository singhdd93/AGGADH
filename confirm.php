<?php include './header.php'; ?>

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

                        $row = getRowsFromEmail($em);
                        if ($row > 0) {
                            echo "<p>" . 'YOu have Entered the Email : ' . "$em". "</p>";
                            echo "<p>" . " You are already registered. Login to enter." . "</p>";
                            
                        } else {
                           

                            $rows = regNewUser($em, $psd);
                            
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

