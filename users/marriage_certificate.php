<?php
   if(isset($_GET['certify'])&&isset($_GET['mid']))
   {
      $mid=$_GET['mid'];
      $get_record = "select * from marriage_records where mid=$mid";

$run_record = mysqli_query($con,$get_record);
$row_marriage_record=mysqli_fetch_array($run_record);
$mid = $row_marriage_record['mid'];
$w_bid = $row_marriage_record['w_bid'];
$h_bid = $row_marriage_record['h_bid'];
$dom=$row_marriage_record['dom'];
$region=$row_marriage_record['mr_region'];
$zone=$row_marriage_record['mr_zone'];
$woreda=$row_marriage_record['mr_woreda'];

      $get_wife="select * from birth_records where bid=$w_bid";
      $run_record = mysqli_query($con,$get_wife);
      
      $row_wife_record=mysqli_fetch_array($run_record);
      
          $w_name = $row_wife_record['name'];
         
          $w_fname= $row_wife_record['father_name'];
          $w_gfname= $row_wife_record['grand_father_name'];
          $w_dob="".$row_wife_record['date_of_birth'];
          $w_nationality= $row_wife_record['nationality'];
          $w_pob=$row_wife_record['place_of_birth'];
          $w_region=$row_wife_record['region'];
          $w_zone=$row_wife_record['zone'];
          $w_image=$row_wife_record['image'];
          $get_divorcee="select * from birth_records where bid=$h_bid";
          $run_record = mysqli_query($con,$get_divorcee);
          
          $row_husband_record=mysqli_fetch_array($run_record);
          
              $husband_name = $row_husband_record['name'];
              $husband_fname= $row_husband_record['father_name'];
              $husband_gfname= $row_husband_record['grand_father_name'];
              $husband_dob="".$row_husband_record['date_of_birth'];
              $husband_nationality= $row_husband_record['nationality'];
              $husband_pob=$row_husband_record['place_of_birth'];
              $husband_region=$row_husband_record['region'];
              $husband_zone=$row_husband_record['zone'];
              $husband_image=$row_husband_record['image'];
   $timestamp=strtotime($w_dob);
   $w_dob_day=date('d',$timestamp);
   $w_dob_month=date('m',$timestamp);
   $w_dob_year=date('Y',$timestamp);
   $timestamp=strtotime($husband_dob);
   $husband_dob_day=date('d',$timestamp);
   $husband_dob_month=date('m',$timestamp);
   $husband_dob_year=date('Y',$timestamp);
   $d_timestamp=strtotime($dom);
   $dom_day=date('d',$d_timestamp);
   $dom_month=date('m',$d_timestamp);
   $dom_year=date('Y',$d_timestamp);
   $dodr_month='04';
   $dodr_year="2020";
   $dodr_date="16";
   $doc_date=date('d');
   $doc_month=date('m');
   $doc_year=date('Y');
   $user_name="Aberham";
   $user_fname="Ayele";
   $user_gfname="Feyissa";
   $w_bid="0000".$w_bid;
   $h_bid="0000".$h_bid;
   $mid="0000".$mid;
   $pom=$woreda.",".$zone.",".$region;
   
   include("search.php");
   include('image.php');

   $image = "marriage_cert.jpg";

   $createimage = imagecreatefromjpeg($image);

   //this is going to be created once the generate button is clicked
   $output = "marriage_certificate.jpg";

   //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
   $white = imagecolorallocate($createimage, 233, 215, 255);
   $black = imagecolorallocate($createimage, 0, 0, 0);

   //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
   $rotation = 0;

  
   //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
    $font_size=11;


   //font directory for name
   $drFont = dirname(__FILE__)."/OpenSans-Regular.ttf";

   // font directory for occupation name
   $drFont1 = dirname(__FILE__)."/Gotham-black.otf";

   //function to display name on certificate picture
   $text1 = imagettftext($createimage, $font_size, 0, 180, 85, $black,$drFont, $mid);
   $text1 = imagettftext($createimage, $font_size, 0, 840, 50, $black,$drFont, $w_bid);
   $text1 = imagettftext($createimage, $font_size, 0, 840, 85, $black,$drFont, $h_bid);
   $text1 = imagettftext($createimage, $font_size, 0, 95, 313, $black,$drFont, $w_name);
   $text1 = imagettftext($createimage, $font_size, 0, 257, 313, $black,$drFont, $w_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 440, 313, $black,$drFont, $w_gfname);
   $text1 = imagettftext($createimage, $font_size, 0, 615, 313, $black,$drFont, $husband_name);
   $text1 = imagettftext($createimage, $font_size, 0, 765, 313, $black,$drFont, $husband_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 925, 313, $black,$drFont, $husband_gfname);
   
   $text1 = imagettftext($createimage, $font_size, 0, 160, 365, $black,$drFont, $w_dob_month);
   $text1 = imagettftext($createimage, $font_size, 0, 750, 365, $black,$drFont, $husband_dob_day);
   $text1 = imagettftext($createimage, $font_size, 0, 825, 365, $black,$drFont, $husband_dob_year);
   $text1 = imagettftext($createimage, $font_size, 0, 650, 365, $black,$drFont, $husband_dob_month);
   $text1 = imagettftext($createimage, $font_size, 0, 270, 365, $black,$drFont, $w_dob_day);
   $text1 = imagettftext($createimage, $font_size, 0, 350, 365, $black,$drFont, $w_dob_year);

   

   $text1 = imagettftext($createimage, $font_size, 0, 385, 520, $black,$drFont, $region);
   $text1 = imagettftext($createimage, $font_size, 0, 665,  520, $black,$drFont, $zone);
   $text1 = imagettftext($createimage, $font_size, 0, 830, 520, $black,$drFont, $woreda);
   $text1 = imagettftext($createimage, $font_size, 0, 450, 573, $black,$drFont, $woreda);
   $text1 = imagettftext($createimage, $font_size, 0, 100, 418, $black,$drFont, $w_nationality);

   $text1 = imagettftext($createimage, $font_size, 0, 600, 418, $black,$drFont, $husband_nationality);
   $text1 = imagettftext($createimage, $font_size, 0, 240, 470, $black,$drFont, $dom_month);
   $text1 = imagettftext($createimage, $font_size, 0, 385, 470, $black,$drFont, $dom_day);
   $text1 = imagettftext($createimage, $font_size, 0, 450, 470, $black,$drFont, $dom_year);

   $text1 = imagettftext($createimage, $font_size, 0, 235, 630, $black,$drFont, $dodr_month);
   $text1 = imagettftext($createimage, $font_size, 0, 310, 630, $black,$drFont, $dodr_date);
   $text1 = imagettftext($createimage, $font_size, 0, 375, 630, $black,$drFont, $dodr_year);
   $text1 = imagettftext($createimage, $font_size, 0, 705, 630, $black,$drFont, $dodr_month);
   $text1 = imagettftext($createimage, $font_size, 0, 795, 630, $black,$drFont, $dodr_date);
   $text1 = imagettftext($createimage, $font_size, 0, 895, 630, $black,$drFont, $dodr_year);
   $text1 = imagettftext($createimage, $font_size, 0, 155, 680, $black,$drFont, $user_name);
   $text1 = imagettftext($createimage, $font_size, 0, 385, 680, $black,$drFont, $user_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 625, 680, $black,$drFont, $user_gfname);
   imagejpeg($createimage,$output,100);


   require("fpdf.php");
   $pdf=new FPDF();
   $pdf->AddPage();
   $pdf->Image('marriage_certificate.jpg',0,0,200,200);
   //$pdf->output('certificate.pdf','F');
   

?>
<div class="col-md-8">
    <img src="<?php echo $output; ?>" class="img-responsive">
    <br>
    <br>
</div>
<div class="col-md-4">
<img src="send.gif" class="img-responsive" >
    
</div>
<div class="col-md-4" >
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <!-- form-horizontal Starts -->

        <div class="form-group ">
            <!-- form-group Starts -->

            <label class="col-md-12 text-left"> Name</label>

            <div class="col-md-12">

                <input type="text" name="b_name" class="form-control" value="<?php echo $w_name.' '.$w_fname ?>" required>

            </div>
        </div>
            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-12 text-left"> Enter  email address</label>

                <div class="col-md-12">

                    <input type="email" name="b_email" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->

            <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-12">

                    <input type="submit" name="send" value="Send certificate" class="btn btn-primary form-control">

                </div>

            </div><!-- form-group Ends -->
    </form>
    <a href='registrar.php?bid=<?php echo $divorcee_bid ?>&lang=eng' class='btn btn-primary'>Back</a>
</div>

<?php
if(isset($_POST['send']))
{
   require 'class/class.phpmailer.php';
    $email=$_POST['b_email'];
    $name=$_POST['b_name'];
    
    $mail = new PHPMailer;
   
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; 								//Sets Mailer to send message using SMTP
	//Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '587';					//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'dawitayele6875@gmail.com';					//Sets SMTP username
	$mail->Password = 'eteyoeteyo6875';					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'dawitayele@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'Ethiopian Vital Events Registration System';			//Sets the From name of the message
	$mail->AddAddress($email,$name);		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment("certificate.pdf");     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Divorce certificate';			//Sets the Subject of the message
	$mail->Body = 'Congratulations! Here is certificate for you.';				//An HTML or plain text message body
   
    if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Certificate has been send successfully...</label>';
        echo $message;
      echo  "<a href='registrar.php?bid=$divorce_bid&lang=eng' class='btn btn-primary'>Close</a>";
    }
    else
    {
        echo "Message couldn't be sent!";
        echo $mail->ErrorInfo;
    }
    
}
} ?>