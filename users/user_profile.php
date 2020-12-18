<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['user_profile'])){

$edit_id = $_GET['user_profile'];

$get_user = "select * from user where user_id='$edit_id'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_id = $row_user['user_id'];


$user_name = $row_user['user_name'];
$user_email = $row_user['user_email'];


$user_pass = $row_user['user_pass'];

$user_image = $row_user['user_image'];

$new_user_image = $row_user['user_image'];

$user_address = $row_user['user_address'];

$user_job = $row_user['user_job'];
$user_role = $row_user['user_role'];
$user_contact = $row_user['user_contact'];

$user_about = $row_user['user_about'];



}



?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Edit Profile

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_name" class="form-control" required value="<?php echo $user_name; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_email" class="form-control" required value="<?php echo $user_email; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_pass" class="form-control" required value="<?php echo $user_pass; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Address: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_address" class="form-control" required value="<?php echo $user_address; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Job: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_job" class="form-control" required value="<?php echo $user_job; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Role: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_role" class="form-control" required value="<?php echo $user_role; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_contact" class="form-control" required value="<?php echo $user_contact; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User About: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<textarea name="user_about" class="form-control" rows="3"> <?php echo $user_about; ?> </textarea>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="user_image" class="form-control" >
<br>
<img src="images/<?Php echo $user_image; ?>" width="70" height="70" >

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="update" value="Update User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$user_name = $_POST['user_name'];

$user_email = $_POST['user_email'];

$user_pass = $_POST['user_pass'];

$user_address = $_POST['user_address'];

$user_job = $_POST['user_job'];
$user_role = $_POST['user_role'];
$user_contact = $_POST['user_contact'];

$user_about = $_POST['user_about'];


$user_image = $_FILES['user_image']['name'];

$temp_user_image = $_FILES['user_image']['tmp_name'];

move_uploaded_file($temp_user_image,"images/$user_image");

if(empty($user_image)){

$user_image = $new_user_image;

}

$update_user = "update user set user_name='$user_name',user_email='$user_email',user_pass='$user_pass',user_image='$user_image',user_contact='$admin_contact',user_address='$user_address',user_job='$user_job',user_role='$user_role',user_about='$user_about' where user_id='$user_id'";

$run_user = mysqli_query($con,$update_user);

if($run_user){

echo "<script>alert('User Has Been Updated successfully and login again')</script>";

echo "<script>window.open('../login.php','_self')</script>";

session_destroy();

}

}


?>



<?php }  ?>