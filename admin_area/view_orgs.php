<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View organizations

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View organizations

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Org. Name:</th>

<th>Org. Email:</th>

<th>Org. Image:</th>

<th>Org. Address:</th>

<th>Org. Previledges:</th>
<th>Org. About</th>
<th>Edit org.:</th>
<th>Delete org.:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_orgs = "select * from orgs";

$run_orgs = mysqli_query($con,$get_orgs);

while($row_org = mysqli_fetch_array($run_orgs)){

$org_id = $row_org['oid'];

$org_name = $row_org['org_name'];

$org_email = $row_org['org_email'];

$org_image = $row_org['org_image'];

$org_address = $row_org['org_address'];

$prev1 = $row_org['prev1'];
$prev2 = $row_org['prev2'];
$prev3 = $row_org['prev3'];

$org_about=$row_org['org_about'];



?>

<tr>

<td><?php echo $org_name; ?></td>

<td><?php echo $org_email; ?></td>

<td><img src="images/<?php echo $org_image; ?>" width="60" height="60" ></td>

<td><?php echo $org_address; ?></td>

<td><?php 
if($prev1=="yes")
echo "Check user id<br/>";
if($prev2=="yes")
echo "Get user Info.<br/>";
if($prev3=="yes")
echo "Generate Statistics<br/>"
?></td>
<td><?php echo $org_about; ?></td>

<td>

<a href="index.php?edit_org=<?php echo $org_id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>
<td>

<a href="index.php?delete_org=<?php echo $org_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>