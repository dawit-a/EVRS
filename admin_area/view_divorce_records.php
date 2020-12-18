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

<i class="fa fa-dashboard"></i> Dashboard /  records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Divorce Records

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>Divorce ID</th>
<th>Marriage ID no.</th>
<th>Date of Divorce</th>
<th>Place of Divorce Disolved</th>
<th>Record Delete</th>
<th>Record Edit</th>



</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_record = "select * from divorce_records ";

$run_record = mysqli_query($con,$get_record);

while($row_record=mysqli_fetch_array($run_record)){

    $divorce_id = $row_record['divorce_id'];

    $mid=$row_record['mid'];
    
    $pdd=$row_record['region'].','.$row_record['zone'].' ,'.$row_record['woreda'];
    $dod=$row_record['dod'];
    
    
$i++;

?>

<tr>

<td><?php echo $divorce_id; ?></td>


<td> <?php echo $mid; ?></td>




<td>
<?php
echo $dod;
?>
</td>

<td> <?php echo $pdd; ?> </td>



<td>

<a href="index.php?delete_divorce_record=<?php echo $divorce_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_divorce_record=<?php echo $divorce_id; ?>">

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