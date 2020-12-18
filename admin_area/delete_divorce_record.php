<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_divorce_record'])){

$delete_id = $_GET['delete_divorce_record'];

$delete_rec = "delete from divorce_records where divorce_id=$delete_id";

$run_delete = mysqli_query($con,$delete_rec);

if($run_delete){

echo "<script>alert('One Record Has been deleted')</script>";

echo "<script>window.open('manager.php?view_marriage_records','_self')</script>";

}

else {
    echo "<div<div class='panel panel-body' style='margin-top: 40px;'></div> class='panel panel-body'>".mysqli_error($con)."</div>";

}


}



?>

<?php } ?>