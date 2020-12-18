<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admins  where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_country'];

$admin_job = $row_admin['admin_job'];

$admin_contact = $row_admin['admin_contact'];

$admin_about = $row_admin['admin_about'];

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

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard']))
{
    include('dashboard.php');
}

if(isset($_GET['bid']))
{
    include('record_profile.php');
}

else if(isset($_GET['register_birth']))
{
    include('register_birth.php');
}

else if(isset($_GET['register_marriage']))
{
    include('register_marriage.php');
}

else if(isset($_GET['register_divorce']))
{
    include('register_divorce.php');
}

else if(isset($_GET['register_death']))
{
    include('register_death.php');
}

else if(isset($_GET['stat']))
{
    include('stat.php');
}

else if(isset($_GET['insert_user']))
{
    include('insert_user.php');
}

else if(isset($_GET['view_users']))
{
    include('view_users.php');
}

else if(isset($_GET['user_profile']))
{
    include('user_profile.php');
}

else if(isset($_GET['user_report']))
{
    include('search.php');

}
else if(isset($_GET['report_by']))
{
    include('reg_report.php');
}
else if(isset($_GET['search_by']))
{
    include('search.php');
}

else if(isset($_GET['b'])&&isset($_GET['d'])&&isset($_GET['dv'])&&isset($_GET['m']))
{
    include("reg_report.php");
}

else if(isset($_GET['reg_report']))
{
    include('reg_report.php');
}

else if(isset($_GET['view_birth_records']))
{
    include('view_birth_records.php');
}

else if(isset($_GET['view_death_records']))
{
    include('view_death_records.php');
}
else if(isset($_GET['view_marriage_records']))
{
    include('view_marriage_records.php');
}

else if(isset($_GET['view_divorce_records']))
{
    include('view_divorce_records.php');
}

else if(isset($_GET['edit_birth_record']))
{
    include('edit_birth_record.php');
}
else if(isset($_GET['edit_marriage_record']))
{
    include('edit_marriage_record.php');
}
else if(isset($_GET['edit_death_record']))
{
    include("edit_death_record.php");
}

else if(isset($_GET['edit_divorce_record']))
{
    include("edit_divorce_record.php");
}

else if(isset($_GET['user_delete']))
{
    include('user_delete.php');
}

else if(isset($_GET['delete_birth_record']))
{
    include('delete_birth_record.php');
}

else if(isset($_GET['delete_marriage_record']))
{
    include('delete_marriage_record.php');
}
else if(isset($_GET['delete_death_record']))
{
    include('delete_death_record.php');
}

else if(isset($_GET['insert_org']))
{
    include('insert_org.php');
}

else if(isset($_GET['view_org']))
{
    include("view_orgs.php");
}

else if(isset($_GET['edit_org']))
{
    include("edit_org.php");
}
else if(isset($_GET['delete_org']))
{
    include("delete_org.php");
}
else if(isset($_GET['insert_slide']))
{
    include("insert_slide.php");
}
else if(isset($_GET['insert_slide']))
{
    include("insert_slide.php");
}
else if(isset($_GET['view_slides']))
{
    include("view_slides.php");
}
else if(isset($_GET['edit_slide']))
{
    include("edit_slide.php");
}
else if(isset($_GET['delete_slide']))
{
    include("delete_slide.php");
}
else if(isset($_GET['edit_contact_us']))
{
    include('edit_contact_us.php');
}
else if(isset($_GET['edit_about_us']))
{
    include('edit_about_us.php');
}

else if(isset($_GET['insert_news']))
{
    include('insert_news.php');
}

else if(isset($_GET['view_news']))
{
    include('view_news.php');
}

else if(isset($_GET['edit_news']))
{
    include('edit_news.php');
}

else if(isset($_GET['news_delete']))
{
    include('delete_news.php');
}

else if(isset($_GET['edit_box']))
{
    include('edit_box.php');
}

else if(isset($_GET['edit_vision_section']))
{
    include('edit_vision_section.php');
}

else if(isset($_GET['edit_css']))
{
    include('edit_css.php');
}

else{
    include('dashboard.php');
}


?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>
