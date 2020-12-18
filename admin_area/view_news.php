<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View news

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View news

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>News Title:</th>

<th>News URL:</th>

<th>News Image:</th>

<th>News Date:</th>

<th>News short:</th>
<th>Edit News:</th>

<th>Delete News:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php



$get_news="select * from news order by 1 DESC  ";

  $run_news=mysqli_query($con,$get_news);

  while($row_news=mysqli_fetch_array($run_news)){
    $news_id=$row_news["news_id"];
    $news_title=$row_news["news_title"];
    $news_short=$row_news["news_short"];
    $news_content=$row_news["news_content"];
    $news_img=$row_news["news_img"];
    $news_reporter=$row_news["news_reporter"];
    $news_date=$row_news["news_date"];
    $news_url=$row_news["news_url"];




?>

<tr>

<td><?php echo $news_title; ?></td>

<td><?php echo $news_url; ?></td>

<td><img src="news_images/<?php echo $news_img; ?>" width="60" height="60" ></td>

<td><?php echo $news_date; ?></td>

<td><?php echo $news_short; ?></td>
<td>

<a href="index.php?edit_news=<?php echo $news_id; ?>" >

 <i class="fa fa-edit"></i>Edit

</a>

</td>

<td>

<a href="index.php?news_delete=<?php echo $news_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>