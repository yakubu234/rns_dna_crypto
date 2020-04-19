<?php
include('../constants/db_connections.php');
try {
	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
	$stmt = $conn->prepare("SELECT * FROM register");
	$stmt->execute();
	if($stmt->rowCount() === 0) $Existed_email == " " ;
	while ($row = $stmt->fetch()) {
		$Existed_email = $row['email'];
	}
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

?>