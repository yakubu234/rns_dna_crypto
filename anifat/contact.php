<?php
if (isset($_POST["send"])) {
	# code...
	$un=$_POST['username'];
	$em=$_POST['useremail'];
	$phone =$_POST['useresubject'];
	$msg=$_POST['mesg'];
	if(trim($un)!="" && trim($msg)!="" && trim($phone)!="" && trim($em)!="")
	{
		if(filter_var($em, FILTER_VALIDATE_EMAIL))
		{
			try {
				include 'auth/db_connections.php';
				$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$subject = "Booking Appointment";
 		$email = "anifatazeez4@gmail.com";
 		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 		$linkzero = substr(str_shuffle($permitted_chars), 0, 10);
 		$stmt = $conn->prepare( "INSERT INTO bookings (name, email, phone, message)
 			VALUES (:name, :email, :phone, :message)");
 		$stmt->bindParam(':name', $un);
 		$stmt->bindParam(':email', $em);
 		$stmt->bindParam(':phone', $phone);
 		$stmt->bindParam(':message', $msg);
 		$stmt->execute();

 		$message_html = "Hi Admin..<p>".$un." has sent a booking appointment <br>with the contact number <a href='tel:".$phone."'> ".$phone." </a><br> email id as ".$em."</p><p>the entire message is : ".$msg."</p>";
 		$message = " dear admin someone has booked appointment with you";
 		 // Our message above including the link";
 		// $message = "this is incase the web browser did not read html";
 				#instatiate the mail function
 		$Mail_Func_send = new Mail_Func();

 		$smtp_host = 'server1.rockcityfmradio.com';
		$smtp_user = 'jobs@rockcityfmradio.com';
		$smtp_pass = 'Rock1990!';
		include 'mail/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                                      
		$mail->Host = $smtp_host;
		$mail->SMTPAuth = true;                           
		$mail->Username = $smtp_user;               
		$mail->Password = $smtp_pass;                       
		$mail->SMTPSecure = 'tls';                   
		$mail->Port = 587;   

		$mail->setFrom($em, $un);

		$mail->addAddress($email, 'The admin');           

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
			$success = "your appointment has been recieved, thanks for booking with us";
		}



 		// $Mail_Func_send->sendMail($admins_email,$admin_name,$email, $un, $subject , $message_html, $message);

 	}		
 	catch(PDOException $e)
 	{
 		echo "Connection failed: " . $e->getMessage();
 	}
 }
 else{
 	echo '2#<p style="color:red">Please, provide valid Email.</p>';
}
}
else
{
	echo '2#<p style="color:red">Please, fill all the details.</p>';
}
}
?>

<!--Header start-->

<?php include('header.php'); ?>	

<!--header end -->

<!--Breadcrumb end-->
<!--Section fourteen Contact form start-->
<div class="ed_graysection  ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<form method="POST"  action="#" >
				<div class="ed_contact_form ed_toppadder60">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="ed_heading_top">
							<h3>Send us a message</h3>
						</div>
					</div>
					<p>&nbsp;</p>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div  ><?php if (isset($success)) {
							echo "<p class='alert alert-success' >".$success.'</p>';
						} ?></div>
						<div class="form-group">
							<input type="text" name="username" id="uname" class="form-control" required="" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="email" name="useremail" id="umail" class="form-control" required=""  placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" name="useresubject" id="sub" class="form-control" required=""  placeholder="Phone Number">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<textarea id="msg" name="mesg" class="form-control" rows="6" required="" placeholder="Message"></textarea>
						</div>
						<button name="send" id="ed_submit" class="btn ed_btn ed_orange pull-right">send</button>
						<!-- <p>&nbsp;</p> -->
						<p id="err"></p>
						<p>&nbsp;</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include ('footer.php'); ?>
<!--Footer Bottom section end-->
