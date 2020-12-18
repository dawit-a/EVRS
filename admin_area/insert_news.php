<?php
$conn= mysqli_connect("localhost","root","","vers");
if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

    

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert news  </title>




</head>

<body>




<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-plus-square-o"></i> Insert news

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News title</label>

<div class="col-md-6" >

<input type="text" name="news_title" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News url </label>

<div class="col-md-6" >

<input type="text" name="news_url" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News reporter </label>

<div class="col-md-6" >

<input type="text" name="news_reporter" class="form-control" required >

</div>

</div><!-- form-group Ends -->






<<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News date </label>

<div class="col-md-6" >

<input type="date" name="news_date" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News short </label>
<div class="col-md-6" >

<textarea name="news_short" class="form-control" rows="5" >


</textarea>

</div>


</div><!-- form-group Ends -->










<div class="form-group" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > News content </label>

<div class="col-md-6" >

<textarea name="news_content" class="form-control" rows="10" >


</textarea>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News Image 1 </label>

<div class="col-md-6" >

<input type="file" name="news_img" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News Image 2 </label>

<div class="col-md-6" >

<input type="file" name="news_img2" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > News Image 3 </label>

<div class="col-md-6" >

<input type="file" name="news_img3" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert news " class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){
$news_title=$_POST['news_title'];
$news_url=$_POST['news_url'];
$news_content=$_POST['news_content'];
$news_short=$_POST['news_short'];
$news_date=$_POST['news_date'];
$news_reporter=$_POST['news_reporter'];
$news_img = $_FILES['news_img']['name'];
$news_img2 = $_FILES['news_img2']['name'];
$news_img3 = $_FILES['news_img3']['name'];

$temp_name1 = $_FILES['news_img']['tmp_name'];
$temp_name2 = $_FILES['news_img2']['tmp_name'];
$temp_name3 = $_FILES['news_img3']['tmp_name'];

move_uploaded_file($temp_name1,"news_images/$news_img");
move_uploaded_file($temp_name2,"news_images/$news_img2");
move_uploaded_file($temp_name3,"news_images/$news_img3");


$insert_news="insert into news(news_title,news_url,news_img,news_img2,news_content,news_img3,news_reporter,news_date,news_short) values('$news_title','$news_url','$news_img','$news_img2','$news_content','$news_img3','$news_reporter','$news_date','$news_short')";

$run_news = mysqli_query($con,$insert_news);


if($run_news){

echo "<script>alert('News has been inserted successfully')</script>";


}

else{
    
    echo "<script>alert('Error occured   ')</script>";
    echo mysqli_error($con); 
}



}

?>

<?php } ?>
