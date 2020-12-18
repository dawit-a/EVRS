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

<?php include("includes/navbar.php"); ?>





<div class="col-md-12 center-block" ><!-- col-md-9 Starts --->

<div class='box'>

<h1>Events</h1>

<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using '</p>

</div>
</div>


<div class="container-fluid padding card-container">
<?php getNews(8); ?>
</div>










<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php  ?>
