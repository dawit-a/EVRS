<?php

session_start();

include("includes/db.php");

include("functions/functions.php");



?>
<!DOCTYPE html>
<html>

<head>
<title>Ethiopian vital events registration </title>

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<?php
    include("includes/navbar.php");
?>
<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->
<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Login</h1>




</center>






</div><!-- box-header Ends -->

<form action="login.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="form-control" name="u_email" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="form-control" name="u_pass" required >

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in


</button>

</div><!-- text-center Ends -->


</form><!--form Ends -->




</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){

$user_email = $_POST['u_email'];

$user_pass = $_POST['u_pass'];

$select_user = "select * from user where user_email='$user_email' AND user_pass='$user_pass'";

$run_user = mysqli_query($con,$select_user);
echo mysqli_error($con);


$check_user = mysqli_num_rows($run_user);






if($check_user==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}


else {

$_SESSION['user_email']=$user_email;
$user=mysqli_fetch_array($run_user);
$user_role=$user['user_role'];

$_SESSION['user_role']=$user_role;
if($user_role=="Registrar")
echo "<script>window.open('users/registrar.php?home&lang=eng','_self')</script>";

else if($user_role=="manager")
{
    echo "<script>window.open('users/manager.php?dashboard&lang=eng','_self')</script>";  
}
else if($user_role="org")
{
    echo "<script>window.open('users/org.php','_self')</script>";  
}

}




}

?>




</div>
</div>


<?php include("includes/footer.php") ?>


<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

