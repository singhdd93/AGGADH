<?php include './includes/header.php';

$row = getBranchInfo($_GET['id']);?>

<div class="row">
    <div class="container">
        <h2>Edit Branch</h2>
        <form action="branch-edit.php?id=<? echo $_GET['id']; ?>" method="post" class="add-form">
        <div class="container-fluid">
            <p class="col-lg-3">Branch Name</p> <p class="col-lg-1">:</p><input class=" form-control col-lg-8" name="bname" type="text"  value="<? echo $row[0]; ?>" placeholder="Brach Name" />
        </div>
        <div class="container-fluid">
            <p class="col-lg-3">Branch Slug</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="bslug" value="<? echo $row[1]; ?>" type="text" placeholder="Brach Slug" />
        </div>
        <div class="container-fluid">
            <input class="btn btn-primary col-lg-6" name="branch" type="submit" value="Update Branch" />
        </div>
        </form>
    
<? 
if(isset($_POST['branch']))
{
    $bName = $_POST['bname'];
    $bSLug = $_POST['bslug'];
    $rows = updateBranch($bName, $bSLug, $_GET['id']);
    if($rows > 0)
    {
    echo "<p> $rows Branch Updated </p> ";
    }
}
?>
        </div>
</div>

<? include './includes/footer.php';?>
