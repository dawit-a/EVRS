<?php
   if(isset($_GET['certify'])&&isset($_GET['bid']))
   {
      $bid=$_GET['bid'];
      $get_record = "select * from birth_records where bid=$bid";

      $run_record = mysqli_query($con,$get_record);
      
      $row_birth_record=mysqli_fetch_array($run_record);
      
          $bid = $row_birth_record['bid'];
      
          $name = $row_birth_record['name'];
          $fname= $row_birth_record['father_name'];
          $gfname= $row_birth_record['grand_father_name'];
          $dob="".$row_birth_record['date_of_birth'];
          $nationality= $row_birth_record['nationality'];
          $pob=$row_birth_record['place_of_birth'];
          $father_nationality=$row_birth_record['father_nationality'];
          $mother_nationality=$row_birth_record['mother_nationality'];
          $Father_full_name= $row_birth_record['father_full_name'];
          $mother_full_name= $row_birth_record['mother_full_name'];
          $region=$row_birth_record['region'];
          $zone=$row_birth_record['zone'];
          $woreda=$row_birth_record['woreda'];
          $f_bid=$row_birth_record['father_bid'];
          $m_bid=$row_birth_record['mother_bid'];
          $sex= $row_birth_record['gender'];
          $image=$row_birth_record['image'];;
   $timestamp=strtotime($dob);
   $dob_day=date('d',$timestamp);
   $dob_month=date('m',$timestamp);
   $dob_year=date('Y',$timestamp);
   $dobr_month='04';
   $dobr_year="2020";
   $dobr_date="16";
   $doc_date=date('d');
   $doc_month=date('m');
   $doc_year=date('Y');
   $user_name="Aberham";
   $user_fname="Ayele";
   $user_gfname="Feyissa";
   $bid="0000".$bid;

   
   include("search.php");

   $image = "certi.jpg";

   $createimage = imagecreatefromjpeg($image);

   //this is going to be created once the generate button is clicked
   $output = "certificate.jpg";

   //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
   $white = imagecolorallocate($createimage, 233, 215, 255);
   $black = imagecolorallocate($createimage, 0, 0, 0);

   //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
   $rotation = 0;

  
   //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
    $font_size=11;
   $certificate_text = $name;

   //font directory for name
   $drFont = dirname(__FILE__)."/OpenSans-Regular.ttf";

   // font directory for occupation name
   $drFont1 = dirname(__FILE__)."/Gotham-black.otf";

   //function to display name on certificate picture
   $text1 = imagettftext($createimage, $font_size, 0, 830, 80, $black,$drFont, $bid);
   $text1 = imagettftext($createimage, $font_size, 0, 106, 255, $black,$drFont, $certificate_text);
   $text2 = imagettftext($createimage, $font_size, 0, 460, 255, $black,$drFont, $fname);
   $text3 = imagettftext($createimage, $font_size, 0, 780, 255, $black,$drFont, $gfname);
   $text4 = imagettftext($createimage, $font_size, 0, 60, 307, $black,$drFont, $sex);
   $text5 = imagettftext($createimage, $font_size, 0, 340, 307, $black,$drFont, $dob_month);
   $text6 = imagettftext($createimage, $font_size, 0, 450, 307, $black,$drFont, $dob_day);
   $text7 = imagettftext($createimage, $font_size, 0, 517, 307, $black,$drFont, $dob_year);
   $text8 = imagettftext($createimage, $font_size, 0, 170, 360, $black,$drFont, $pob);
   $text9 = imagettftext($createimage, $font_size, 0, 460, 360, $black,$drFont, $region);
   $text10 = imagettftext($createimage, $font_size, 0, 770, 360, $black,$drFont, $zone);
   $text11 = imagettftext($createimage, $font_size, 0, 170, 410, $black,$drFont, $woreda);
   $text12 = imagettftext($createimage, $font_size, 0, 400, 410, $black,$drFont, $nationality);
   $text13 = imagettftext($createimage, $font_size, 0, 170, 465, $black,$drFont, $mother_full_name);
   $text14 = imagettftext($createimage, $font_size, 0, 700, 465, $black,$drFont, $mother_nationality);
   $text15 = imagettftext($createimage, $font_size, 0, 170, 520, $black,$drFont,$Father_full_name);
   $text16 = imagettftext($createimage, $font_size, 0, 700, 520, $black,$drFont,$father_nationality);
   $text17 = imagettftext($createimage, $font_size, 0, 230, 575, $black,$drFont,$dobr_month);
   $text18 = imagettftext($createimage, $font_size, 0, 315, 575, $black,$drFont,$dobr_date);
   $text19 = imagettftext($createimage, $font_size, 0, 430, 575, $black,$drFont,$dobr_year);
   $text20 = imagettftext($createimage, $font_size, 0, 740, 575, $black,$drFont,$doc_date);
   $text21 = imagettftext($createimage, $font_size, 0, 850, 575, $black,$drFont,$doc_month);
   $text22 = imagettftext($createimage, $font_size, 0, 955, 575, $black,$drFont,$doc_year);
   $text23 = imagettftext($createimage, $font_size, 0, 170, 628, $black,$drFont,$user_name);
   $text24 = imagettftext($createimage, $font_size, 0, 470, 628, $black,$drFont,$user_fname);
   $text24 = imagettftext($createimage, $font_size, 0, 770, 628, $black,$drFont,$user_gfname);
   imagejpeg($createimage,$output,100);

   require("fpdf.php");
   $pdf=new FPDF();
   $pdf->AddPage();
   $pdf->Image('certificate.jpg',0,0,200,200);
   $pdf->output('certificate.pdf','F');
   

?>
<div class="col-md-8">
    <img src="<?php echo $output; ?>" class="img-responsive">
    <br>
    <br>
</div>
<div class="col-md-4">
<img src="send.gif" class="img-responsive">
</div>
<div class="col-md-4" >
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <!-- form-horizontal Starts -->

        <div class="form-group ">
            <!-- form-group Starts -->

            <label class="col-md-12 text-left"> Name</label>

            <div class="col-md-12">

                <input type="text" name="b_name" class="form-control" value="<?php echo $name.' '.$fname ?>" required>

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
    <a href='registrar.php?bid=<?php echo $bid ?>&lang=eng' class='btn btn-primary text-right'>Back</a>
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
	$mail->Subject = 'Birth certificate';			//Sets the Subject of the message
	$mail->Body = 'Congratulations! Here is certificate for you.';				//An HTML or plain text message body
   
    if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Certificate has been send successfully...</label>';
        echo $message;
      echo  "<a href='registrar.php?bid=$bid&lang=eng' class='btn btn-primary'>Close</a>";
    }
    else
    {
        echo "Message couldn't be sent!";
        echo $mail->ErrorInfo;
    }
    
}
} ?>