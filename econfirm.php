<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email Confirmation</title>
        <? include 'includes/db.php'; ?>
    </head>
    <body>
        <?php
        // put your code here
        if (isset($_GET['email']) && isset($_GET['code'])) {
            $checkq = "SELECT confirm_code, profile_id from users_reg WHERE `email` = ?";
            $q = $conn->prepare($checkq);
            if ($q === FALSE) {
                trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
            }
            $q->bind_param('s', $em);
            $em = $_GET['email'];
            $q->execute();
            $q->bind_result($cc, $pro);
            $q->fetch();
            $q->close();

            if ($cc == $_GET['code']) {
                $updateq = "UPDATE users_reg set `is_active` = ?, `confirm_code` = ? WHERE `email` = ?";
                $qss = $conn->prepare($updateq);
                if ($qss === FALSE) {
                    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                }
                $qss->bind_param('iss', $active, $con, $em);
                $active = 1;
                $con = 'confirmed';
                $qss->execute();
                $rows = $qss->affected_rows;
                if ($rows == 1) {
                    header("location:details.php?pro=$pro&h=0");
                } else {
                    echo "This id is already confirmed";
                }
                $qss->close();
                $conn->close();
            }
            else {
                    echo "This id is already confirmed";
                }
        }
        ?>
    </body>
</html>
