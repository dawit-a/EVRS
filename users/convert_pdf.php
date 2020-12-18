<?php

if(isset($_POST['b_email'])&&isset($_POST['name']))
{
require 'class/class.phpmailer.php';
    $email=$_POST['b_email'];
    $name=$_POST['b_name'];
    echo $email.' '.$name;
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
	$mail->FromName = 'Dawit Ayele';			//Sets the From name of the message
	$mail->AddAddress($email,$name);		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment("certificate.pdf");     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Birth certificate';			//Sets the Subject of the message
	$mail->Body = 'Congratulations! Here is certificate for you.';				//An HTML or plain text message body
   
    if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
        echo $message;
    }
    else
    {
        echo "Message couldn't be sent!";
        echo $mail->ErrorInfo;
    }
    
}
else{
    echo "Name and email is not sent to me.";
    if(isset($_POST['b_email']))
    echo "email is sent";
    else
    echo "email is not sent";
}
?>

