<?php
 
  
// The file concerned 
$filename = "images/$w_image"; 
  
// Maximum width and height 
$width = 200; 
$height = 200; 
  
// File type 
//header('Content-Type: image/jpg'); 
  
// Get new dimensions 
list($width_orig, $height_orig) = getimagesize($filename); 
  
$ratio_orig = $width_orig/$height_orig; 
  
if ($width/$height > $ratio_orig) { 
    $width = $height*$ratio_orig; 
} else { 
    $height = $width/$ratio_orig; 
} 
  
// Resampling the image  
$image_p = imagecreatetruecolor($width, $height); 
$image = imagecreatefromjpeg($filename); 
  
imagecopyresampled($image_p, $image, 0, 0, 0, 0, 
        $width, $height, $width_orig, $height_orig); 
  
// Display of output image 
imagejpeg($image_p,"image3.jpg");

  


$your_frame_image="image3.jpg";
$your_original_image="marriage.jpg";
 # If you don't know the type of image you are using as your originals.
 $image = imagecreatefromstring(file_get_contents($your_original_image));
 $frame = imagecreatefromstring(file_get_contents($your_frame_image));
 # If you know your originals are of type PNG.
 $image = imagecreatefromjpeg($your_original_image);
 $frame = imagecreatefromjpeg($your_frame_image);
 imagecopymerge($image, $frame, 50, 100, 0, 0, 170, 170, 100);
 # Save the image to a file
 imagejpeg($image, 'marriage_certif.jpg');
 # Output straight to the browser.
 


 // The file concerned 
$filename = "images/$husband_image"; 
  
// Maximum width and height 
$width = 200; 
$height = 200; 
  
// File type 
//header('Content-Type: image/jpg'); 
  
// Get new dimensions 
list($width_orig, $height_orig) = getimagesize($filename); 
  
$ratio_orig = $width_orig/$height_orig; 
  
if ($width/$height > $ratio_orig) { 
    $width = $height*$ratio_orig; 
} else { 
    $height = $width/$ratio_orig; 
} 
  
// Resampling the image  
$image_p = imagecreatetruecolor($width, $height); 
$image = imagecreatefromjpeg($filename); 
  
imagecopyresampled($image_p, $image, 0, 0, 0, 0, 
        $width, $height, $width_orig, $height_orig); 
  
// Display of output image 
imagejpeg($image_p,"image4.jpg");

  


$your_frame_image="image4.jpg";
$your_original_image="marriage_certif.jpg";
 # If you don't know the type of image you are using as your originals.
 $image = imagecreatefromstring(file_get_contents($your_original_image));
 $frame = imagecreatefromstring(file_get_contents($your_frame_image));
 # If you know your originals are of type PNG.
 $image = imagecreatefromjpeg($your_original_image);
 $frame = imagecreatefromjpeg($your_frame_image);
 imagecopymerge($image, $frame, 800, 100, 0, 0, 170, 170, 100);
 # Save the image to a file
 imagejpeg($image, 'marriage_cert.jpg');
 # Output straight to the browser.
 

 
?>