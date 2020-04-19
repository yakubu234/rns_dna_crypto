 <?php  
 session_start();
 if (isset($_POST['register'])) {
 	register_user();
 }else if(isset($_POST['Volunteer'])){
 	register_Volunteer();
 }else if(isset($_POST['Subscribe'])){
 	News_Letter();
 }else if(isset($_POST['login'])){
 	Signin();
 }else if(isset($_GET['companyemail']) && !empty($_GET['companyemail']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
 	verify();
 }else if (isset($_POST['postjob'])) {
 	# code...
 	postjob();
 }


 function register_user(){

 	$company_name = $_POST['company-name'];
 	$company_email = $_POST['company-email'];
 	$password = $_POST['password'];
 	$confirm_password = $_POST['confirm-password'];
 	$hash_password = password_hash($confirm_password, PASSWORD_DEFAULT);
 	$val = '0';
 	try {
 		include 'db_connections.php';
 		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$subject = "Registration Acknowledgment";
 		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 		$linkzero = substr(str_shuffle($permitted_chars), 0, 10);
 		$link = "localhostt"."/".$linkzero."/".$hash_password;
 		if ($password == $confirm_password) {
 			$stmt = $conn->prepare("SELECT * FROM register WHERE company_email = :email");
 			$stmt->bindParam(':email', $company_email);
 			$stmt->execute();
 			$result = $stmt->fetchAll();
 			$records = count($result);
 			if ($records > 0) {
 				$_SESSION['response'] = "401";
 				header("location:../signup.php");
 			}else{
 				$stmt = $conn->prepare( "INSERT INTO register (company_name, company_email, password, activate, token)
 					VALUES (:company_name, :company_email, :password, :activate, :token)");
 				$stmt->bindParam(':company_name', $company_name);
 				$stmt->bindParam(':company_email', $company_email);
 				$stmt->bindParam(':password', $hash_password);
 				$stmt->bindParam(':activate', $val);
 				$stmt->bindParam(':token', $linkzero);
 				$stmt->execute();
 				#send email to registrants
 				// $vars = array(
 				// 	'NAME' => $name,
 				// 	'Email' => $email,
 				// 	'link1' => $link
 				// );
 				// $message_html = file_get_contents('../view/contents.html');# an HTML Email

 				// foreach($vars as $search => $replace){
 				// 	$message_html = str_ireplace('%' . $search . '%', $replace, $message_html); 
 				// }
 				$message_html = "
 				Thanks for signing up!
 				Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

 				------------------------
 				<p><b>Username: ".$company_email."</b></p>
 				<p><b>Password: ".$password."</b></p>
 				------------------------

 				Please click this link to activate your account:
 				http://localhost/www/locationadvert/auth/auth.php?companyemail=".$company_email."&hash=".$linkzero; // Our message above including the link";
 				$message = "this is incase the web browser did not read html";
 				#instatiate the mail function
 				$Mail_Func_send = new Mail_Func();
 				$Mail_Func_send->sendMail($admins_email,$admin_name,$company_email, $company_name, $subject , $message_html, $message);
 				$_SESSION['response'] = "200"; 
 				header("location:../success.php");
 			}
 		}else{
 			$_SESSION['response'] = "400"; 	
 			header("location:../signup.php");		
 		}
 	}

 	catch(PDOException $e)
 	{
 		echo "Connection failed: " . $e->getMessage();
 	}
 }

 function verify(){
 	$companyemail = $_GET['companyemail']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    try {
    	include 'db_connections.php';
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$subject = "Registration Acknowledgment";
 		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$stmt = $conn->prepare("SELECT * FROM register WHERE company_email = :company_email and token = :token");
 		$stmt->bindParam(':company_email', $companyemail);
 		$stmt->bindParam(':token', $hash);
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {

 			$sql = "UPDATE register SET activate ='1' WHERE company_email = '$companyemail'";

    // Prepare statement
 			$stmt = $conn->prepare($sql);

    // execute the query
 			$stmt->execute();


 			$_SESSION['response'] = "401";
 			header("location:../verify.php");
 		}else{
 			$_SESSION['response'] = "401";
 			header("location:../verify.php");
 		}
 	}catch(PDOException $e)
 	{
 		echo "Connection failed: " . $e->getMessage();
 	}
 }

// function News_Letter(){
// 	$name = $_POST['name'];
// 	$email = $_POST['email'];
// 	try {
// 		include '../constants/db_connections.php';
// 		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
// 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  		$admin_name = $site_name; #admin name for mail function 
//  		$admins_email = $site_email; #admin email for mail function 
//  		$subject = "Registration Acknowledgment";
//  		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//  		$linkzero = substr(str_shuffle($permitted_chars), 0, 10);
//  		$link = "localhostt"."/".$linkzero."/".$hash_password;
//  		$stmt = $conn->prepare("SELECT * FROM News_Letter WHERE email = :email");
//  		$stmt->bindParam(':email', $email);
//  		$stmt->execute();
//  		$result = $stmt->fetchAll();
//  		$records = count($result);
//  		if ($records > 0) {
//  			$_SESSION['response'] = "401";
//  			header("location:../view/index.php");
//  		}else{
//  			$stmt = $conn->prepare( "INSERT INTO News_Letter (name, email)
//  				VALUES (:name, :email)");
//  			$stmt->bindParam(':name', $name);
//  			$stmt->bindParam(':email', $email);
//  			$stmt->execute();
//  				#send email to registrants
//  			$vars = array(
//  				'NAME' => $name,
//  				'Email' => $email,
//  				'link1' => $link
//  			);
//  				$message_html = file_get_contents('../view/contents.html');# an HTML Email

//  				foreach($vars as $search => $replace){
//  					$message_html = str_ireplace('%' . $search . '%', $replace, $message_html); 
//  				}
//  				$message = "this is incase the web browser did not read html";
//  				#instatiate the mail function
//  				$Mail_Func_send = new Mail_Func();
//  				$Mail_Func_send->sendMail($admins_email,$admin_name,$email, $name, $subject , $message_html, $message);
//  				$_SESSION['response'] = "202"; 
//  				header("location:../view/index.php");
//  			}

//  		}

//  		catch(PDOException $e)
//  		{
//  			echo "Connection failed: " . $e->getMessage();
//  		}
//  	}

 function Signin(){
 	$email = $_POST['email'];
 	$password = $_POST['password'];
 	try {
 		include 'db_connections.php';
 		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$stmt = $conn->prepare("SELECT * FROM register WHERE company_email = :email");
 		$stmt->bindParam(':email', $email);
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {
 			foreach ($result as $row ) {
 				$company_name = $row['company_name'];
 				$company_email = $row['company_email'];
 				$password_hash = $row['password'];
 				$id = $row['id'];
 				$activate = $row['activate'];
 				$token = $row['token'];
 			} 		
 			if ($activate == 1 ) {
 				# code...
 				if (password_verify($password, $password_hash)) {
 					$_SESSION['company_name'] = $company_name;
 					$_SESSION['company_email'] = $company_email;
 					$_SESSION['user_id'] = $id;
 					$_SESSION['comp_token'] = $token;
 					$_SESSION['response'] = "202"; 

 					header('location:..\main/dashboard.php');
 				} else {
 					echo 'Invalid password.';
 				}
 			}else if($activate == 0){
 				session_start();

 				 			header("location:../check.php");
 			}
 		}else{
 			echo	$error= 'this credentials are not valid! please crosschck and re-login';
 		}
 	}
 	catch(PDOException $e)
 	{
 		echo "Connection failed: " . $e->getMessage();
 	}
 }


 ?>
