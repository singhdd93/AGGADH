<?php include './includes/header.php'; ?>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Add Subject</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">
            <div class="col-lg-8">

                <div class="container-fluid">
                    <p class="col-lg-3">Subject Name</p> <p class="col-lg-1">:</p><input class=" form-control col-lg-8" name="sname" type="text" placeholder="Subject Name" />
                </div>
                <div class="container-fluid">
                    <p class="col-lg-3">Subject Slug</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="sslug" type="text" placeholder="Subject Slug" />
                </div>
                <div class="container-fluid">
                    <input class="btn btn-primary col-lg-6" name="subject" type="submit" value="Add Subject" />
                </div>

            </div>

            <div class="col-lg-4">

                <div class="container-fluid">
                    <div class="branch-list">
                        <? $arr = getBranches();
                        while($row = $arr->fetch_array())
                        {?>
                        <div class="branch-row">
                        <div class="col-lg-2"><input type="checkbox" name="branch[]" value="<? echo $row['branch_id']; ?>" />
                        </div>
                        <div class="col-lg-10"><span><? echo $row['branch_name'];?></span></div>
                        </div>
                        <?}
?>
                    </div>

                </div>

            </div>

        </form>

        <?
        if (isset($_POST['subject'])) {
            $sName = $_POST['sname'];
            $sSLug = $_POST['sslug'];
            $braches = $_POST['branch'];
            $sub_id = addSubject($sName, $sSLug);
            $rows = mapSubjectToBranches($braches, $sub_id);
            echo "<p>"."Subject has been added to $rows Branches"."</p>";
           // $rows = addBranch($bName, $bSLug);
            //if ($rows > 0) {
            //    echo "<p> $rows Branch Added </p> ";
           // }
        }
        ?>
    </div>
</div>

<? include './includes/footer.php'; ?>
