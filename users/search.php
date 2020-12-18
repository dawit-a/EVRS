<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
$user_role=$_SESSION['user_role'];
?>




<div class="row">
    <!-- 2 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <div class="panel panel-default">
            <!-- panel panel-default Starts -->

            <div class="panel-heading">
                <!-- panel-heading Starts -->

                <h3 class="panel-title">
                    <!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"></i> Information search

                </h3><!-- panel-title Ends -->


            </div><!-- panel-heading Ends -->
            
            <div class="panel-body">
                <!-- panel-body Starts -->
                <div class="row">
                    <?php if($user_role=="Registrar") $role="registrar";
                          else if($user_role=="manager") $role="manager";
                          else if($user_role=="org") $role="org";
                          $url="$role.php?home&lang=eng";
                    ?>
                    <form class="col-md-8" method="get" action=<?php echo $url;?>>
                        <!-- navbar-form Starts -->

                        <div class="input-group">
                            <!-- input-group Starts -->
                            <span class="input-group-btn">
                                <!-- input-group-btn Starts -->

                                <select name="search_by" class="btn btn-primary">
                                    <option value="name" <?php if(isset($_GET['search_by']))
                                    {if($_GET['search_by']=="name") echo "selected";} ?>>Name</option>
                                    <option value="bid" <?php if(isset($_GET['search_by']))
                                    {if($_GET['search_by']=="bid") echo "selected";} ?>>BID</option>
                                    <option value="mid" <?php if(isset($_GET['search_by']))
                                    {if($_GET['search_by']=="mid") echo "selected";} ?>>MID</option>
                                    <option value="dv_id" <?php if(isset($_GET['search_by']))
                                    {if($_GET['search_by']=="dv_id") echo "selected";} ?>>DV ID</option>
                                    <option value="did" <?php if(isset($_GET['search_by']))
                                    {if($_GET['search_by']=="did") echo "selected";} ?>>DID</option>
                                </select>

                            </span><!-- input-group-btn Ends -->

                            <input class="form-control" type="text" placeholder="Search" name="search_val" value="<?php if(isset($_GET['search'])) echo $_GET['search_val'];
            if(isset($name)&&isset($fname)&&isset($gfname)) echo $name.' '.$fname.' '.$gfname;
            ?>" required>


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

if(isset($_GET['search'])){

$search_by=$_GET['search_by'];
$search_val=$_GET['search_val'];
if($search_by=='name')
{
    $_SESSION['search_name']=$search_val;
    if(isset($_SESSION['search_name']))
    include('results.php');
}


else if($search_by=='bid')
{
    $s_bid=$search_val;
    $find="select * from birth_records where bid=$s_bid";
    $run_find=mysqli_query($con,$find);
    $count_find=mysqli_num_rows($run_find);
    if($count_find==0)
    result_not_find($role);
    else
   echo  show_result($s_bid,"",$role);
}

else if($search_by=='mid')
{
    $s_mid=$search_val;
    $find="select * from marriage_records where mid=$s_mid";
    $run_find=mysqli_query($con,$find);
    $count_find=mysqli_num_rows($run_find);
    
    if($count_find==0)
    result_not_find($role);
    else
    {
        $row_m=mysqli_fetch_array($run_find);
        $h_bid=$row_m['h_bid'];
        $w_bid=$row_m['w_bid'];
       echo show_result($h_bid,'Husband',$role);
       echo show_result($w_bid,'Wife',$role);
    }
    
}

else if($search_by=='did')
{
    $s_did=$search_val;
    $find="select * from death_records where did=$s_did";
    $run_find=mysqli_query($con,$find);
    $count_find=mysqli_num_rows($run_find);
    if($count_find==0)
    result_not_find($role);
    else
    {
        $row_d=mysqli_fetch_array($run_find);
        $d_bid=$row_d['d_bid'];
        echo show_result($d_bid,"",$role);
    }
    

}

else if($search_by=='dv_id')
{
    $s_dvid=$search_val;
    $find_dv="select * from divorce_records where divorce_id=$s_dvid";
    $run_dv=mysqli_query($con,$find_dv);
    $count_find=mysqli_num_rows($run_dv);
    if($count_find==0)
    result_not_find($role);
    else
    {
        $row_dv=mysqli_fetch_array($run_dv);
       
        $dv_mid=$row_dv['mid'];
        $dv_q="select * from marriage_records where mid=$dv_mid";
        $run_dv=mysqli_query($con,$dv_q);
        $row_m=mysqli_fetch_array($run_dv);
        $h_bid=$row_m['h_bid'];
        $w_bid=$row_m['w_bid'];
      
      echo  show_result($h_bid,'Divorce',$role);
      echo   show_result($w_bid,'Divorcee',$role);
    }
    
}
}






     
}


function result_not_find($role)
{
    echo "
        
    <div class='box'>
    
    <h2>No Search Results Found</h2>
    <p><a href='$role.php?register_birth&lang=eng'>Register New Birth Record</a></p>
    
    </div>
    
    ";
}

function show_result($s_bid,$label,$role)
{
    $con= mysqli_connect("localhost","root","","vers");
    $get_records="select * from birth_records where bid=$s_bid";
    $run_records = mysqli_query($con,$get_records);
    $row_birth_record=mysqli_fetch_array($run_records);
    $bid = $row_birth_record['bid'];

    $name = $row_birth_record['name'];
    $fname= $row_birth_record['father_name'];
    $gfname= $row_birth_record['grand_father_name'];
    $dob=$row_birth_record['date_of_birth'];
    $nationality= $row_birth_record['nationality'];
    
    
    $f_name= $row_birth_record['father_full_name'];
    $m_name= $row_birth_record['mother_full_name'];
    $sex= $row_birth_record['gender'];
    $image=$row_birth_record['image'];
    if($label=="")
    $label=$sex;

    return  "

    <div class='col-md-4'><!-- col-md-4 Starts -->

    <div class='panel'><!-- panel Starts -->
    
    <div class='panel-body'><!-- panel-body Starts -->
    <div class='thumb-info mb-md'><!-- thumb-info mb-md Starts -->
    
    <img src='images/$image' class='rounded img-responsive'>
    
    <div class='thumb-info-title'><!-- thumb-info-title Starts -->
    
    <span class='thumb-info-inner'> $name $fname  </span>
    
    <span class='thumb-info-type'>   $label  </span>
    
    </div><!-- thumb-info-title Ends -->
    
    </div><!-- thumb-info mb-md Ends -->
    
    <div class='mb-md'><!-- mb-md Starts -->
    
    <div class='widget-content-expanded'><!-- widget-content-expanded Starts -->
    
    <i class='fa fa-user'></i> <span>Date of Birth: </span>    $dob <br>
    <i class='fa fa-user'></i> <span> Nationality: </span>  $nationality  <br>
    <p class='text-right'><a href='$role.php?bid=$bid&lang=eng' class='btn btn-default' >View details</a><p>
    
    </div><!-- widget-content-expanded Ends -->
    
   
    </div><!-- mb-md Ends -->
    
    </div><!-- panel-body Ends -->
   
    </div><!-- panel Ends -->
    
    </div><!-- col-md-4 Ends -->
    
    

";

}
?>