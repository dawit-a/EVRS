<?php



if(!isset($_SESSION['user_email']))

echo "<script>window.open('../login.php','_self')</script>";


else {
 
$user_role=$_SESSION['user_role'];

    if(isset($_GET['bid']))
    {
        $bid=$_GET['bid'];
        $get_records = "select * from birth_records where bid=$bid";
        $run_records = mysqli_query($con,$get_records);
        $row_birth_record=mysqli_fetch_array($run_records);
       
        $name = $row_birth_record['name'];
        $fname= $row_birth_record['father_name'];
        $gfname= $row_birth_record['grand_father_name'];
        $dob=$row_birth_record['date_of_birth'];
        $nationality= $row_birth_record['nationality'];
        $pob=$row_birth_record['place_of_birth'];
        
        $f_name= $row_birth_record['father_full_name'];
        $m_name= $row_birth_record['mother_full_name'];
        $sex= $row_birth_record['gender'];
        $image=$row_birth_record['image'];
        if($image=="")
        {
            if($sex=="Male")
            $image="male.jpg";
            else
            $image="female.png";
        }
       
        $get_m="select * from marriage_records where h_bid=$bid or w_bid=$bid";
      
    
        $run_m=mysqli_query($con,$get_m);
        $count_m=mysqli_num_rows($run_m);
      
        
        $get_d="select * from death_records where d_bid=$bid";
        $run_d=mysqli_query($con,$get_d);
        $count_d=mysqli_num_rows($run_d);

        include("search.php");
        ?>


<div class="row">
    <!-- 2 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <div class="panel panel-default">
            <!-- panel panel-default Starts -->
            <div class="panel-body">

                <div class="col-md-8">
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;"> Name:</p>
                    <p > <?php echo $name.' '.$fname.' '.$gfname; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;"> BID:</p>
                    <p > <?php echo $bid; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;">Sex: </p>
                    <p ><?php echo $sex; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;">Date of Birth: </p>
                    <p ><?php echo $dob; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;">Place of Birth: </p>
                    <p ><?php echo $pob; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;">Father name:</p>
                    <p > <?php echo $f_name; ?></p>
                    <p class="col-md-3" style="color: black; text-shadow: 1px 1px grey;">Mother name:</p>
                    <p > <?php echo $m_name; ?></p>


                    <?php 
      if($count_m==0)
     {
        $married=false;
       echo "<p class='col-md-3' style='color: #000; text-shadow: 1px 1px grey;'>Marriage status:</p><p> Not Married</p>";
     }
                else
    {
        $married=true;
        $status="";
        $i=0;
        while(  $row_m=mysqli_fetch_array($run_m)){
            $mid=$row_m['mid'];
            $get_dv="select * from divorce_records where mid=$mid";
    
        $run_dv=mysqli_query($con,$get_dv);
        $count_dv=mysqli_num_rows($run_dv);
        $get_new="select * from marriage_records where ( h_bid=$bid or w_bid=$bid ) and divorced='n'";
        $h_bid=$row_m["h_bid"];
        $w_bid=$row_m["w_bid"];
        if($sex=="Male")
        {
            $q="select * from birth_records where bid=$w_bid";
            $ref=$w_bid;
            $_SESSION['d_bid']=$w_bid;
        }  
        else
        {
            $q="select * from birth_records where bid=$h_bid";
            $ref=$h_bid;
            $_SESSION['d_bid']=$h_bid;
        }
    

        $run_q=mysqli_query($con,$q);
        mysqli_error($con);
        $row_p=mysqli_fetch_array($run_q);
        $pname=$row_p['name'];
        $pfname=$row_p['father_name'];
        $pgfname=$row_p['grand_father_name'];
                    
                    

      if($count_dv!=0)
      {
          $row_dv=mysqli_fetch_array($run_dv);
          $divorce_id=$row_dv['divorce_id'];

         if($i==0)
         $status.=" Divorced with  <a href='$role.php?bid=$ref&lang=eng'> $pname $pfname $pgfname </a>";
          else 
          $status.=" , Divorced with  <a href='$role.php?bid=$ref&lang=eng'> $pname $pfname $pgfname </a>";
        }
    else{
        if($i==0)
          $status.=  " Married to <a href='$role.php?bid=$ref&lang=eng'> $pname $pfname $pgfname </a>";
        else
        $status.=  " , Married to <a href='$role.php?bid=$ref&lang=eng'> $pname $pfname $pgfname </a>";
}
$i++;
    }
    echo "<p class='col-md-3' style='color: #000; text-shadow: 1px 1px grey;'>Marriage status: </p><p>$status</p>";
}

if($count_d!=0)
{
    $qu="select * from death_records where d_bid=$bid";
    $run_qu=mysqli_query($con,$qu);
    $row_qu=mysqli_fetch_array($run_qu);
    $did=$row_qu['did'];
    $dod=$row_qu['dod'];
    echo "<p class='col-md-3' style='color: #000; text-shadow: 1px 1px grey;'>Died in: </p><p>$dod</p>";
}
?>
                </div>
                <div class="col-md-4">
                    <?php
echo "
<img src='images/$image' class='img-responsive box' style=' box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(250, 250, 250, 0.4);'>
<br>
";

?>
                </div>
                <div class="col-md-12">
                    <?php include("register_marriage.php") ;?>
                    <?php include("register_divorce.php") ;?>
                    <?php include("register_death.php") ;?>
                </div>

                <div class="col-md-12">
                    <div class="collapse" id="marriage">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->

                            <label class="col-md-3 control-label"> Partner's BID</label>
                            <div class="input-group col-md-6">
                                <!-- form-group Starts -->



                                <input type="text" name="husband_bid" class="form-control" required>
                                <span class="input-group-btn">
                                    <!-- input-group-btn Starts -->

                                    <button type="submit" value="Search" name="search" class="btn btn-primary ">

                                        <i class="fa fa-search"></i>

                                    </button>

                                </span><!-- input-group-btn Ends -->


                            </div><!-- form-group Ends -->
                        </form>



                    </div>
                <div class="collapse" id="certify" style="margin-bottom: 50px;">
                    <a href="registrar.php?certify&bid=<?php echo $bid ?>&lang=eng" class="btn btn-primary col-md-3">Birth Certificate</a>
                    <?php if(isset($did)){ ?>
                        <div class="col-md-1"></div>
                    <a href="registrar.php?certify&did=<?php echo $did ?>&lang=eng" class="btn btn-primary col-md-3">Death Certificate</a>
                    <?php } ?>
                    <?php if(isset($divorce_id)){ ?>
                        <div class="col-md-1"></div>
                    <a href="registrar.php?certify&divorce_id=<?php echo $divorce_id ?>&lang=eng" class="btn btn-primary col-md-3">Divorce Certificate</a>
                    <?php } ?>
                    <?php if($married){ ?>
                        <div class="col-md-1"></div>
                    <a href="registrar.php?certify&mid=<?php echo $mid ?>&lang=eng" class="btn btn-primary col-md-3">Marriage Certificate</a>
                    <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <div class="collapse" id="divorce">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <!-- form-horizontal Starts -->
                                <div class="form-group">
                                    <!-- form-group Starts -->

                                    <label class="col-md-3 control-label"> <?php echo $date_o_dv; ?> </label>

                                    <div class="col-md-6">

                                        <input type="date" name="dod" class="form-control" required>

                                    </div>

                                </div><!-- form-group Ends -->
                                <div class="col-md-12">
                                    <h3 class="text-center">Place of Divorce Disolved</h3>
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

                                        <input type="submit" name="reg" value="Register"
                                            class="btn btn-primary form-control">

                                    </div>

                                </div><!-- form-group Ends -->

                            </form><!-- form-horizontal Ends -->
                        </div>

                    </div>



                    <div class="col-md-12">
                        <div class="collapse" id="death">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <!-- form-horizontal Starts -->

                                <div class="form-group">
                                    <!-- form-group Starts -->

                                    <label class="col-md-3 control-label"> <?php echo $tt; ?> </label>

                                    <div class="col-md-6">

                                        <input type="text" name="title" class="form-control" required>

                                    </div>

                                </div><!-- form-group Ends -->
                                <div class="form-group">
                                    <!-- form-group Starts -->

                                    <label class="col-md-3 control-label"> Date of Death </label>

                                    <div class="col-md-6">

                                        <input type="date" name="dod" class="form-control" required>

                                    </div>

                                </div><!-- form-group Ends -->
                                <div class="form-group">
                                    <!-- form-group Starts -->

                                    <label class="col-md-3 control-label"> <?php echo $death_cause; ?> </label>

                                    <div class="col-md-6">

                                        <textarea name="d_cause" class="form-control" rows="5">


                                        </textarea>

                                    </div>

                                </div><!-- form-group Ends -->
                                <div class="col-md-12">
                                    <h3 class="text-center">Place of Death</h3>
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

                                        <input type="submit" name="reg_death" value="Register"
                                            class="btn btn-primary form-control">

                                    </div>

                                </div><!-- form-group Ends -->

                            </form><!-- form-horizontal Ends -->
                        </div>
                        <?php if($user_role=="Registrar"){ ?>
                        <div class="col-md-12">
                            <?php if(($count_m==0||($count_m!=0&&$count_dv!=0))&&$count_d==0){ ?>
                            <div class="col-lg-4 col-md-6 ">
                                <!-- col-lg-3 col-md-6 Starts -->

                                <div class="panel panel-primary">
                                    <!-- panel panel-primary Starts -->

                                    <div class="panel-heading">
                                        <!-- panel-heading Starts -->

                                        <div class="row">
                                            <!-- panel-heading row Starts -->

                                            <div class="col-xs-3">
                                                <!-- col-xs-3 Starts -->

                                                <i class="fa fa-plus fa-5x"> </i>

                                            </div><!-- col-xs-3 Ends -->

                                            <div class="col-xs-9 text-right">
                                                <!-- col-xs-9 text-right Starts -->

                                                <div class="huge"> Add </div>

                                                <div>Marriage info</div>

                                            </div><!-- col-xs-9 text-right Ends -->

                                        </div><!-- panel-heading row Ends -->

                                    </div><!-- panel-heading Ends -->

                                    <a href="#" data-toggle="collapse" data-target="#marriage">

                                        <div class="panel-footer">
                                            <!-- panel-footer Starts -->

                                            <span class="pull-left"> Register </span>

                                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                            <div class="clearfix"></div>

                                        </div><!-- panel-footer Ends -->

                                    </a>

                                </div><!-- panel panel-primary Ends -->

                            </div><!-- col-lg-3 col-md-6 Ends -->

                            <?php } ?>

                            <?php if($count_m!=0&&$count_dv==0&&$count_d==0){ ?>
                            <div class="col-lg-4 col-md-6 ">
                                <!-- col-lg-3 col-md-6 Starts -->

                                <div class="panel panel-yellow">
                                    <!-- panel panel-yellow Starts -->

                                    <div class="panel-heading">
                                        <!-- panel-heading Starts -->

                                        <div class="row">
                                            <!-- panel-heading row Starts -->

                                            <div class="col-xs-3">
                                                <!-- col-xs-3 Starts -->

                                                <i class="fa fa-plus fa-5x"> </i>

                                            </div><!-- col-xs-3 Ends -->

                                            <div class="col-xs-9 text-right">
                                                <!-- col-xs-9 text-right Starts -->

                                                <div class="huge"> Add </div>

                                                <div>Divorce info</div>

                                            </div><!-- col-xs-9 text-right Ends -->

                                        </div><!-- panel-heading row Ends -->

                                    </div><!-- panel-heading Ends -->

                                    <a href="#" data-toggle="collapse" data-target="#divorce">

                                        <div class="panel-footer">
                                            <!-- panel-footer Starts -->

                                            <span class="pull-left"> Register </span>

                                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                            <div class="clearfix"></div>

                                        </div><!-- panel-footer Ends -->

                                    </a>

                                </div><!-- panel panel-yellow Ends -->

                            </div><!-- col-lg-3 col-md-6 Ends -->

                            <?php } ?>
                            <?php if($count_d==0){ ?>
                            <div class="col-lg-4 col-md-6 ">
                                <!-- col-lg-3 col-md-6 Starts -->

                                <div class="panel panel-red">
                                    <!-- panel panel-red Starts -->

                                    <div class="panel-heading">
                                        <!-- panel-heading Starts -->

                                        <div class="row">
                                            <!-- panel-heading row Starts -->

                                            <div class="col-xs-3">
                                                <!-- col-xs-3 Starts -->

                                                <i class="fa fa-plus fa-5x"> </i>

                                            </div><!-- col-xs-3 Ends -->

                                            <div class="col-xs-9 text-right">
                                                <!-- col-xs-9 text-right Starts -->

                                                <div class="huge"> Add </div>

                                                <div>Death info</div>

                                            </div><!-- col-xs-9 text-right Ends -->

                                        </div><!-- panel-heading row Ends -->

                                    </div><!-- panel-heading Ends -->

                                    <a href="#" data-toggle="collapse" data-target="#death">

                                        <div class="panel-footer">
                                            <!-- panel-footer Starts -->

                                            <span class="pull-left"> Register </span>

                                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                            <div class="clearfix"></div>

                                        </div><!-- panel-footer Ends -->

                                    </a>

                                </div><!-- panel panel-red Ends -->

                            </div><!-- col-lg-3 col-md-6 Ends -->

                            <?php } ?>
                            <div class="col-lg-4 col-md-6 ">
                                <!-- col-lg-3 col-md-6 Starts -->

                                <div class="panel panel-green">
                                    <!-- panel panel-red Starts -->

                                    <div class="panel-heading">
                                        <!-- panel-heading Starts -->

                                        <div class="row">
                                            <!-- panel-heading row Starts -->

                                            <div class="col-xs-3">
                                                <!-- col-xs-3 Starts -->

                                                <i class="fa fa-edit fa-5x"> </i>

                                            </div><!-- col-xs-3 Ends -->

                                            <div class="col-xs-9 text-right">
                                                <!-- col-xs-9 text-right Starts -->

                                                <div class="huge"> Edit </div>

                                                <div>Birth info</div>

                                            </div><!-- col-xs-9 text-right Ends -->

                                        </div><!-- panel-heading row Ends -->

                                    </div><!-- panel-heading Ends -->

                                    <a href="registrar.php?edit_birth_record=<?php echo $bid; ?>&lang=eng">

                                        <div class="panel-footer">
                                            <!-- panel-footer Starts -->

                                            <span class="pull-left"> Edit </span>

                                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                            <div class="clearfix"></div>

                                        </div><!-- panel-footer Ends -->

                                    </a>

                                </div><!-- panel panel-red Ends -->

                            </div><!-- col-lg-3 col-md-6 Ends -->
                            <div class="col-lg-4 col-md-6 ">
                                <!-- col-lg-3 col-md-6 Starts -->

                                <div class="panel panel-purple">
                                    <!-- panel panel-red Starts -->

                                    <div class="panel-heading">
                                        <!-- panel-heading Starts -->

                                        <div class="row">
                                            <!-- panel-heading row Starts -->

                                            <div class="col-xs-3">
                                                <!-- col-xs-3 Starts -->
                                                
                                                <i class="fa fa-print fa-5x"> </i>

                                            </div><!-- col-xs-3 Ends -->

                                            <div class="col-xs-9 text-right">
                                                <!-- col-xs-9 text-right Starts -->

                                                <div class="huge"> Issue </div>

                                                <div>Certificate</div>

                                            </div><!-- col-xs-9 text-right Ends -->

                                        </div><!-- panel-heading row Ends -->

                                    </div><!-- panel-heading Ends  -->

                                    <a href="#" data-toggle="collapse" data-target="#certify">

                                        <div class="panel-footer">
                                            <!-- panel-footer Starts -->

                                            <span class="pull-left"> Issue </span>

                                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                            <div class="clearfix"></div>

                                        </div><!-- panel-footer Ends -->

                                    </a>

                                </div><!-- panel panel-red Ends -->

                            </div><!-- col-lg-3 col-md-6 Ends -->
                        </div>


                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>



        <?php


    }

}

?>