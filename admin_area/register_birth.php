<?php
$conn= mysqli_connect("localhost","root","","vers");
if(!isset($_SESSION['user_email'])){

echo "<script>window.open('../login.php','_self')</script>";

}

else {
 
    

?>
<!DOCTYPE html>

<html>

<head>

<title> Birth registration  </title>



</head>

<body>




<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-plus-square-o"></i> Birth registration form

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > <?php echo $nm; ?></label>

<div class="col-md-6" >

<input type="text" name="name" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $f_nm; ?> </label>

<div class="col-md-6" >

<input type="text" name="father_name" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > <?php echo $gf_nm; ?></label>

<div class="col-md-6" >

<input type="text" name="grand_father_name" class="form-control" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $sex; ?>  </label>

<div class="col-md-6" >

<select class="form-control" name="gender"><!-- select gender Starts -->

<option> Select sex </option>
<option> Male </option>
<option>Female</option>


</select><!-- select gender Ends -->

</div>

</div><!-- form-group Ends -->


<<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $date_o_b; ?> </label>

<div class="col-md-6" >

<input type="date" name="date_of_birth" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $place_o_b; ?> </label>

<div class="col-md-6" >

<input type="text" name="place_of_birth" class="form-control" required >

</div>

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $reg; ?> </label>

<div class="col-md-6" >

<input type="text" name="region" class="form-control" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $zn; ?> </label>

<div class="col-md-6" >

<input type="text" name="zone" class="form-control" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $wd; ?> </label>

<div class="col-md-6" >

<input type="text" name="woreda" class="form-control" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  <?php echo $nt; ?> </label>

<div class="col-md-6" >

<input type="text" name="nationality" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ><?php echo $ffn; ?></label>

<div class="col-md-6" >

<input type="text" name="father_full_name" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ><?php echo $fn; ?> </label>

<div class="col-md-6" >

<input type="text" name="father_nationality" class="form-control" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > <?php echo $fbid; ?> </label>

<div class="col-md-6" >

<input type="text" name="father_bid" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > <?php echo $mfn; ?> </label>

<div class="col-md-6" >

<input type="text" name="mother_full_name" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > <?php echo $mn; ?> </label>

<div class="col-md-6" >

<input type="text" name="mother_nationality" class="form-control" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ><?php echo $mbid; ?> </label>

<div class="col-md-6" >

<input type="text" name="mother_bid" class="form-control" required >

</div>

</div><!-- form-group Ends -->







<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ><?php echo $img; ?> </label>

<div class="col-md-6" >

<input type="file" name="image" class="form-control" >

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
if(isset($_FILES['image']['name']))
{
    $image = $_FILES['image']['name'];



    $temp_name = $_FILES['image']['tmp_name'];
    
    
    move_uploaded_file($temp_name,"images/$image");
}
else
$image="";


$insert_record = "insert into birth_records(name,father_name,grand_father_name,
gender,date_of_birth,place_of_birth,region,zone,woreda,nationality,mother_bid,father_bid,mother_full_name,mother_nationality,father_full_name,father_nationality,registrar_full_name,
registrar_id,image) values ('$name','$father_name','$grand_father_name',
'$gender','$date_of_birth','$place_of_birth','$region','$zone','$woreda','$nationality',
$mother_bid,$father_bid,'$mother_full_name','$mother_nationality','$father_full_name',
'$father_nationality','$user_name',0,'$image')";

$run_record = mysqli_query($con,$insert_record);


if($run_record){
$query="select * from birth_records where name='$name'";
$run_query=mysqli_query($con,$query);
$fetch=mysqli_fetch_array($run_query);
$bid=$fetch['bid'];



echo "<script>window.open('registrar.php?bid=$bid&lang=eng','_self')</script>";

}

else{
    echo "<script>alert('Error:  happened')</script>";
    echo mysqli_error($con);
}



}

?>

<?php } ?>
