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

if(!isset($_SESSION['user_email'])){


}
else {

echo "

<center>

<img src='images/$user_image' class='img-responsive'>

</center>

<br>

<h3 align='center' class='panel-title'> $nm : $user_name </h3>

";

}

?>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->

<li class="<?php if(isset($_GET['home'])){ echo "active"; } ?>">

<a href="registrar.php?home&lang=<?php echo $lang; ?>"> <i class="fa fa-home" aria-hidden="true"></i> Home </a>

</li>
<li class="<?php if(isset($_GET['register_birth'])){ echo "active"; } ?>">

<a href="registrar.php?register_birth&lang=<?php echo $lang; ?>"> <i class="fa fa-birthday-cake"></i> <?php echo $birth; ?> </a>

</li>



<li class="<?php if(isset($_GET['user_profile'])){ echo "active"; } ?>">

<a href="registrar.php?user_profile=<?php echo $user_id; ?>&lang=<?php echo $lang; ?>"> <i class="fa fa-user"></i>  Edit profile</a>

</li>

<li >

<a href="registrar.php?home&lang=eng"> <i class="fa fa-language"></i>  English</a>

</li>

<li>

<a href="registrar.php?home&lang=amh"> <i class="fa fa-language"></i>    አማርኛ</a>

</li>

<li>

<a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

</li>


</ul><!-- nav nav-pills nav-stacked Ends -->
<hr class="dotted short">

<h5 class="text-muted"> <?php echo $about; ?></h5>

<p>
<?php echo $user_about; ?>
</p>



</div><!-- panel-body Ends -->

</div><!-- panel panel-default sidebar-menu Ends -->