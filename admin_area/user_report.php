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

<i class="fa fa-money fa-fw" ></i> User report

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->
<div class="row">
    <form class="col-md-8" method="post" action="manager.php?user_report&lang=eng">
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

<h2>No Report Results Found</h2>

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
    $get_m="select * from marriage_records where w_bid=$id or h_bid=$id";
    $run_m=mysqli_query($con,$get_m);
    $count = mysqli_num_rows($run_m);
    if($count!=0){
        $row_record=mysqli_fetch_array($run_m);
            $w_name = $row_record['w_name'];
            $w_f_name= $row_record['w_f_name'];
            $w_gf_name= $row_record['w_gf_name'];
            $wname=$w_name.' '.$w_f_name.' '.$w_gf_name; 
        $h_name = $row_record['h_name'];
        $h_f_name= $row_record['h_f_name'];
        $h_gf_name= $row_record['h_gf_name'];
        $mid=$row_record['mid'];
        $hname=$h_name.' '.$h_f_name.' '.$h_gf_name;
        $pom=$row_record['mr_woreda'].','. $row_record['mr_zone'] .','. $row_record['mr_region'] ;
      $dom=$row_record['dom'];

        }
        
    }
    if(isset($mid))
    {
    $get_d="select * from divorce_records where mid=$mid;";
    $run_dv=mysqli_query($con,$get_d);

  
    $count = mysqli_num_rows($run_dv);
    
    if($count!=0){
        $row_record=mysqli_fetch_array($run_dv);
        $pdd=$row_record['pdd'];
        $dodv=$row_record['dod']; 
    }
    }
    
    $get_d="select * from death_records where d_bid=$id;";
    $run_d=mysqli_query($con,$get_d);
    $count = mysqli_num_rows($run_d);
    $count = mysqli_num_rows($run_d);
    if($count!=0){
    $row_death_record=mysqli_fetch_array($run_d);
    $pod=$row_death_record['pod'];
    $dod=$row_death_record['dod'];
    $d_case=$row_death_record['d_case'];
    }
   



?>


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->
<div class="panel-body">

<div class="col-md-8">
<p class="col-md-3"> Name:</p><p> <?php echo $name; ?></p>  
<p class="col-md-3">Sex: </p><p><?php echo $sex; ?></p>
<p class="col-md-3">Date of Birth: </p><p><?php echo $dob; ?></p>
<p class="col-md-3">Place of Birth: </p><p><?php echo $pob; ?></p>
<p class="col-md-3">Father name:</p><p> <?php echo $f_name; ?></p>
<p class="col-md-3">Mother name:</p><p> <?php echo $m_name; ?></p> 
<?php
if($sex=='female'&& isset($h_name))
{
    echo '<p class="col-md-3">Married to:</p><p>'. $h_name.' '.$h_f_name.' '.$h_gf_name. ' </p>'; 
    echo '<p class="col-md-3">Date of Marriage:</p><p>'. $dom.' </p>'; 
    echo '<p class="col-md-3">Place of Marriage:</p><p>'. $pom.' </p>'; 
}

else if(isset($w_name))
{
echo '<p class="col-md-3">Married to:</p><p>'. $w_name.' '.$w_f_name.' '.$w_gf_name. ' </p>';
echo '<p class="col-md-3">Date of Marriage:</p><p>'. $dom.' </p>'; 
echo '<p class="col-md-3">Place of Marriage:</p><p>'. $pom.' </p>'; 
}
?> 

</div>

<div class="col-md-4">
<?php
echo "
<img src='images/$image' class='img-responsive box'>
<br>
";
?>
</div>
<div class="col-md-12">
<?php 
if(isset($pdd))
{
    echo '<p class="col-md-2">Divorced in:</p><p>'. $dodv.' </p>'; 
    echo '<p class="col-md-3">Place of divorce disolved:</p><p>'. $pdd.' </p>'; 
}

if(isset($dod))
{
    echo '<p class="col-md-2">Dead in:</p><p>'. $dod.' </p>'; 
    echo '<p class="col-md-2">Place of death:</p><p>'. $pod.' </p>'; 
    echo '<p class="col-md-2">Cause of death:</p><p>'. $d_case.' </p>';
}



?>  
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