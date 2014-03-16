<?php include './includes/header.php';?>
<div class="row">
    <div class="container">
        <h2>Add Branch</h2>
        <form action="" method="post" class="add-form">
        <div class="container-fluid">
            <p class="col-lg-3">Branch Name</p> <p class="col-lg-1">:</p><input class=" form-control col-lg-8" name="bname" type="text" placeholder="Brach Name" />
        </div>
        <div class="container-fluid">
            <p class="col-lg-3">Branch Slug</p> <p class="col-lg-1">:</p><input class="form-control col-lg-8" name="bslug" type="text" placeholder="Brach Slug" />
        </div>
        <div class="container-fluid">
            <input class="btn btn-primary col-lg-6" name="branch" type="submit" value="Add Branch" />
        </div>
        </form>
    </div>
</div>


<? include './includes/footer.php';?>
