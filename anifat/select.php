
<?php include('header.php');
session_start();
$comp_name = $_SESSION['company_name'];
$comp_email = $_SESSION['company_email'];
$comp_id = $_SESSION['user_id']; 
$token = $_SESSION['comp_token'] ;

// if(isset($_GET['unit']) && !empty($_GET['unit']) ){
// 	$compid =$_GET['unit'];
// 	include '..\auth/db_connections.php';
// 	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  		$admin_name = $site_name; #admin name for mail function 
//  		$admins_email = $site_email; #admin email for mail function 
//  		$stmt = $conn->prepare("SELECT * FROM register WHERE id = :id");
//  		$stmt->bindParam(':id', $compid);
//  		$stmt->execute();
//  		$result = $stmt->fetchAll();
//  		$records = count($result);
//  		if ($records > 0) {
//  			foreach ($result as $row ) {
//  				$company_name = $row['company_name'];
//  				$company_email = $row['company_email'];
//  				$activate = $row['activate'];
//  				$token = $row['token'];
//  			} 		


//  		}
//  	}else{
//  		$company_name = $comp_name;
//  		$company_email = $comp_email;
//  		$comp_id = $comp_id;
//  		$token = $_SESSION['comp_token'] ;
//  	}

	include 'auth/db_connections.php';
	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$stmt = $conn->prepare("SELECT * FROM advert ");
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {
 			foreach ($result as $row ) {
 				$company_name = $row['company_name'];
 				$company_email = $row['company_email'];
 				$activate = $row['activate'];
 				$token = $row['token'];
 			} 		


 		}else{
 			echo "not greater than zero";
 		}
 	
?>
