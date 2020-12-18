<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('../login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_marriage_record'])){

$edit_id = $_GET['edit_marriage_record'];

$get_record = "select * from marriage_records where mid=$edit_id";

$run_record = mysqli_query($con,$get_record);
$row_record=mysqli_fetch_array($run_record);
$mid=$row_record['mid'];
  $w_name = $row_record['w_name'];
    $w_f_name= $row_record['w_f_name'];
    $w_gf_name= $row_record['w_gf_name'];
    $h_name = $row_record['h_name'];
    $h_f_name= $row_record['h_f_name'];
    $h_gf_name= $row_record['h_gf_name'];
    $h_bid=$row_record['h_bid'];
    $w_bid=$row_record['w_bid'];
    $woreda=$row_record['mr_woreda'];
     $zone=$row_record['mr_zone'];
     $city=$row_record['mr_city'];
     $subcity=$row_record['mr_subcity'];
      $region= $row_record['mr_region'] ;
    $dom=$row_record['dom'];
    $domr=$row_record['d_o_mr'];
    $kebele=$row_record['mr_kebele'];

?>
<!DOCTYPE html>

<html>

<head>

<title> Edit Death records </title>




</head>

<body>
<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->
<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
<div class="col-md-6">
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Wife's name</label>

<div class="col-md-6" >

<input type="text" name="w_name" class="form-control"  value="<?php echo $w_name; ?>" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father's name </label>

<div class="col-md-6" >

<input type="text" name="w_f_name" class="form-control" value="<?php echo $w_f_name; ?>"required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Grand  father's name </label>

<div class="col-md-6" >

<input type="text" name="w_gf_name" class="form-control" value="<?php echo $w_gf_name; ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of Birth  </label>

<div class="col-md-6" >
<input type="date" name="w_dob" class="form-control" value="<?php echo $w_dob; ?>" required >


</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Wife's BID </label>

<div class="col-md-6" >

<input type="text" name="w_bid" class="form-control" value="<?php echo $w_bid; ?>" required >

</div>

</div><!-- form-group Ends -->

</div>


<div class="col-md-6">
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Husband's name </label>

<div class="col-md-6" >

<input type="text" name="h_name" class="form-control" value="<?php echo $h_name; ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father's name </label>

<div class="col-md-6" >

<input type="text" name="h_f_name" class="form-control" value="<?php echo $h_f_name; ?>" required >

</div>

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Grand father's name </label>

<div class="col-md-6" >

<input type="text" name="h_gf_name" class="form-control" value="<?php echo $h_gf_name; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Date of Birth </label>

<div class="col-md-6" >

<input type="date" name="h_dob" class="form-control" value="<?php echo $h_dob; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Husband's BID </label>

<div class="col-md-6" >

<input type="text" name="h_bid" class="form-control" value="<?php echo $h_bid; ?>" required >

</div>

</div><!-- form-group Ends -->
</div>


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of marriage </label>

<div class="col-md-6" >

<input type="date" name="dom" class="form-control" value="<?php echo $dom; ?>" required >

</div>

</div><!-- form-group Ends -->



<label class="col-md-12 text-center" >Place of marriage registration:- </label>
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Region</label>


<div class="col-md-6" >

<input type="text" name="mr_region" class="form-control" value="<?php echo $region; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Zone</label>

<div class="col-md-6" >

<input type="text" name="mr_zone" class="form-control" value="<?php echo $zone; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >City </label>

<div class="col-md-6" >

<input type="text" name="mr_city" class="form-control" value="<?php echo $city; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Subcity </label>

<div class="col-md-6" >

<input type="text" name="mr_subcity" class="form-control" value="<?php echo $subcity; ?>"required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Woreda </label>

<div class="col-md-6" >

<input type="text" name="mr_woreda" class="form-control" value="<?php echo $woreda; ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Kebele  </label>

<div class="col-md-6" >

<input type="text" name="mr_kebele" class="form-control" value="<?php echo $kebele; ?>" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Date of marriage registration </label>

<div class="col-md-6" >

<input type="date" name="d_o_mr" class="form-control" value="<?php echo $domr; ?>" required >

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
if(isset($_POST['update'])){
$w_name=$_POST['w_name'];
$w_f_name=$_POST['w_f_name'];
$w_gf_name=$_POST['w_gf_name'];
$h_name=$_POST['h_name'];
$h_f_name=$_POST['h_f_name'];
$h_gf_name=$_POST['h_gf_name'];
$w_bid=$_POST['w_bid'];
$h_bid=$_POST['h_bid'];
$w_dob=$_POST['w_dob'];
$h_dob=$_POST['h_dob'];
$dom=$_POST['dom'];
$mr_region=$_POST['mr_region'];
$mr_zone=$_POST['mr_zone'];
$mr_city=$_POST['mr_city'];
$mr_subcity=$_POST['mr_subcity'];
$mr_woreda=$_POST['mr_woreda'];
$mr_kebele=$_POST['mr_kebele'];
$d_o_mr=$_POST['d_o_mr'];
$image = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($temp_name,"images/$image");
echo $w_name.' '.$w_f_name.' '.$w_gf_name;

$update_record="update marriage_records set w_name='$w_name',w_f_name='$w_f_name',w_gf_name='$w_gf_name',h_name='$h_name',h_f_name='$h_f_name',h_gf_name='$h_gf_name',w_bid=$w_bid,h_bid=$h_bid,w_dob='$w_dob',h_dob='$h_dob',dom='$dom',mr_region='$mr_region',mr_zone='$mr_zone',mr_city='$mr_city',mr_subcity='$mr_subcity',mr_woreda='$mr_woreda',mr_kebele='$mr_kebele',d_o_mr='$d_o_mr',doc='$d_o_mr',registrar_full_name='$user_name',registrar_id=0,image='$image'where mid=$mid";

$run_record = mysqli_query($con,$update_record);


if($run_record){

echo "<script>alert('Record has been inserted successfully')</script>";


}

else{
    
    echo "<script>alert('Error:  happened')</script>";
    echo mysqli_error($con);
}


}

else{
    echo "<script>alert('No post arrived!!')";
}

}


?>


<?php } ?>
