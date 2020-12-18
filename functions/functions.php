<?php

$db= mysqli_connect("localhost","root","","vers");

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////

function getNews($max){

  global $db;

  $get_news="select * from news order by 1 DESC LIMIT 0,$max ";

  $run_news=mysqli_query($db,$get_news);

  while($row_news=mysqli_fetch_array($run_news)){
    $news_id=$row_news["news_id"];
    $news_title=$row_news["news_title"];
    $news_short=$row_news["news_short"];
    $news_content=$row_news["news_content"];
    $news_img=$row_news["news_img"];
    $news_reporter=$row_news["news_reporter"];
    $news_date=$row_news["news_date"];
    $news_url=$row_news["news_url"];

    echo "

        <div class='col-md-3 full-card'>
           <div class='card '>
               <img src='admin_area/news_images/$news_img' alt='' class='card-img-top img-responsive'>
           </div>
           <div class='card-body ' >
               <h4 class='card-title '>$news_title</h4>
               <p class='card-text '>
                  $news_short
               </p>
               <a href='$news_url' class='btn btn-outline-secondary'  >View more</a>
           </div>
       </div>
    ";

  }


}
 ?>
