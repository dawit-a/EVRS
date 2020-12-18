<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<?php

$get_box = "select * from box";

$run_box = mysqli_query($con,$get_box);

$row_box = mysqli_fetch_array($run_box);

$content = $row_box['box_content'];

$img= $row_box['box_image'];


?>

<div class="row">
    <!-- 1 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <ol class="breadcrumb">
            <!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Edit Box section

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row">
    <!-- 2 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <div class="panel panel-default">
            <!-- panel panel-default Starts -->

            <div class="panel-heading">
                <!-- panel-heading Starts -->

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Edit Box Section

                </h3>

            </div><!-- panel-heading Ends -->

            <div class="panel-body">
                <!-- panel-body Starts -->

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <!-- form-horizontal Starts -->






                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-md-3 control-label"> Description : </label>

                        <div class="col-md-8">

                            <textarea name="content" id="about_desc" class="form-control" rows="10">

                                <?php echo $content; ?>

                            </textarea>

                        </div>

                    </div><!-- form-group Ends -->
                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-md-3 control-label">Image </label>

                        <div class="col-md-6">

                            <input type="file" name="box_image" class="form-control" required>
                            <br />
                            <img src="slides_images/<?Php echo $img; ?>" width="70" height="70">
                        </div>

                    </div><!-- form-group Ends -->


                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-md-3 control-label"> </label>

                        <div class="col-md-8">

                            <input type="submit" name="update" value="Update Box Section"
                                class="btn btn-primary form-control">

                        </div>

                    </div><!-- form-group Ends -->


                </form><!-- form-horizontal Ends -->

            </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$content = $_POST['content'];
$image = $_FILES['box_image']['name'];
$temp_name = $_FILES['box_image']['tmp_name'];
move_uploaded_file($temp_name,"slides_images/$image");
$update_box = "update box set box_content='$content',box_image='$image'";

$run_box = mysqli_query($con,$update_box);

if($run_box){

echo "<script>alert('Box Section Has Been Updated')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

else{
  echo mysqli_error($con);
}

}

?>


<?php } ?>