<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Users

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Users

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>User Name:</th>

<th>User Email:</th>

<th>User Image:</th>

<th>User Address:</th>

<th>User Role:</th>

<th>Delete User:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_user = "select * from user";

$run_user = mysqli_query($con,$get_user);

while($row_user = mysqli_fetch_array($run_user)){

$user_id = $row_user['user_id'];

$user_name = $row_user['user_name'];

$user_email = $row_user['user_email'];

$user_image = $row_user['user_image'];

$user_address = $row_user['user_address'];

$user_role = $row_user['user_role'];





?>

<tr>

<td><?php echo $user_name; ?></td>

<td><?php echo $user_email; ?></td>

<td><img src="images/<?php echo $user_image; ?>" width="60" height="60" ></td>

<td><?php echo $user_address; ?></td>

<td><?php echo $user_role; ?></td>

<td>

<a href="manager.php?user_delete=<?php echo $user_id; ?>" >

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