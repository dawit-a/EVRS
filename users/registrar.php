<?php

session_start();

include("../includes/db.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('../login.php','_self')</script>";

}

else{




?>




<?php

$user_session = $_SESSION['user_email'];

$get_user = "select * from user  where user_email='$user_session'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_id = $row_user['user_id'];

$user_name = $row_user['user_name'];

$user_email = $row_user['user_email'];

$user_image = $row_user['user_image'];

$user_country ="Ethiopia";

$user_job = $row_user['user_job'];

$user_contact = $row_user['user_contact'];

$user_about = $row_user['user_about'];


    if(isset($_GET['lang']))
    $lang=$_GET['lang'];
    else
    $lang='eng';
    $get_lang="select * from labels where lang='$lang'";
    $run_lang=mysqli_query($con,$get_lang);
        $row_lang=mysqli_fetch_array($run_lang);
    
        $nm=$row_lang['name'];
        $f_nm=$row_lang['father_name'];
        $gf_nm=$row_lang['grand_father_name'];
        $sex=$row_lang['sex'];
        $date_o_b=$row_lang['date_of_birth'];
        $place_o_b=$row_lang['place_of_birth'];
        $reg=$row_lang['region'];
        $zn=$row_lang['zone'];
        $wd=$row_lang['woreda'];
        $nt=$row_lang['nationality'];
        $ffn=$row_lang['father_full_name'];
        $fn=$row_lang['father_nationality'];
        $fbid=$row_lang['father_bid'];
        $mfn=$row_lang['mother_full_name'];
        $mn=$row_lang['mother_nationality'];
        $mbid=$row_lang['mother_bid'];
        $img=$row_lang['image'];
        $birth=$row_lang['birth'];
        $marriage=$row_lang['marriage'];
        $death=$row_lang['death'];
        $divorce=$row_lang['divorce'];
        $about=$row_lang['about'];
        $deceased_name=$row_lang['deceased_name'];
        $tt=$row_lang['title'];
        $place_o_d=$row_lang['place_of_death'];
        $b_i_d=$row_lang['bid'];
        $death_cause=$row_lang['death_cause'];
        $wife_nm=$row_lang['wife_name'];
        $husband_nm=$row_lang['husband_name'];
        $wife_bid=$row_lang['wife_bid'];
        $husband_bid=$row_lang['husband_bid'];
        $date_o_m=$row_lang['date_o_m'];
        $city=$row_lang['city'];
        $d_nm=$row_lang['divorcee_name'];
        $dv_nm=$row_lang['divorce_name'];
        $mid=$row_lang['mid'];
        $date_o_dv=$row_lang['date_of_divorce'];
        $pdd=$row_lang['pdd'];


?>

<!DOCTYPE html>

<html>

<head>
    <title>Ethiopian vital events registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="margin-top: 0px;">

    <div class="wrapper">
        <div class="navbar " id="navbar" style="background-color:#e0e0e0; margin-top: 0px; padding-bottom: 15px;">
            <!-- navbar navbar-default Starts -->
            <div class="container">
                <!-- container Starts -->
                <div class="navbar-header">
                    <!-- navbar-header Starts -->
                    <a class="navbar-brand home" href="../index.php">
                        <!--- navbar navbar-brand home Starts -->
                        <img src="images/logo.jpg" alt="vera logo" class="logo">
                    </a>

                </div><!-- navbar-header Ends -->
                <div class="padding-nav">
                    <!-- padding-nav Starts -->
                    <h2 class="nav navbar-nav navbar-center" style="color: blue; 
            font-family:'Times New Roman', Times, serif; margin-top:10px;">
                        <!-- nav navbar-nav navbar-left Starts -->
                        Ethiopian vital events agency
                    </h2>
                </div>

                <ul class=" nav navbar-right top-nav">
                    <!-- nav navbar-right top-nav Starts -->

                    <li class="dropdown">
                        <!-- dropdown Starts -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- dropdown-toggle Starts -->

                            <i class="fa fa-user"></i>

                            <?php echo $user_name; ?> <b class="caret"></b>


                        </a><!-- dropdown-toggle Ends -->

                        <ul class="dropdown-menu">
                            <!-- dropdown-menu Starts -->

                            <li>
                                <!-- li Starts -->

                                <a href="index.php?user_profile=<?php echo $user_id; ?>">

                                    <i class="fa fa-fw fa-user"></i> Profile


                                </a>

                            </li><!-- li Ends -->
                            <li>
                                <!-- li Starts -->

                                <a href="logout.php">

                                    <i class="fa fa-fw fa-power-off"> </i> Log Out

                                </a>

                            </li><!-- li Ends -->

                        </ul><!-- dropdown-menu Ends -->
                    </li><!-- dropdown Ends -->


                </ul>
            </div>
        </div>




        <div id="page-wrapper">
            <!-- page-wrapper Starts -->

            <div class="container-fluid">
                <!-- container-fluid Starts -->


               
                <div class="col-md-3">
                    <?php include("includes/sidebar.php"); ?>
                </div>
                <div class="col-md-9">
                
                <?php





if(isset($_GET['register_birth']))
{
    include('register_birth.php');
}

else if(isset($_GET['home']))
{
    include('search.php');
}
else if(isset($_GET['certify'])&&isset($_GET['bid']))
{
    include('certificate.php');
}
else if(isset($_GET['certify'])&&isset($_GET['did']))
{
    include('death_certificate.php');
}
else if(isset($_GET['certify'])&&isset($_GET['mid']))
{
    include('marriage_certificate.php');
}
else if(isset($_GET['certify'])&&isset($_GET['divorce_id']))
{
    include('divorce_certificate.php');
}
else if(isset($_GET['bid']))
{
    include('record_profile.php');
}
else if(isset($_GET['user_profile']))
{
    include("user_profile.php");
}

else if(isset($_GET['edit_birth_record']))
{
    include('edit_birth_record.php');
}


else{
    include('search.php');
}
}





?>

</div>


            </div>
        </div>
    </div>

    





    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

