<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <?php include 'includes/db.php' ?>
    </head>
    <body>
        <?php
        if (isset($_POST['sub'])) {
            $un = $_POST['user_name'];
            $ps = $_POST['pass'];
            $query = "Select profile_id from users_info WHERE user_name= ? ";


            $a = $conn->prepare($query);
            if ($a === FALSE) {
                trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
            }
            $a->bind_param('s', $un);
            $a->execute();

            echo "$un" . "Pass: " . "$ps";
            ?>
            <script type="text/javascript">
                alert("Logged In");
            </script>
    <?php
}
?>
    </body>
</html>
