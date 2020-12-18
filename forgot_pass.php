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

<?php include("includes/navbar.php");?>


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->




<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<center>

<h3> Enter Your Email Below , We Will Send You , Your Password </h3>

</center>

</div><!-- box-header Ends -->

<div align="center"><!-- center div Starts -->

<form action="" method="post"><!-- form Starts -->

<input type="text" class="form-control" name="u_email" placeholder="Enter Your Email">

<br>

<input type="submit" name="forgot_pass" class="btn btn-primary" value="Send My Password">

</form><!-- form Ends -->

</div><!-- center div Ends -->

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php

if(isset($_POST['forgot_pass'])){

$u_email = $_POST['u_email'];

$sel_u= "select * from user where user_email='$u_email'";

$run_u = mysqli_query($con,$sel_u);

$count_u = mysqli_num_rows($run_u);

$row_u = mysqli_fetch_array($run_u);

$u_name = $row_u['user_name'];

$u_pass = $row_c['user_pass'];

if($count_u == 0){

echo "<script> alert('Sorry, We do not have your email') </script>";

exit();

}
else{

$message = "

<h1 align='center'> Your Password Has Been Sent To You </h1>

<h2 align='center'> Dear $u_name </h2>

<h3 align='center'>

Your Password is : <span> <b>$u_pass</b> </span>

</h3>

<h3 align='center'>

<a href='localhost/vera/login.php'>
 
Click Here To Login Your Account 
 
</a>

</h3>

";

$from = "dawitayele6875@gmail.com"; 

$subject = "Your Password";

$headers = "From: $from\r\n";

$headers .= "Content-type: text/html\r\n";

mail($u_email,$subject,$message,$headers);

echo "<script> alert('Your Password has been sent to you, check your inbox ') </script>";

echo "<script>window.open('login.php','_self')</script>";

}

}

?>

