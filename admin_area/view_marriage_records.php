<?php



if(!isset($_SESSION['admin_email'])){

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

<i class="fa fa-money fa-fw" ></i> View Marriage Records

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>MID</th>
<th>Wife's BID</th>

<th>Husband's BID</th>
<th>Date of marriage</th>
<th>Place of marriage</th>
<th>Record Delete</th>
<th>Record Edit</th>



</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_record = "select * from marriage_records ";

$run_record = mysqli_query($con,$get_record);

while($row_record=mysqli_fetch_array($run_record)){

    $mid = $row_record['mid'];
    $h_bid=$row_record['h_bid'];
    $w_bid=$row_record['w_bid'];
    $pom=$row_record['mr_woreda'].','. $row_record['mr_zone'] .','. $row_record['mr_region'] ;
    $dom=$row_record['dom'];
    
    
$i++;

?>

<tr>

<td><?php echo $mid; ?></td>

<td> <?php echo $w_bid; ?></td>


<td><?php echo $h_bid; ?></td>




<td>
<?php
echo $dom;
?>
</td>

<td> <?php echo $pom; ?> </td>



<td>

<a href="index.php?delete_marriage_record=<?php echo $mid; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_marriage_record=<?php echo $mid; ?>">

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