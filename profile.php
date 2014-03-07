<? include './header.php';?>
        
        
        <? include 'includes/db.php' ?>
    
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

            ?>
            <script type="text/javascript">
                alert("Logged In");
            </script>
    <?php
}
?>
      <?  include './footer.php'; ?>