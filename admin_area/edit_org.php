<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_org'])){

$edit_id = $_GET['edit_org'];

$get_record = "select * from orgs where oid=$edit_id";

$run_record = mysqli_query($con,$get_record);

$row_org=mysqli_fetch_array($run_record);

$org_id = $row_org['oid'];

$org_name = $row_org['org_name'];

$org_email = $row_org['org_email'];

$org_image = $row_org['org_image'];
$user_id=$row_org['user_id'];
$org_address = $row_org['org_address'];

$prev1 = $row_org['prev1'];
$prev2 = $row_org['prev2'];
$prev3 = $row_org['prev3'];

$org_about=$row_org['org_about'];

    
    


?>




<!DOCTYPE html>

<html>

<head>

<title> Edit organization </title>




</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit organization

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit organization

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->


<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization name</label>

<div class="col-md-6" >

<input type="text" name="org_name" class="form-control" value="<?php echo $org_name; ?>" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization email </label>

<div class="col-md-6" >

<input type="text" name="org_email" class="form-control" value="<?php echo $org_email; ?>" required >

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
<input type="checkbox" name="prev1" class="" <?php if($prev1=="yes") echo "checked"; ?> > Check user ID</br>
<input type="checkbox" name="prev2" class="" <?php if($prev2=="yes") echo "checked"; ?>  > Get user information</br>
<input type="checkbox" name="prev3" class=""  <?php if($prev3=="yes") echo "checked"; ?>  > Generate statics</br>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization address </label>

<div class="col-md-6" >

<input type="text" name="org_address" class="form-control" value="<?php echo $org_address; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization Image </label>

<div class="col-md-6" >

<input type="file" name="image" class="form-control" required >
<br>
<img src="images/<?Php echo $org_image; ?>" width="70" height="70" >
</div>

</div><!-- form-group Ends -->






<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Organization About </label>

<div class="col-md-6" >

<textarea name="org_about" class="form-control" rows="10" >

<?php echo $org_about; ?>
</textarea>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update" class="btn btn-primary form-control" >

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
if(isset($_POST['update']))
{

    

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
    
    
    $update_org="update orgs set org_name='$org_name',org_email='$org_email',org_pass='$org_pass',prev1='$prev1',prev2='$prev2',prev3='$prev3',org_address='$org_address',org_image='$image',org_about='$org_about',admin_name='$admin_name',admin_id=$admin_id where oid=$org_id";
  
    $update_user = "update user set user_name='$org_name',user_email='$org_email',user_pass='$org_pass',user_image='$image',user_address='$org_address',user_role='org',user_about='$org_about' where user_id='$user_id'";


$run_org = mysqli_query($con,$update_org);
$run_user = mysqli_query($con,$update_user);

if($run_org&&$run_user){

echo "<script>alert('Organization has been updated successfully')</script>";


}

else{
    echo "<script>alert('Error:  happened')</script>";
    echo mysqli_error($con);
}



}

?>

<?php }} ?>
