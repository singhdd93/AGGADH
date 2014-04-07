<? include './header.php'; ?>


<?php
if (isset($_POST['sub'])) {

    $ps = $_POST['pass'];
    $pidquery = "Select profile_id from users_info WHERE `user_name`= ? ";

    $a = $conn->prepare($pidquery);
    if ($a === FALSE) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $a->bind_param('s', $un);
    $un = $_POST['user_name'];
    $a->execute();
    $a->bind_result($pid);
    $a->fetch();
    $a->close();

    $psdquery = "Select password from users_reg WHERE `profile_id`= ?";
    $b = $conn->prepare($psdquery);
    if ($b === FALSE) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $b->bind_param('i', $pi);
    $pi = $pid;
    $b->execute();
    $b->bind_result($pss);
    $b->fetch();
    $b->close();

    $pass = sha1($ps) . md5($ps);

    if ($pss == $pass) {
        $_SESSION['user'] = $pid;
        //echo "Session ";
        header("location:profile.php");
    } else {
        //echo "$un";       
       header("location:login.php?error=1");
    }
}
?>
<?
 include './footer.php'; ?>