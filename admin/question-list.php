<?php include './includes/header.php';?>

<div class="container-fluid">
        <h2>Questions</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">
        <div class="container-fluid">
                <p class="col-lg-3">Select Subject</p> <p class="col-lg-1">:</p>
                <select  id="add_select" class="form-control col-lg-6" name="subjects" required="required">
                    <option value="" label="Subject" selected="selected">Subject</option>
                    <?
                    $arr = getSubjects();

                    while ($row = $arr->fetch_array()) {
                        ?>
                        <option value="<? echo $row['sub_id']; ?>" label="<? echo $row['sub_name'] ?>"><? echo $row['sub_name'] ?></option>
                    <? }
                    ?>
                </select>
                <input type="submit" class="col-lg-2 btn btn-large btn-primary" value="Display" name="disp"/> 
        </div>
        </form>
</div>


<? include './includes/footer.php';?>