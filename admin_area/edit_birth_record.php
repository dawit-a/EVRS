<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_birth_record'])){

$edit_id = $_GET['edit_birth_record'];

$get_record = "select * from birth_records where bid=$edit_id";

$run_record = mysqli_query($con,$get_record);

$row_birth_record=mysqli_fetch_array($run_record);

    $bid = $row_birth_record['bid'];

    $name = $row_birth_record['name'];
    $fname= $row_birth_record['father_name'];
    $gfname= $row_birth_record['grand_father_name'];
    $dob=$row_birth_record['date_of_birth'];
    $nationality= $row_birth_record['nationality'];
    $pob=$row_birth_record['place_of_birth'];
    $f_n=$row_birth_record['father_nationality'];
    $m_n=$row_birth_record['mother_nationality'];
    $f_name= $row_birth_record['father_full_name'];
    $m_name= $row_birth_record['mother_full_name'];
    $region=$row_birth_record['region'];
    $zone=$row_birth_record['zone'];
    $woreda=$row_birth_record['woreda'];
    $f_bid=$row_birth_record['father_bid'];
    $m_bid=$row_birth_record['mother_bid'];
    $sex= $row_birth_record['gender'];
    $image=$row_birth_record['image'];
    


?>

}
?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Birth records </title>




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

<i class="fa fa-money fa-fw"></i> Edit birth records

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->



<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Name</label>

<div class="col-md-6" >

<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father name </label>

<div class="col-md-6" >

<input type="text" name="father_name" value="<?php echo $fname; ?>" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Grand  father name </label>

<div class="col-md-6" >

<input type="text" name="grand_father_name" value="<?php echo $gfname; ?>" class="form-control" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Gender  </label>

<div class="col-md-6" >

<select class="form-control"  name="gender"><!-- select gender Starts -->

<option> Select gender </option>
<option> Male </option>
<option>Female</option>


</select><!-- select gender Ends -->

</div>

</div><!-- form-group Ends -->


<<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of birth </label>

<div class="col-md-6" >

<input type="date" name="date_of_birth" class="form-control" value="<?php echo $dob; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Place of birth </label>

<div class="col-md-6" >

<input type="text" name="place_of_birth" class="form-control" value="<?php echo $pob; ?>" required >

</div>

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Region </label>

<div class="col-md-6" >

<input type="text" name="region" class="form-control" value="<?php echo $region; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > zone </label>

<div class="col-md-6" >

<input type="text" name="zone" class="form-control" value="<?php echo $zone; ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Woreda </label>

<div class="col-md-6" >

<input type="text" name="woreda" class="form-control" value="<?php echo $woreda; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Nationality </label>

<div class="col-md-6" >

<input type="text" name="nationality" class="form-control" value="<?php echo $nationality; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Father full name</label>

<div class="col-md-6" >

<input type="text" name="father_full_name" class="form-control" value="<?php echo $f_name; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Father Nationality </label>

<div class="col-md-6" >

<input type="text" name="father_nationality" class="form-control" value="<?php echo $f_n; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Father BID </label>

<div class="col-md-6" >

<input type="text" name="father_bid" class="form-control" value="<?php echo $f_bid; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Mother full name </label>

<div class="col-md-6" >

<input type="text" name="mother_full_name" class="form-control" value="<?php echo $m_name; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Mother Nationality  </label>

<div class="col-md-6" >

<input type="text" name="mother_nationality" class="form-control" value="<?php echo $m_n; ?>"required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Mother BID </label>

<div class="col-md-6" >

<input type="text" name="mother_bid" class="form-control" value="<?php echo $m_bid; ?>" required >

</div>

</div><!-- form-group Ends -->







<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Image </label>

<div class="col-md-6" >

<input type="file" name="image" class="form-control" required >

</div>

</div><!-- form-group Ends -->








<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update record" class="btn btn-primary form-control" >

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
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$grand_father_name = $_POST['grand_father_name'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$place_of_birth = $_POST['place_of_birth'];
$region = $_POST['region'];

$zone = $_POST['zone'];

$woreda = $_POST['woreda'];

$nationality = $_POST['nationality'];

$father_nationality = $_POST['father_nationality'];
$mother_nationality=$_POST['mother_nationality'];

$father_full_name= $_POST['father_full_name'];
$mother_full_name= $_POST['mother_full_name'];
$father_bid= $_POST['father_bid'];
$mother_bid= $_POST['mother_bid'];

$image = $_FILES['image']['name'];



$temp_name = $_FILES['image']['tmp_name'];


move_uploaded_file($temp_name,"images/$image");


$update_record = "update birth_records set name='$name',father_name='$father_name',grand_father_name='$grand_father_name',gender='$gender',date_of_birth='$date_of_birth',place_of_birth='$place_of_birth',region='$region',zone='$zone',woreda='$woreda',nationality='$nationality',mother_bid=$mother_bid,father_bid=$father_bid,mother_full_name='$mother_full_name',mother_nationality='$mother_nationality',father_full_name='$father_full_name',father_nationality='$father_nationality',registrar_full_name='$user_name',
registrar_id=0,image='$image' where bid=$bid";

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
