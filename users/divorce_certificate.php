<?php
   if(isset($_GET['certify'])&&isset($_GET['divorce_id']))
   {
      $did=$_GET['divorce_id'];
      $get_record = "select * from divorce_records where divorce_id=$did";

$run_record = mysqli_query($con,$get_record);
$row_divorce_record=mysqli_fetch_array($run_record);
$mid = $row_divorce_record['mid'];

$dod=$row_divorce_record['dod'];
$region=$row_divorce_record['region'];
$zone=$row_divorce_record['zone'];
$woreda=$row_divorce_record['woreda'];

     $get_bid="select * from marriage_records where mid=$mid";
     $run_bid=mysqli_query($con,$get_bid);
     $row_bid=mysqli_fetch_array($run_bid);
     $divorce_bid=$row_bid['h_bid'];
     $divorcee_bid=$row_bid['w_bid'];
    
      $get_divorce="select * from birth_records where bid=$divorce_bid";
      $run_record = mysqli_query($con,$get_divorce);
      
      $row_divorce_record=mysqli_fetch_array($run_record);
      
          $divorce_name = $row_divorce_record['name'];
         
          $divorce_fname= $row_divorce_record['father_name'];
          $divorce_gfname= $row_divorce_record['grand_father_name'];
          $divorce_dob="".$row_divorce_record['date_of_birth'];
          $divorce_nationality= $row_divorce_record['nationality'];
          $divorce_pob=$row_divorce_record['place_of_birth'];
          $divorce_region=$row_divorce_record['region'];
          $divorce_zone=$row_divorce_record['zone'];

          $get_divorcee="select * from birth_records where bid=$divorcee_bid";
          $run_record = mysqli_query($con,$get_divorcee);
          
          $row_divorcee_record=mysqli_fetch_array($run_record);
          
              $divorcee_name = $row_divorcee_record['name'];
              $divorcee_fname= $row_divorcee_record['father_name'];
              $divorcee_gfname= $row_divorcee_record['grand_father_name'];
              $divorcee_dob="".$row_divorcee_record['date_of_birth'];
              $divorcee_nationality= $row_divorcee_record['nationality'];
              $divorcee_pob=$row_divorcee_record['place_of_birth'];
              $divorcee_region=$row_divorce_record['region'];
              $divorcee_zone=$row_divorce_record['zone'];
   $timestamp=strtotime($divorce_dob);
   $divorce_dob_day=date('d',$timestamp);
   $divorce_dob_month=date('m',$timestamp);
   $divorce_dob_year=date('Y',$timestamp);
   $timestamp=strtotime($divorcee_dob);
   $divorcee_dob_day=date('d',$timestamp);
   $divorcee_dob_month=date('m',$timestamp);
   $divorcee_dob_year=date('Y',$timestamp);
   $d_timestamp=strtotime($dod);
   $dod_day=date('d',$d_timestamp);
   $dod_month=date('m',$d_timestamp);
   $dod_year=date('Y',$d_timestamp);
   $dodr_month='04';
   $dodr_year="2020";
   $dodr_date="16";
   $doc_date=date('d');
   $doc_month=date('m');
   $doc_year=date('Y');
   $user_name="Aberham";
   $user_fname="Ayele";
   $user_gfname="Feyissa";
   $divorce_bid="0000".$divorce_bid;
   $divorcee_bid="0000".$divorcee_bid;
   $did="0000".$did;
   $pod=$woreda.",".$zone.",".$region;
   
   include("search.php");

   $image = "divorce_certif.jpg";

   $createimage = imagecreatefromjpeg($image);

   //this is going to be created once the generate button is clicked
   $output = "divorce_certificate.jpg";

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
   $text1 = imagettftext($createimage, $font_size, 0, 180, 85, $black,$drFont, $did);
   $text1 = imagettftext($createimage, $font_size, 0, 840, 50, $black,$drFont, $divorcee_bid);
   $text1 = imagettftext($createimage, $font_size, 0, 840, 85, $black,$drFont, $divorce_bid);
   $text1 = imagettftext($createimage, $font_size, 0, 120, 277, $black,$drFont, $divorcee_name);
   $text1 = imagettftext($createimage, $font_size, 0, 260, 277, $black,$drFont, $divorcee_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 445, 277, $black,$drFont, $divorcee_gfname);
   $text1 = imagettftext($createimage, $font_size, 0, 600, 277, $black,$drFont, $divorce_name);
   $text1 = imagettftext($createimage, $font_size, 0, 740, 277, $black,$drFont, $divorce_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 905, 277, $black,$drFont, $divorce_gfname);
   
   $text1 = imagettftext($createimage, $font_size, 0, 180, 335, $black,$drFont, $divorcee_dob_month);
   $text1 = imagettftext($createimage, $font_size, 0, 740, 335, $black,$drFont, $divorce_dob_day);
   $text1 = imagettftext($createimage, $font_size, 0, 815, 335, $black,$drFont, $divorce_dob_year);
   $text1 = imagettftext($createimage, $font_size, 0, 630, 335, $black,$drFont, $divorce_dob_month);
   $text1 = imagettftext($createimage, $font_size, 0, 270, 335, $black,$drFont, $divorcee_dob_day);
   $text1 = imagettftext($createimage, $font_size, 0, 350, 335, $black,$drFont, $divorcee_dob_year);
   $text1 = imagettftext($createimage, $font_size, 0, 170, 390, $black,$drFont, $divorcee_pob);
   $text1 = imagettftext($createimage, $font_size, 0, 370, 390, $black,$drFont, $divorcee_region);
   $text1 = imagettftext($createimage, $font_size, 0, 630, 390, $black,$drFont, $divorce_pob);
   $text1 = imagettftext($createimage, $font_size, 0, 840, 390, $black,$drFont, $divorce_region);
   $text1 = imagettftext($createimage, $font_size, 0, 170, 445, $black,$drFont, $divorcee_zone);
   $text1 = imagettftext($createimage, $font_size, 0, 340, 445, $black,$drFont, $divorcee_nationality);
   $text1 = imagettftext($createimage, $font_size, 0, 645, 445, $black,$drFont, $divorce_zone);
   $text1 = imagettftext($createimage, $font_size, 0, 790, 445, $black,$drFont, $divorce_nationality);
   $text1 = imagettftext($createimage, $font_size, 0, 180, 505, $black,$drFont, $dod_month);
   $text1 = imagettftext($createimage, $font_size, 0, 265, 505, $black,$drFont, $dod_day);
   $text1 = imagettftext($createimage, $font_size, 0, 340, 505, $black,$drFont, $dod_year);
   $text1 = imagettftext($createimage, $font_size, 0, 660, 505, $black,$drFont, $pod);
   $text1 = imagettftext($createimage, $font_size, 0, 265, 563, $black,$drFont, $dodr_month);
   $text1 = imagettftext($createimage, $font_size, 0, 350, 563, $black,$drFont, $dodr_date);
   $text1 = imagettftext($createimage, $font_size, 0, 435, 563, $black,$drFont, $dodr_year);
   $text1 = imagettftext($createimage, $font_size, 0, 705, 563, $black,$drFont, $dodr_month);
   $text1 = imagettftext($createimage, $font_size, 0, 795, 563, $black,$drFont, $dodr_date);
   $text1 = imagettftext($createimage, $font_size, 0, 870, 563, $black,$drFont, $dodr_year);
   $text1 = imagettftext($createimage, $font_size, 0, 185, 623, $black,$drFont, $user_name);
   $text1 = imagettftext($createimage, $font_size, 0, 435, 623, $black,$drFont, $user_fname);
   $text1 = imagettftext($createimage, $font_size, 0, 715, 623, $black,$drFont, $user_gfname);
   imagejpeg($createimage,$output,100);


   require("fpdf.php");
   $pdf=new FPDF();
   $pdf->AddPage();
   $pdf->Image('divorce_certificate.jpg',0,0,200,200);
  // $pdf->output('divorce_certificate.pdf','F');
   

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

                <input type="text" name="b_name" class="form-control" value="<?php echo $divorce_name.' '.$divorce_fname ?>" required>

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
	$mail->AddAttachment("divorce_certificate.pdf");     				//Adds an attachment from a path on the filesystem
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