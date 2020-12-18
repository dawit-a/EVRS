<?php 
include("../includes/db.php");
if(isset($_GET['search'])){

$id=$_GET['id'];
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
        $hname=$h_name.' '.$h_f_name.' '.$h_gf_name;
        $pom=$row_record['mr_woreda'].','. $row_record['mr_zone'] .','. $row_record['mr_region'] ;
      $dom=$row_record['dom'];
        }
        
    }
    $get_d="select * from death_records where d_bid=$id;";
    $run_d=mysqli_query($con,$get_d);
    $count = mysqli_num_rows($run_d);
    $count = mysqli_num_rows($run_d);
    if($count!=0){
    $row_death_record=mysqli_fetch_array($run_d);
    $pod=$row_death_record['pod'];
    $dod=$row_death_record['pod'];
    $d_case=$row_death_record['d_case'];
    }
   
}


?>

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->
<div class="col-md-8">
<?php echo $name; ?>


</div>
<div class="col-md-4"></div>

</div>
</div>
</div>
</div>
<?php } ?>