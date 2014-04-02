<?php include './includes/header.php'; ?>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Add Topic</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">

            <div class="container-fluid">
                <p class="col-lg-3">Topic Name</p> <p class="col-lg-1">:</p><input class=" form-control col-lg-8" name="sname" type="text" placeholder="Topic Name" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Topic Slug</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="sslug" type="text" placeholder="Topic Slug" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Select Subject</p> <p class="col-lg-1">:</p>
                <select  id="add_select" class="form-control col-lg-8" name="subjects" required="required">
                    <option value="" label="Subject" selected="selected">Subject</option>
                    <?
                    $arr = getSubjects();

                    while ($row = $arr->fetch_array()) {
                        ?>
                        <option value="<? echo $row['sub_id']; ?>" label="<? echo $row['sub_name'] ?>"><? echo $row['sub_name'] ?></option>
                    <? }
                    ?>
                </select>
            </div>
            <div class="container-fluid">
                <input class="btn btn-primary col-lg-6" name="topic" type="submit" value="Add Topic" />
            </div>




        </form>

        <?
        if (isset($_POST['topic'])) {
            $sName = $_POST['sname'];
            $sSLug = $_POST['sslug'];
            $subject_id = $_POST['subjects'];
            $topic_id = addTopic($sName, $sSLug);
            $rows = mapTopicToSubjects($topic_id, $subject_id);
            echo "<p>"."Topic has been added to $rows Subject"."</p>";
           
        }
        ?>
        
    </div>
</div>

<? include './includes/footer.php'; ?>