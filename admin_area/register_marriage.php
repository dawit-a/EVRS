<?php


if(isset($_POST["husband_bid"]))
{
    $_SESSION['p_bid']=$_POST["husband_bid"];
?>
<hr class="dotted short">
<?php

$p_bid=$_POST['husband_bid'];
$get_records = "select * from birth_records where bid=$p_bid";
$run_records = mysqli_query($con,$get_records);
$row_birth_record=mysqli_fetch_array($run_records);

$p_name = $row_birth_record['name'];
$p_fname= $row_birth_record['father_name'];
$p_gfname= $row_birth_record['grand_father_name'];
$p_dob=$row_birth_record['date_of_birth'];
$p_nationality= $row_birth_record['nationality'];
$p_image=$row_birth_record['image'];
$p_sex=$row_birth_record['gender'];
$_SESSION['p_image']=$p_image;
$_SESSION['p_sex']=$p_sex;
?>


<div class="row">
    <!-- 2 row Starts -->
    <div class="col-md-8">
        <p class="col-md-3">Husband Name:</p>
        <p> <?php echo $p_name.' '.$p_fname.' '.$p_gfname; ?></p>

    </div>
    <p class="col-md-3"><a href="#" class=" btn btn-default" data-toggle="collapse" data-target="#more">View more</a>
    </p>

    <div class="collapse col-lg-12" id="more">
        <!-- col-lg-12 Starts -->
        <div class=" col-md-8 ">

            <p class="col-md-3"> BID:</p>
            <p> <?php echo $p_bid; ?></p>
            <p class="col-md-3">Date of Birth: </p>
            <p><?php echo $p_dob; ?></p>
           
            <p class="col-md-3">Nationality:</p>
            <p> <?php echo $p_nationality; ?></p>



        </div>
        <div class="col-md-4">
            <?php
echo "
<img src='images/$p_image' class='img-responsive box'>
<br>
";
?>
        </div>

    </div>


        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <!-- form-horizontal Starts -->
            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> <?php echo $date_o_m; ?> </label>

                <div class="col-md-6">

                    <input type="date" name="dom" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->
            <div class="col-md-12">
                <h3 class="text-center">Place of marriage registration</h3>
            </div>
            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"><?php echo $reg; ?></label>

                <div class="col-md-6">

                    <input type="text" name="region" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->

            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> <?php echo $zn; ?> </label>

                <div class="col-md-6">

                    <input type="text" name="zone" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->



            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> <?php echo $wd; ?> </label>

                <div class="col-md-6">

                <input type="text" name="wereda" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->

      
          

            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> </label>

                <div class="col-md-6">

                    <input type="submit" name="submit" value="Register" class="btn btn-primary form-control">

                </div>

            </div><!-- form-group Ends -->

        </form><!-- form-horizontal Ends -->

        <?php
       
    } 
    if(isset($_POST['submit']))
    {


        $p_bid=$_SESSION["p_bid"];
        $p_image=$_SESSION["p_image"];
        $dom=$_POST['dom'];
        $region=$_POST['region'];
        $zone=$_POST['zone'];
        $woreda=$_POST['wereda'];
        if(isset($_SESSION['p_sex']))
        {
                $p_sex=$_SESSION['p_sex'];
                if($p_sex!="Male")
                {
                    $temp=$bid;
                    $bid=$p_bid;
                    $p_bid=$temp;
                }
        }
    
        $insert="insert into marriage_records(w_bid,h_bid,dom,mr_region,mr_zone,mr_woreda,registrar_full_name,registrar_id,w_image,h_image,divorced ) values ($bid,$p_bid,'$dom','$region','$zone','$woreda','$user_name',$user_id,'$image','$p_image','n')";
        $run_rec=mysqli_query($con,$insert);
        echo mysqli_error($con);
        if($run_rec)
        {
            
            $_POST["husband_bid"]="";
        }
        else
        echo mysqli_error($con);
    
    } 
    
        ?>