<?php

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('../login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_divorce_record'])){

$edit_id = $_GET['edit_divorce_record'];

$get_record = "select * from divorce_records where divorce_id=$edit_id";

$run_record = mysqli_query($con,$get_record);
$row_record=mysqli_fetch_array($run_record);
$did = $row_record['divorce_id'];

    $divorcee_name = $row_record['divorcee_name'];
    $divorcee_fname= $row_record['divorcee_fname'];
    $divorcee_gfname= $row_record['divorcee_gfname'];
    $divorce_name = $row_record['divorce_name'];
    $divorce_fname= $row_record['divorce_fname'];
    $divorce_gfname= $row_record['divorce_gfname'];
    $mid=$row_record['mid'];
    
    $pdd=$row_record['pdd'];
    $dod=$row_record['dod'];

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

<i class="fa fa-dashboard"> </i> Dashboard / Edit Divorce records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit divorce records

</h3>

</div><!-- panel-heading Ends -->
<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->
<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
<div class="col-md-6">
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Divorcee name</label>

<div class="col-md-6" >

<input type="text" name="divorcee_name" class="form-control" value="<?php echo $divorcee_name ?>" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father's name </label>

<div class="col-md-6" >

<input type="text" name="divorcee_fname" class="form-control"  value="<?php echo $divorcee_fname ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Grand  father's name </label>

<div class="col-md-6" >

<input type="text" name="divorcee_gfname" class="form-control"  value="<?php echo $divorcee_gfname ?>" required >

</div>

</div><!-- form-group Ends -->




 

</div>


<div class="col-md-6">
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Devorce name </label>

<div class="col-md-6" >

<input type="text" name="divorce_name" class="form-control"  value="<?php echo $divorce_name ?>" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Father's name </label>

<div class="col-md-6" >

<input type="text" name="divorce_fname" class="form-control" value="<?php echo $divorce_fname ?>" required >

</div>

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Grand father's name </label>

<div class="col-md-6" >

<input type="text" name="divorce_gfname" class="form-control" value="<?php echo $divorce_gfname ?>" required >

</div>

</div><!-- form-group Ends -->







</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Marriage Identification no. </label>

<div class="col-md-6" >

<input type="text" name="mid" class="form-control" value="<?php echo $mid ?>" required >

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Date of Divorce </label>

<div class="col-md-6" >

<input type="date" name="dod" class="form-control"  value="<?php echo $dod ?>"required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Place of Divorce Disolved</label>


<div class="col-md-6" >

<input type="text" name="pdd" class="form-control" value="<?php echo $pdd ?>" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Date of Divorce registration</label>

<div class="col-md-6" >

<input type="date" name="dodr" class="form-control" value="<?php echo $dodr ?>" required >

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

</div>
</div>
</div>



</body>

</html>


<?php
if(isset($_POST['update'])){
    $divorcee_name=$_POST['divorcee_name'];
    $divorcee_fname=$_POST['divorcee_fname'];
    $divorcee_gfname=$_POST['divorcee_gfname'];
    
    $divorce_name=$_POST['divorce_name'];
    $divorce_fname=$_POST['divorce_fname'];
    $divorce_gfname=$_POST['divorce_gfname'];
    $mid=$_POST['mid'];
    $dod=$_POST['dod'];
    $pdd=$_POST['pdd'];
    $dodr=$_POST['dodr'];
    
    $update_record="update divorce_records set divorcee_name='$divorcee_name',divorcee_fname='$divorcee_fname',divorcee_gfname='$divorcee_gfname',divorce_name='$divorce_name',divorce_fname='$divorce_fname',divorce_gfname='$divorce_gfname',mid=$mid,dod='$dod',pdd='$pdd',dodr='$dodr',registrar_full_name='$user_name',registrar_id=0";
    
   
    




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
