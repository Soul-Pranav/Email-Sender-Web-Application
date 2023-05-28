<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['submit']))
{
	$to      = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	try {
		    //Server settings
		    $mail->SMTPDebug = FALSE;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'your Username';  //                   //SMTP username
		    $mail->Password   = 'your password';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom('your emailid', 'PHP Summer Internship');
		    $mail->addAddress($to, '');     //Add a recipient
		               
		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    

		    $mail->send();
		    echo "<script>alert('You Message is been sent successfully');</script>";
		} 
		catch (Exception $e) 
		{
    		echo "<script>alert('Something went wrong..');</script>";
		}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Web App</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!---This is fonts from Google Font Poppins.--->
	<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <!---This is End of Google Font Link.--->

        <!---This is Font Awesome URL(version-4.7.0)--->
        <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!---This is end of Font Awesome URL--->

</head>
<body>
	<div class="header">
		<h1 align="center">Email Sender Web App</h1>
	</div>
	<div class="content">
		<br/><br/><br/>
		<form method="post">
		<table  align="center" cellpadding="10" cellspacing="0">
			<tr>
				<td>To</td>
				<td><input type="text" name="to" placeholder=" Enter your Email id"></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td><input type="text" name="subject" placeholder=" Enter your Subject"></td>
			</tr>
			<tr>
				<td>Message</td>
				<td>
					<textarea name="message">
						
					</textarea>
				</td>
			</tr>
			<tr>
				
				<td colspan="2" align="center"><input type="submit" name="submit" value="Send"></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">
	<p align="center">Made With <i class="fa fa-heart-o"></i> by Pranav Malhotra</p>
        </div>
	</div>
</body>
</html>