<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

?>

<?php


$news_id = @$_GET['news_id'];

$get_news = "select * from news where news_url='$news_id'";

$run_news = mysqli_query($con,$get_news);

$check_news = mysqli_num_rows($run_news);

if($check_news == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_news = mysqli_fetch_array($run_news);
$news_title=$row_news['news_title'];
$news_url=$row_news['news_url'];
$news_img=$row_news['news_img'];
$news_img2=$row_news['news_img2'];
$news_img3=$row_news['news_img3'];
$news_content=$row_news['news_content'];
$news_reporter=$row_news['news_reporter'];
$news_date=$row_news['news_date'];
$news_short=$row_news['news_short'];




?>

<!DOCTYPE html>
<html>

<head>
    <title>Ethiopian vital events registration </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <?php include("includes/navbar.php"); ?>

    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->







            <div class="col-md-12">
                <!-- col-md-12 Starts -->

                <div class="row" id="">
                    <!-- row Starts -->

                    <div class="col-sm-6">
                        <!-- col-sm-6 Starts -->

                        <div id="mainImage">
                            <!-- mainImage Starts -->

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <!-- carousel-indicators Starts -->

                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>

                                </ol><!-- carousel-indicators Ends -->

                                <div class="carousel-inner">
                                    <!-- carousel-inner Starts -->

                                    <div class="item active">
                                        <div style="height: 400px;">
                                            <img src='admin_area/news_images/<?php echo $news_img; ?>'
                                                class="img-responsive">
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div style="height: 400px;">
                                            <img src='admin_area/news_images/<?php echo $news_img2; ?>'
                                                class="img-responsive">
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div style="height: 400px;">
                                            <img src='admin_area/news_images/<?php echo $news_img3; ?>'
                                                class="img-responsive">
                                        </div>
                                    </div>

                                </div><!-- carousel-inner Ends -->

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <!-- left carousel-control Starts -->

                                    <span class="glyphicon glyphicon-chevron-left"> </span>

                                    <span class="sr-only"> Previous </span>

                                </a><!-- left carousel-control Ends -->

                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <!-- right carousel-control Starts -->

                                    <span class="glyphicon glyphicon-chevron-right"> </span>

                                    <span class="sr-only"> Next </span>

                                </a><!-- right carousel-control Ends -->

                            </div>

                        </div><!-- mainImage Ends -->



                    </div><!-- col-sm-6 Ends -->


                    <div class="col-sm-6">
                        <!-- col-sm-6 Starts -->

                        <div class="box" style=" ">
                            <!-- box Starts -->

                            <h1 class="text-center"> <?php echo $news_title; ?> </h1>

                            <div style="overflow-y: auto ; height: 270px;">

                                <p class=""><?php echo $news_short?></p>
                            </div>

                            <div class="text-right">
                                <!-- text-right Starts -->

                                <a href="#" data-toggle="collapse" data-target="#more">

                                    View more <i class="fa fa-arrow-circle-right"></i>

                                </a>

                            </div><!-- text-right Ends -->
                        </div><!-- box Ends -->

                    </div>



                </div><!-- col-md-12 Ends -->
<div class=" collapse panel col-md-12" id="more">
    
  

<div class="col-md-12">
    <p class=""><?php echo $news_content?></p>
    </div>
</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

</div>

<div class="panel-body">

                <?php  
getNews(4);
?>
</div>


            </div><!-- container Ends -->
        </div><!-- content Ends -->



        <?php

include("includes/footer.php");

?>

        <script src="js/jquery.min.js"> </script>

        <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php } ?>