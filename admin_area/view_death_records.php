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

<i class="fa fa-dashboard"></i> Dashboard / Death records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Death Records

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>DID</th>
<th>Title</th>
<th>Place of death</th>
<th>Date of Death</th>
<th>Record Delete</th>
<th>Record Edit</th>



</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_record = "select * from death_records ";

$run_record = mysqli_query($con,$get_record);

while($row_death_record=mysqli_fetch_array($run_record)){

    $did = $row_death_record['did'];
    $title = $row_death_record['title'];
 

    $pod=$row_death_record['region'].','.$row_death_record['zone'].','.$row_death_record['woreda'];
    $dod=$row_death_record['dod'];

   
    
$i++;

?>

<tr>

<td><?php echo $did; ?></td>


<td><?php echo $title; ?></td>


<td> <?php echo $pod; ?> </td>
<td><?php echo $dod; ?></td>

<td>

<a href="index.php?delete_death_record=<?php echo $did; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_death_record=<?php echo $did; ?>">

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