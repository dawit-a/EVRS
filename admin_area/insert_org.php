<?php
$conn= mysqli_connect("localhost","root","","vers");
if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

    

?>
<!DOCTYPE html>

<html>

<head>

<title> Organization registration  </title>




</head>

<body>




<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-plus-square-o"></i> Organization registration form

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization name</label>

<div class="col-md-6" >

<input type="text" name="org_name" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization email </label>

<div class="col-md-6" >

<input type="text" name="org_email" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Organization password </label>

<div class="col-md-6" >

<input type="password" name="org_pass" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization Priveledges  </label>

<div class="col-md-6 " >
<input type="checkbox" name="prev1" class=""  > Check user ID</br>
<input type="checkbox" name="prev2" class=""  > Get user information</br>
<input type="checkbox" name="prev3" class=""  > Generate statics</br>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization address </label>

<div class="col-md-6" >

<input type="text" name="org_address" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization Image </label>

<div class="col-md-6" >

<input type="file" name="image" class="form-control" required >

</div>

</div><!-- form-group Ends -->






<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization About </label>

<div class="col-md-6" >

<textarea name="org_about" class="form-control" rows="10" >


</textarea>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Register" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){
$org_name=$_POST['org_name'];
$org_email=$_POST['org_email'];
$org_pass=$_POST['org_pass'];

if(isset($_POST["prev1"]))
$prev1='yes';
else
$prev1="no";
if(isset($_POST["prev2"]))
$prev2='yes';
else
$prev2="no";
if(isset($_POST["prev3"]))
$prev3='yes';
else
$prev3="no";
$org_address=$_POST['org_address'];
$image = $_FILES['image']['name'];



$temp_name = $_FILES['image']['tmp_name'];


move_uploaded_file($temp_name,"images/$image");
$org_about=$_POST['org_about'];

$insert_user="insert into user (user_name,user_email,user_pass,user_image,user_address,user_role,user_about) values ('$org_name','$org_email','$org_pass','$image','$org_address','org','$org_about')";
$run_user = mysqli_query($con,$insert_user);

if($insert_user)
{
$get_user = "select user_id from user order by 1 DESC LIMIT 0,1";

$run_u = mysqli_query($con,$get_user);
$row_u=mysqli_fetch_array($run_u);
$user_id=$row_u['user_id'];


$insert_org="insert into orgs(org_name,org_email,org_pass,prev1,prev2,prev3,org_address,org_image,org_about,user_id,admin_name,admin_id) values('$org_name','$org_email','$org_pass','$prev1','$prev2','$prev3','$org_address','$image','$org_about',$user_id,'$admin_name',$admin_id)";


$run_org = mysqli_query($con,$insert_org);

}
if($run_org&&$run_user){

echo "<script>alert('Organization has been inserted successfully')</script>";
echo "<script>window.open('index.php?view_orgs','_self')</script>";

}

else{
    $er=mysqli_error($conn);
    echo mysqli_error($con);;
}



}

?>

<?php } ?>
