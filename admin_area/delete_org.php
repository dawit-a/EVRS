<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_org'])){

$delete_id = $_GET['delete_org'];
$get_org="select * from orgs where oid=$delete_id";
$run_org=mysqli_query($con,$get_org);
$row_org=mysqli_fetch_array($run_org);
$user_id=$row_org['user_id'];
$delete_rec = "delete from orgs where oid=$delete_id";
$delete_user="delete from user where user_id=$user_id";
$run_delete = mysqli_query($con,$delete_rec);
$run_del = mysqli_query($con,$delete_user);
if($run_delete && $run_del){

echo "<script>alert('One Record Has been deleted')</script>";

echo "<script>window.open('index.php?view_orgs','_self')</script>";

}

else {
    echo "<div<div class='panel panel-body' style='margin-top: 40px;'></div> class='panel panel-body'>".mysqli_error($con)."</div>";

}


}



?>

<?php } ?>