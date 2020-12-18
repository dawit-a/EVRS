<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / Birth records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Birth Records

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>BID</th>
<th>Name</th>
<th>Sex</th>
<th>Photo</th>
<th>Date of birth</th>
<th>Father name</th>
<th>Mother name</th>
<th>Nationality</th>
<th>Record Delete</th>
<th>Record Edit</th>



</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_record = "select * from birth_records ";

$run_record = mysqli_query($con,$get_record);

while($row_birth_record=mysqli_fetch_array($run_record)){

    $bid = $row_birth_record['bid'];

    $name = $row_birth_record['name'];
    $fname= $row_birth_record['father_name'];
    $gfname= $row_birth_record['grand_father_name'];
    $dob=$row_birth_record['date_of_birth'];
    $nationality= $row_birth_record['nationality'];
    
    
    $f_name= $row_birth_record['father_full_name'];
    $m_name= $row_birth_record['mother_full_name'];
    $sex= $row_birth_record['gender'];
    $image=$row_birth_record['image'];
    
$i++;

?>

<tr>

<td><?php echo $bid; ?></td>

<td><?php echo $name.' '.$fname.' '.$gfname; ?></td>
<td> <?php echo $sex; ?></td>

<td><img src="images/<?php echo $image; ?>" width="60" height="60"></td>



<td>
<?php
echo $dob;
?>
</td>

<td> <?php echo $f_name; ?> </td>

<td><?php echo $m_name; ?></td>
<td><?php echo $nationality; ?></td>

<td>

<a href="manager.php?delete_birth_record=<?php echo $bid; ?>&lang=eng">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="manager.php?edit_birth_record=<?php echo $bid; ?>&lang=eng">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>