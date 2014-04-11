<?php include './includes/header.php';?>

<div class="container-fluid">
        <h2>Questions</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="add-form">
        <div class="container-fluid">
                <p class="col-lg-3">Select Subject</p> <p class="col-lg-1">:</p>
                <select  id="subselect" class="form-control col-lg-8" name="subjects" required="required">
                    <option value="" label="Subject" selected="selected">Subject</option>
                    <?
                    $arr = getSubjects();

                    while ($row = $arr->fetch_array()) {
                        ?>
                        <option value="<? echo $row['sub_slug']; ?>" label="<? echo $row['sub_name'] ?>"><? echo $row['sub_name'] ?></option>
                    <? }
                    ?>
                </select>
        </div>
            <div class="container-fluid">
                <input type="submit" class="col-lg-12 btn btn-large btn-primary" value="Display" name="disp"/> 
        </div>
        </form>
        
        
        
        <table class="table table-responsive table-striped">
            <tr>
                <td><h4>Question</h4></td>
                <td><h4>Topic</h4></td>
                <td><h4>Option A</h4></td>
                <td><h4>Option B</h4></td>
                <td><h4>Option C</h4></td>
                <td><h4>Option D</h4></td>
                <td><h4>Correct Option</h4></td>
                <td><h4>Level</h4></td>
                <td><h4>Delete</h4></td>
                <td><h4>Edit</h4></td>
            </tr>
        
        <?php
            if(isset($_POST['disp']))
            {
                $sub_slug = $_POST['subjects'];
                
               $arr = getQuestions($sub_slug);
               
               while($row = $arr->fetch_array())
               {
                   ?> 
            <tr>
                <td><span><? echo htmlspecialchars($row['quest']); ?></span></td>
                <td><span><? $topic_info = getTopicInfo($row['topic_id']); echo $topic_info[0]; ?></span></td>
                <td><span><? echo htmlspecialchars($row['op_a']); ?></span></td>
                <td><span><? echo htmlspecialchars($row['op_b']); ?></span></td>
                <td><span><? echo htmlspecialchars($row['op_c']); ?></span></td>
                <td><span><? echo htmlspecialchars($row['op_d']); ?></span></td>
                <td><span><? echo $row['c_ans']; ?></span></td>
                <td><span><? echo getLevelInfo($row['level_id']); ?></span></td>
                <td><a class="btn btn-default" href="question-edit.php?edit=1&id=<? echo $row['quest_id'];?>">EDIT</a></td>
                <td><a class="btn btn-default" onclick="return confirm('Sure, you wanna do this ?')" href="question-list.php?delete=1&id=<? echo $row['quest_id'];?>">DELETE</a></td>
            </tr>
    
              <? }
                
            }
        ?>
            
        </table>
</div>


<? include './includes/footer.php';?>
<script type="text/javascript">
                            $(document).ready(function (){
                                
                                $('#subselect').val('<?php if(isset($_POST['disp'])){echo $_POST['subjects'];} ?>');
                                
                            });
                        </script>