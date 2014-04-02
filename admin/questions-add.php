<?php include './includes/header.php'; ?>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Add Question</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">

            <div class="container-fluid">
                <p class="col-lg-3">Select Level</p> <p class="col-lg-1">:</p>
                <select  id="add_select" class="form-control col-lg-8" name="ques_level" required="required">
                    <option value="" label="qlevel" selected="selected">Level</option>
                    <?
                    $arr = getLevels();

                    while ($row = $arr->fetch_array()) {
                        ?>
                        <option value="<? echo $row['level_id']; ?>" label="<? echo $row['level_name'] ?>"><? echo $row['level_name'] ?></option>
                    <? }
                    ?>
                </select>
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Question</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="ques" type="text" placeholder="Write Question" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Option A</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="opt_a" type="text" placeholder="Option A" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Option B</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="opt_b" type="text" placeholder="Option B" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Option C</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="opt_c" type="text" placeholder="Option C" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Option D</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="opt_d" type="text" placeholder="Option D" />
            </div>
            <div class="container-fluid">
                <p class="col-lg-3">Correct Option</p> <p class="col-lg-1">:</p>
                
                <div class="container-fluid">
                    <div class="options-list">
                        <ul>
                            <li><input class="form-control col-lg-8" name="corr_opt" type="radio" value="a"/> <label> Option A </label> </li>
                            <li><input class="form-control col-lg-8" name="corr_opt" type="radio" value="b"/> <label> Option B </label> </li>
                            <li><input class="form-control col-lg-8" name="corr_opt" type="radio" value="c"/> <label> Option C </label> </li>
                            <li><input class="form-control col-lg-8" name="corr_opt" type="radio" value="d"/> <label> Option D </label> </li>
                        </ul>
                    </div>

                </div>
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
                <p class="col-lg-3">Select Topic</p> <p class="col-lg-1">:</p>
                <select  id="add_tselect" class="form-control col-lg-8" name="topics" required="required">
                    <option value="" label="Topic" selected="selected">Topic</option>
                    <?
                    $arr = getTopics();

                    while ($row = $arr->fetch_array()) {
                        ?>
                        <option value="<? echo $row['topic_id']; ?>" label="<? echo $row['topic_name'] ?>"><? echo $row['topic_name'] ?></option>
                    <? }
                    ?>
                </select>
            </div>
            <div class="container-fluid">
                <input class="btn btn-primary col-lg-6" name="question" type="submit" value="Add Question" />
            </div>
        <?
        if (isset($_POST['question'])) {
           $ques_level = $_POST['ques_level'];
           $ques = $_POST['ques'];
           $opt_a = $_POST['opt_a'];
           $opt_b = $_POST['opt_b'];
           $opt_c = $_POST['opt_c'];
           $opt_d = $_POST['opt_d'];
           $corr_opt = $_POST['corr_opt'];
           $subjects = $_POST['subjects'];
           $topics = $_POST['topics'];
           
           $sub = getSubjectInfo($subjects);
           $sub_slug = $sub[1];
           
           $num = addQuestion($sub_slug, $ques, $opt_a, $opt_b, $opt_c, $opt_d, $corr_opt, $ques_level, $topics);
           
           if(isset($num))
           {
               echo "<p>$num questions inserted.</p>";
           }
        }
        ?>



        </form>

    </div>
</div>

<? include './includes/footer.php'; ?>