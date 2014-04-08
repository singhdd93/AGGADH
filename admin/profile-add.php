<?php include './includes/header.php'; ?>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Profile</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">
 
            <div class="container-fluid">
                <p class="col-lg-3">Full Name</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="fname" type="text" placeholder="Full Name" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Username</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="uname" type="text" placeholder="Username" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Date Of Birth</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="dob" type="date" placeholder="Select" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Sex</p> <p class="col-lg-1">:</p>
                
                <div class="container-fluid">
                    <div class="options-list y">
                        <ul>
                            <li><input class="form-control col-lg-8" name="sex" type="radio" value="m"/> <label> Male </label> </li>
                            <li><input class="form-control col-lg-8" name="sex" type="radio" value="f"/> <label> Female </label> </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Contact Number</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="cnum" type="number" placeholder="Contact Number" />
            </div>
                        
            <div class="container-fluid">
                <input class="btn btn-primary col-lg-6" name="profile" type="submit" value="Create Profile" />
            </div>
        <?
        if (isset($_POST['profile'])) {
           $fname = $_POST['fname'];
           $uname = $_POST['uname'];
           $dob = $_POST['dob'];
           $sex = $_POST['sex'];
           $cnum = $_POST['cnum'];
              
           $num = addProfile($fname, $dob, $cnum, $sex, $uname);
           
           if(isset($num))
           {
               echo "<p>Profile created.</p>";
           }
        }
        ?>



        </form>

    </div>
</div>

<? include './includes/footer.php'; ?>