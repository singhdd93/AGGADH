<?php include './includes/header.php';?>
<div class="container">
    <div class="container-fluid">
        <h2>Topics</h2>
        <table class="table table-responsive table-striped">
            <tr>
                <td><h4>Topic Name</h4></td>
                <td><h4>Topic Slug</h4></td>
                <td><h4>Subject</h4></td>
                <td><h4>Edit</h4></td>
                <td><h4>Delete</h4></td>
            </tr>
        <?php 
        if(isset($_GET['delete']))
        {
            $rr = deleteTopicMap($_GET['id']);
            $r = deleteTopic($_GET['id']);
            
        }
        $arr = getTopics();
        
        while($row = $arr->fetch_array())
                     {
            
            $topic_id = $row['topic_id'];
            $subjects = getSubjectIdsForTopics($topic_id);
            ?>
            <tr>
                <td><span><? echo $row['topic_name']; ?></span></td>
                <td><span><? echo $row['topic_slug']; ?></span></td>
                <td><span><? foreach ($subjects as $tid) {
            $bran = getSubjectInfo($tid);
            echo $bran[0]."<br/>";
        } ?></span></td>
                <td><a class="btn btn-default" href="topics-edit.php?edit=1&id=<? echo $row['sub_id'];?>">EDIT</a></td>
                <td><a class="btn btn-default" onclick="return confirm('Sure, you wanna do this ?')" href="topics-list.php?delete=1$slug=<? echo $row['topic_slug']; ?>&id=<? echo $row['topic_id'];?>">DELETE</a></td>
            </tr>
                        
                    <? }  ?>
        </table>
        
        <?php 
        
        if(isset($rr) && $rr > 0)
            {
                echo "<p>"."Topic removed from $rr Subjects"."</p>";
            }
        if(isset($r) && $r > 0)
            {
                echo "<p>"."$r Topic was deleted"."</p>";
            }
        ?>
        </div>
</div>

<? include './includes/footer.php';?>