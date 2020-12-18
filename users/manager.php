<?php

session_start();

include("../includes/db.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('../login.php','_self')</script>";

}



else{
    if(isset($_GET['lang']))
    $lang=$_GET['lang'];
    else
    $lang="eng";
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


$get_birth_records = "select * from birth_records";
$run_birth_records = mysqli_query($con,$get_birth_records);
$count_birth_records = mysqli_num_rows($run_birth_records);

$get_death_records = "select * from death_records";
$run_death_records = mysqli_query($con,$get_death_records);
$count_death_records = mysqli_num_rows($run_death_records);


$get_divorce_records = "select * from divorce_records";
$run_divorce_records = mysqli_query($con,$get_divorce_records);
$count_divorce_records = mysqli_num_rows($run_divorce_records);

$get_marriage_records = "select * from marriage_records";
$run_marriage_records = mysqli_query($con,$get_marriage_records);
$count_marriage_records = mysqli_num_rows($run_marriage_records);



?>

<!DOCTYPE html>

<html>

<head>
    <title>Ethiopian vital events registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/Chart.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="margin-top: 0px;">





    <div class="" id="wrapper">
    <?php include("includes/manager_sidebar.php"); ?>
        <div id="page-wrapper">
            <!-- page-wrapper Starts -->

            <div class="container-fluid">
                <!-- container-fluid Starts -->



               
                

                    <?php






if(isset($_GET['dashboard'])&&isset($_GET['lang']))
{
    include('dashboard.php');
}


else if(isset($_GET['register_birth'])&&isset($_GET['lang']))
{
    include('register_birth.php');
}

else if(isset($_GET['register_marriage'])&&isset($_GET['lang']))
{
    include('register_marriage.php');
}

else if(isset($_GET['register_divorce'])&&isset($_GET['lang']))
{
    include('register_divorce.php');
}

else if(isset($_GET['register_death'])&&isset($_GET['lang']))
{
    include('register_death.php');
}

else if(isset($_GET['manager_stat'])&&isset($_GET['lang']))
{
    include('manager_stat.php');
}

else if(isset($_GET['insert_user'])&&isset($_GET['lang']))
{
    include('insert_user.php');
}

else if(isset($_GET['view_users'])&&isset($_GET['lang']))
{
    include('view_users.php');
}

else if(isset($_GET['user_profile'])&&isset($_GET['lang']))
{
    include('user_profile.php');
}

else if(isset($_GET['user_report'])&&isset($_GET['lang']))
{
    include('search.php');

}


else if(isset($_GET['bid']))
{
    include('record_profile.php');
}

else if(isset($_GET['reg_report'])&&isset($_GET['lang']))
{
    include('reg_report.php');
}

else if(isset($_GET['view_birth_records'])&&isset($_GET['lang']))
{
    include('view_birth_records.php');
}

else if(isset($_GET['view_death_records'])&&isset($_GET['lang']))
{
    include('view_death_records.php');
}
else if(isset($_GET['view_marriage_records'])&&isset($_GET['lang']))
{
    include('view_marriage_records.php');
}

else if(isset($_GET['view_divorce_records'])&&isset($_GET['lang']))
{
    include('view_divorce_records.php');
}

else if(isset($_GET['edit_birth_record'])&&isset($_GET['lang']))
{
    include('edit_birth_record.php');
}
else if(isset($_GET['edit_marriage_record'])&&isset($_GET['lang']))
{
    include('edit_marriage_record.php');
}
else if(isset($_GET['edit_death_record'])&&isset($_GET['lang']))
{
    include("edit_death_record.php");
}

else if(isset($_GET['edit_divorce_record'])&&isset($_GET['lang']))
{
    include("edit_divorce_record.php");
}

else if(isset($_GET['user_delete'])&&isset($_GET['lang']))
{
    include('user_delete.php');
}

else if(isset($_GET['delete_birth_record'])&&isset($_GET['lang']))
{
    include('delete_birth_record.php');
}

else if(isset($_GET['delete_marriage_record'])&&isset($_GET['lang']))
{
    include('delete_marriage_record.php');
}
else if(isset($_GET['delete_death_record'])&&isset($_GET['lang']))
{
    include('delete_death_record.php');
}

else if(isset($_GET['home']))
{
    include('search.php');
}

else if(isset($_GET['bid']))
{
    include('record_profile.php');
}

else if(isset($_GET['report_by']))
{
    include('reg_report.php');
}

else if(isset($_GET['b'])&&isset($_GET['d'])&&isset($_GET['dv'])&&isset($_GET['m']))
{
    include("reg_report.php");
}

else
{
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
    <script src="js/Chart.min.js"> </script>
</body>

</html>