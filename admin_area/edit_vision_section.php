<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<?php

$get_vision = "select * from vision";

$run_vision = mysqli_query($con,$get_vision);

$row_vision = mysqli_fetch_array($run_vision);

$header= $row_vision['header'];
$statement=$row_vision['statement'];
$img= $row_vision['image'];


?>

<div class="row">
    <!-- 1 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <ol class="breadcrumb">
            <!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Edit Vision section

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

                    <i class="fa fa-money fa-fw"></i> Edit Vision Section

                </h3>

            </div><!-- panel-heading Ends -->

            <div class="panel-body">
                <!-- panel-body Starts -->

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <!-- form-horizontal Starts -->

                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-md-3 control-label">Header </label>

                        <div class="col-md-6">

                            <input type="text" name="header" class="form-control" value="<?php echo $header; ?>" required>
                    
                        </div>

                    </div><!-- form-group Ends -->





                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-md-3 control-label"> Statement : </label>

                        <div class="col-md-8">

                            <textarea name="statement" id="about_desc" class="form-control" rows="10">

                                <?php echo $statement; ?>

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

                            <input type="submit" name="update" value="Update Vision Section"
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
$header=$_POST['header'];
$statement = $_POST['statement'];
$image = $_FILES['box_image']['name'];
$temp_name = $_FILES['box_image']['tmp_name'];
move_uploaded_file($temp_name,"slides_images/$image");
$update_vision = 'update vision set header="'.$header.'",statement="'.$statement.'",image="'.$image.'"';

$run_vision = mysqli_query($con,$update_vision);

if($run_vision){

echo "<script>alert('Vision section Has Been Updated')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

else{
  echo mysqli_error($con);
}

}

?>


<?php } ?>