<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_death_record'])){

$edit_id = $_GET['edit_death_record'];

$get_record = "select * from death_records where did=$edit_id";

$run_record = mysqli_query($con,$get_record);

$row_death_record=mysqli_fetch_array($run_record);

$did = $row_death_record['did'];
$title = $row_death_record['title'];
$d_name = $row_death_record['d_name'];
$d_f_name= $row_death_record['d_f_name'];
$d_gf_name= $row_death_record['d_gf_name'];
$dob=$row_death_record['dob'];
$nationality= $row_death_record['Nationality'];
$pod=$row_death_record['pod'];
$dod=$row_death_record['pod'];
$sex= $row_death_record['sex'];
$d_bid=$row_death_record['d_bid'];
$d_case=$row_death_record['d_case'];

    
    


?>

}
?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Death records </title>




</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit birth records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Death records

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->


<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Deceased's name</label>

<div class="col-md-6" >

<input type="text" name="d_name" class="form-control" value="<?php echo $d_name; ?>" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father's name </label>

<div class="col-md-6" >

<input type="text" name="d_f_name" class="form-control" value="<?php echo $d_f_name; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Grand  father name </label>

<div class="col-md-6" >

<input type="text" name="d_gf_name" class="form-control" value="<?php echo $d_gf_name; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Title </label>

<div class="col-md-6" >

<input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Sex  </label>

<div class="col-md-6" >

<select class="form-control" name="sex"><!-- select gender Starts -->

<option> Select sex </option>
<option> Male </option>
<option>Female</option>


</select><!-- select gender Ends -->

</div>

</div><!-- form-group Ends -->


<<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of birth </label>

<div class="col-md-6" >

<input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Nationality </label>

<div class="col-md-6" >

<input type="text" name="Nationality" class="form-control" value="<?php echo $nationality; ?>" required >

</div>

</div><!-- form-group Ends -->






<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Place of death</label>

<div class="col-md-6" >

<input type="text" name="pod" class="form-control" value="<?php echo $pod; ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Birth identification no.</label>

<div class="col-md-6" >

<input type="text" name="d_bid" class="form-control" value="<?php echo $d_bid; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Causes of Death </label>

<div class="col-md-6" >

<textarea name="d_case" class="form-control" rows="10"  >
<?php echo $d_case; ?>

</textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of Death registration </label>

<div class="col-md-6" >

<input type="date" name="d_o_dr" class="form-control" value="<?php echo $d_o_dr; ?>"  required >

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
if(isset($_POST['update']))
{
    $d_name=$_POST['d_name'];
    $d_f_name=$_POST['d_f_name'];
    $d_gf_name=$_POST['d_gf_name'];
    $d_bid=$_POST['d_bid'];
    $title=$_POST['title'];
    $sex=$_POST['sex'];
    $dob=$_POST['dob'];
    $Nationality=$_POST['Nationality'];
    $pod=$_POST['pod'];
    $dod=$_POST['dod'];
    $d_o_dr=$_POST['d_o_dr'];
    $d_case=$_POST['d_case'];
    
    
    $update_record="update death_records set d_name='$d_name',d_f_name='$d_f_name',d_gf_name='$d_gf_name',d_bid='$d_bid',title='$title',sex='$sex',dob='$dob',Nationality='$Nationality',pod='$pod',dod='$dod',d_o_dr='$d_o_dr',d_case='$d_case',registrar_full_name='$user_name',registrar_id=0";
    
    $run_record = mysqli_query($con,$update_record);



$run_record = mysqli_query($con,$update_record);


if($run_record){

echo "<script>alert('Record has been updated successfully')</script>";


}

else{
    echo "<script>alert('Error:  happened')</script>";
    echo mysqli_error($con);
}



}

?>

<?php }} ?>
