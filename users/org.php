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
                <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<?php

$user_session = $_SESSION['user_email'];

$get_user = "select * from user where user_email='$user_session'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_image = $row_user['user_image'];

$user_name = $row_user['user_name'];
$user_about=$row_user['user_about'];

$get_org="select * from orgs where user_id=$user_id";

$run_org = mysqli_query($con,$get_org);

$row_org = mysqli_fetch_array($run_org);
$prev1=$row_org['prev1'];
$prev2=$row_org['prev2'];
$prev3=$row_org['prev3'];

if(!isset($_SESSION['user_email'])){


}
else {

echo "

<center>

<img src='../admin_area/images/$user_image' class='img-responsive'>

</center>

<br>

<h3 align='center' class='panel-title'>  $user_name </h3>

";

}

?>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->
<?php
if($prev1=="yes")
{
    if(isset($_GET['check_user']))
    echo "<li class='active'><a href='org.php?check_user'><i class='fa fa-search'> </i> Check user id </a></li>";
    else
    {
        echo "<li class=''><a href='org.php?check_user'><i class='fa fa-search'> </i> Check user id </a></li>";
    }
}
if($prev2=="yes")
{
    if(isset($_GET['report']))
    echo "<li class='active'><a href='org.php?report'><i class='fa fa-info'> </i> Get User Information </a></li>";
    else
    {
        echo "<li class=''><a href='org.php?report'><i class='fa fa-info'> </i> Get user Information </a></li>";
    }
}
if($prev3=="yes")
{
    if(isset($_GET['manager_stat']))
    echo "<li class='active'><a href='org.php?manager_stat'><i class='fa fa-bar-chart'> </i> Generate Statistics </a></li>";
    else
    {
        echo "<li class=''><a href='org.php?manager_stat'><i class='fa fa-bar-chart'> </i> Generate Statistics</a></li>";
    }
}

?>


<li>

<a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

</li>


</ul><!-- nav nav-pills nav-stacked Ends -->
<hr class="dotted short">

<h5 class="text-muted">About</h5>

<p>
<?php echo $user_about; ?>
</p>



</div><!-- panel-body Ends -->

</div><!-- panel panel-default sidebar-menu Ends -->
                </div>
                <div class="col-md-9">
                
                <?php

//include('register_birth.php');




if(isset($_GET['check_user']))
{
    include('check.php');
}
else if(isset($_GET['report_by']))
{
    include('reg_report.php');
}
else if(isset($_GET['b'])&&isset($_GET['d'])&&isset($_GET['dv'])&&isset($_GET['m']))
{
    include("reg_report.php");
}
else if(isset($_GET['home']))
{
    include('check.php');
}

else if(isset($_GET['report']))
{
    include('search.php');
}
else if(isset($_GET['bid']))
{
    include('record_profile.php');
}


else if(isset($_GET['manager_stat']))
{
    include('reg_report.php');
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

