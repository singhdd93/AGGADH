<?php include './includes/header.php';?>
<div class="container">
    <div class="container-fluid">
        <h2>Branches</h2>
        <table class="table table-responsive table-striped">
            <tr>
                <td><h4>Branch Name</h4></td>
                <td><h4>Branch Slug</h4></td>
                <td><h4>Edit</h4></td>
                <td><h4>Delete</h4></td>
            </tr>
        <?php 
        if(isset($_GET['delete']))
        {
            $r = deleteBranch($_GET['id']);
            
        }
        $arr = getBranches();
        
        while($row = $arr->fetch_array())
                     {
            ?>
            <tr>
                <td><span><? echo $row['branch_name']; ?></span></td>
                <td><span><? echo $row['bn_slug']; ?></span></td>
                <td><a class="btn btn-default" href="branch-edit.php?edit=1&id=<? echo $row['branch_id'];?>">EDIT</a></td>
                <td><a class="btn btn-default" onclick="return confirm('Sure, you wanna do this ?')" href="branch-list.php?delete=1&id=<? echo $row['branch_id'];?>">DELETE</a></td>
            </tr>
                        
                    <? }  ?>
        </table>
        
        <?php 
        if(isset($r) && $r > 0)
            {
                echo "<p>"."$r Branch was deleted"."</p>";
            }
        ?>
        </div>
</div>

<? include './includes/footer.php';?>