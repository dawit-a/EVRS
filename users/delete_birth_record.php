<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_birth_record'])){

$delete_id = $_GET['delete_birth_record'];

$delete_rec = "delete from birth_records where bid='$delete_id'";

$run_delete = mysqli_query($con,$delete_rec);

if($run_delete){

echo "<script>alert('One Record Has been deleted')</script>";

echo "<script>window.open('manager.php?view_birth_records','_self')</script>";

}

}

?>

<?php } ?>