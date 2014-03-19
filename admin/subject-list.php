<?php include './includes/header.php';?>
<div class="container">
    <div class="container-fluid">
        <h2>Subjects</h2>
        <table class="table table-responsive table-striped">
            <tr>
                <td><h4>Subject Name</h4></td>
                <td><h4>Subject Slug</h4></td>
                <td><h4>Branches</h4></td>
                <td><h4>Edit</h4></td>
                <td><h4>Delete</h4></td>
            </tr>
        <?php 
        if(isset($_GET['delete']))
        {
            $rr = deleteSubjectMap($_GET['id']);
            $r = deleteSubject($_GET['id']);
            delSubjectsTable($_GET['slug']);
            
        }
        $arr = getSubjects();
        
        while($row = $arr->fetch_array())
                     {
            
            $sub_id = $row['sub_id'];
            $branches = getBranchIdsForSubject($sub_id);
            ?>
            <tr>
                <td><span><? echo $row['sub_name']; ?></span></td>
                <td><span><? echo $row['sub_slug']; ?></span></td>
                <td><span><? foreach ($branches as $bid) {
            $bran = getBranchInfo($bid);
            echo $bran[0]."<br/>";
        } ?></span></td>
                <td><a class="btn btn-default" href="subject-edit.php?edit=1&id=<? echo $row['sub_id'];?>">EDIT</a></td>
                <td><a class="btn btn-default" onclick="return confirm('Sure, you wanna do this ?')" href="subject-list.php?delete=1$slug=<? echo $row['sub_slug']; ?>&id=<? echo $row['sub_id'];?>">DELETE</a></td>
            </tr>
                        
                    <? }  ?>
        </table>
        
        <?php 
        
        if(isset($rr) && $rr > 0)
            {
                echo "<p>"."Subject removed from $rr Branches"."</p>";
            }
        if(isset($r) && $r > 0)
            {
                echo "<p>"."$r Subject was deleted"."</p>";
            }
        ?>
        </div>
</div>

<? include './includes/footer.php';?>