<?php include './includes/header.php';?>

    <div class="container-fluid">
        <h2>Add Level</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="add-form">
        <div class="container-fluid">
            <p class="col-lg-3">Level Name</p> <p class="col-lg-1">:</p><input class=" form-control col-lg-8" name="lname" type="text" placeholder="Level Name" />
        </div>
        <div class="container-fluid">
            <input class="btn btn-primary col-lg-6" name="level" type="submit" value="Add Level" />
        </div>
        </form>
    
<? 
if(isset($_POST['level']))
{
    $lName = $_POST['lname'];
    $rows = addLevel($lName);
    if($rows > 0)
    {
    echo "<p> $rows Level Added </p> ";
    }
}
?>
        </div>

<? include './includes/footer.php';?>
