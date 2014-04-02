<?php include './includes/header.php';?>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Levels</h2>
        <table class="table table-responsive table-striped">
            <tr>
                <td><h4>Level Name</h4></td>
                <td><h4>Delete</h4></td>
            </tr>
        <?php 
        if(isset($_GET['delete']))
        {
            $r = deleteLevel($_GET['id']);
            
        }
        $arr = getLevels();
        
        while($row = $arr->fetch_array())
                     {
            ?>
            <tr>
                <td><span><? echo $row['level_name']; ?></span></td>
                <td><a class="btn btn-default" onclick="return confirm('Sure, you wanna do this ?')" href="level-list.php?delete=1&id=<? echo $row['level_id'];?>">DELETE</a></td>
            </tr>
                        
                    <? }  ?>
        </table>
        
        <?php 
        if(isset($r) && $r > 0)
            {
                echo "<p>"."$r Level was deleted"."</p>";
            }
        ?>
        </div>
</div>

<? include './includes/footer.php';?>