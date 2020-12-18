<?php



session_start();

include("includes/db.php");



include("functions/functions.php");






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

<body>

    <?php include("includes/navbar.php"); ?>


    <!-- Navbar Ends -->

    <div class="container-fluid " id="slider">
        <!-- container Starts -->

        <div class="col-md-12 ">
            <!-- col-md-12 Starts -->

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- carousel slide Starts --->

                <ol class="carousel-indicators">
                    <!-- carousel-indicators Starts -->

                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                    <li data-target="#myCarousel" data-slide-to="1"></li>

                    <li data-target="#myCarousel" data-slide-to="2"></li>

                    <li data-target="#myCarousel" data-slide-to="3"></li>


                </ol><!-- carousel-indicators Ends -->

                <div class="carousel-inner" style="height: 85vh;">
                    <!-- carousel-inner Starts -->

                    <?php

$get_slides = "select * from slider LIMIT 0,1";

$run_slides = mysqli_query($con,$get_slides);

while($row_slides=mysqli_fetch_array($run_slides)){

$slide_name = $row_slides['slide_name'];
$slide_image = $row_slides['slide_image'];

$slide_url = $row_slides['slide_url'];

echo "

<div class='item active' >

<a href='$slide_url'><img src='admin_area/slides_images/$slide_image' class='img-responsive' style='width: 100%; height: 100%'></a>

</div>

";
}

?>

                    <?php

$get_slides = "select * from slider LIMIT 1,3 ";

$run_slides = mysqli_query($con,$get_slides);

while($row_slides = mysqli_fetch_array($run_slides)) {


$slide_name = $row_slides['slide_name'];

$slide_image = $row_slides['slide_image'];

$slide_url = $row_slides['slide_url'];

echo "

<div class='item slide-item'  >

<a href='$slide_url'><img src='admin_area/slides_images/$slide_image' class='img-responsive' style='width: 100%; height: 100%'></a>

</div>

";


}



?>

                </div><!-- carousel-inner Ends -->

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->


            </div><!-- carousel slide Ends --->

        </div><!-- col-md-12 Ends -->

    </div><!-- container Ends -->

    <!--- Jumbotron-->
    <div class="container-fluid ">
        <div class="row jumbotron box same-height ">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 ">
                <p class="lead ">
                    A web hosting services allows individuals and organizations to make their website accessible via the
                    World Wide Web.

                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 ">
                <a href="# "><button type="button " class="btn btn-outline-secondary ">
                        Web Hosting</button></a>
            </div>
        </div>
    </div>


    <!-- CERTIFICATES -->
    
        <?php
$get_box="select * from box";
$run_box=mysqli_query($con,$get_box);
$box_row=mysqli_fetch_array($run_box);
$content=$box_row['box_content'];
$img=$box_row['box_image'];


?>
        <div class="container-fluid ">
        <div class="row jumbotron box same-height " style="background: rgba(0,0,0,0.1);">
            <div class="col-md-4">
                <img src="admin_area/slides_images/<?php echo $img; ?>"height="400px" alt="">
            </div>

            <div class="col-md-8">
                <p class="lead" style='color: rgba(0,0,0,0.5)'>
                    <?php echo $content; ?>

                </p>
            </div>


        </div>
        </div>

    




    <div class="col-md-12 what">
        <!-- col-md-12 Starts -->

        <h1 class="display-4 text-center ">What's new...</h1>

    </div><!-- col-md-12 Ends -->





    <div class="container-fluid padding card-container">
        <div class="row padding ">

            <?php
  getNews(4);
  ?>


        </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- Vision-->
    <hr class="vision-line">
    <div class="container-fluid padding">

        <div class="row  ">

            <div class="col-md-6 " style="margin-right: 100px;">
            <?php
                $get_vision = "select * from vision";

                $run_vision = mysqli_query($con,$get_vision);
                
                $row_vision = mysqli_fetch_array($run_vision);
                
                $header= $row_vision['header'];
                $statement=$row_vision['statement'];
                $img= $row_vision['image'];


            ?>

                <h2 style="color: darkgray;" class="text-center"><?php echo $header ?></h2>
                <p><?php echo $statement; ?>
                </p>


            </div>
            <div class="col-md-4">
                <img src="admin_area/slides_images/<?php echo $img; ?>" class="img-fluid vision-img" />
            </div>
        </div>
    </div>

    <div class="panel">
        <?php include("includes/footer.php")?>
    </div>
    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>