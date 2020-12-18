<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>




<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Check user identity

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->
<div class="row">
    <form class="col-md-8" method="post" action="org.php?check_user">
        <!-- navbar-form Starts -->

        <div class="input-group">
            <!-- input-group Starts -->

            
            <input class="form-control" type="text" placeholder="Enter BID" name="id" value="<?php if(isset($_POST['search'])) echo $_POST['id'];?>" required>


            <span class="input-group-btn">
                <!-- input-group-btn Starts -->

                <button type="submit" value="Search" name="search" class="btn btn-primary">

                    <i class="fa fa-search"></i>

                </button>

            </span><!-- input-group-btn Ends -->

        </div><!-- input-group Ends -->

    </form><!-- navbar-form Ends -->

</div>




</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->
<?php 

if(isset($_POST['search'])){

$id=$_POST['id'];
$get_b="select * from birth_records where bid=$id";
$run_b=mysqli_query($con,$get_b);


$count = mysqli_num_rows($run_b);

if($count==0){

echo "

<div class='box'>

<h2>Invalid Id number</h2>

</div>

";

}else{
 
while($row_birth_record=mysqli_fetch_array($run_b)){
$name=$row_birth_record['name'].' '.$row_birth_record['father_name'].' '.$row_birth_record['grand_father_name'];


$dob=$row_birth_record['date_of_birth'];
$pob=$row_birth_record['place_of_birth'].','.$row_birth_record['woreda'].','.$row_birth_record['zone'].','.$row_birth_record['region'];
    $nationality= $row_birth_record['nationality'];
    $f_name= $row_birth_record['father_full_name'];
    $m_name= $row_birth_record['mother_full_name'];
    
    $sex= $row_birth_record['gender'];
    $image=$row_birth_record['image'];
   
        
    }
   


?>


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->
<div class="panel-body">

<div class="col-md-8">
<p class="col-md-3"> Name:</p><p> <?php echo $name; ?></p>  
<p class="col-md-3">Sex: </p><p><?php echo $sex; ?></p>
<p class="col-md-3">Nationality </p><p><?php echo $nationality ?></p>
</div>
<div class="col-md-4">
<img src="images/<?php echo $image ?>" alt="" class="img-responsive">
</div>
</div>
</div>
</div>
</div>
</div>
<?php }} ?>



<?php
     
}
?>