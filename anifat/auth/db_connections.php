<?php

$servername = "localhost";
$db_username = "id9185761_root";
$db_password = "yakubuabiola";
$db_name = "id9185761_app";
$site_name ="location-based advert";
$site_email ="securedhms@gmail.com";
// $smtp_user = 'Securedhms@gmail.com';
//Website facebook profile link
$fblink = "#";

//Website twitter profile link
$twlink = "#";

//Website google plus profile link
$gplink = "#";

//Website linked in profile link
$linkedlink = "#";

$response = "000"; 

try {
	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// session_start();
    // echo "Connected successfully";
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}




class Mail_Func {
	public function sendMail($admins_email,$admin_name,$email, $name, $subject , $message_html, $message)
	{
	
		$smtp_host = 'server1.rockcityfmradio.com';
		$smtp_user = 'jobs@rockcityfmradio.com';
		$smtp_pass = 'Rock1990!';
		include '../mail/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                                      
		$mail->Host = $smtp_host;
		$mail->SMTPAuth = true;                           
		$mail->Username = $smtp_user;               
		$mail->Password = $smtp_pass;                       
		$mail->SMTPSecure = 'tls';                   
		$mail->Port = 587;   

		$mail->setFrom($admins_email, $admin_name);

		$mail->addAddress($email, $name);           

		$mail->isHTML(true);

		$mail->Subject = $subject;
		
		$mail->msgHTML($message_html);
		// $mail->Body    = $message;
		$mail->AltBody = $message;
		// $mail->addAttachment('../view/phpmailer.png', 'image','../view/phpmailer.png');
	//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			// $response_mail = "401";
		} else {
			$response_mail = "402";
		}
	}
}


?>
