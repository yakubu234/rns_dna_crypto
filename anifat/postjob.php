<?php

	if(isset($_FILES['image'])){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_name =  substr(str_shuffle($permitted_chars), 0, 10).$file_name;
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

		$extensions= array("jpeg","jpg","png");

		if(in_array($file_ext,$extensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}

		if($file_size > 24097152){
			$errors[]='File size must be excately 8 MB';
		}

		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"main/uploads/".$file_name);
         #if successfully uploaded 

			$company_name = $_POST['comp_name'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$token = $_POST['token'];
			$advert = $_POST['advert'];
			$phone = $_POST['phone'];

			$val = '0';
			try {
				include 'auth/db_connections.php';
				$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $admin_name = $site_name; #admin name for mail function 
        $admins_email = $site_email; #admin email for mail function 
        $subject = "Registration Acknowledgment";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $linkzero = substr(str_shuffle($permitted_chars), 0, 10);

        $stmt = $conn->prepare( "INSERT INTO advert (comp_id, company_name, city, state, token, advert, phone, image)
        	VALUES (:comp_id, :company_name, :city, :state, :token, :advert, :phone, :image)");
        $stmt->bindParam(':comp_id', $token);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':token', $linkzero);
        $stmt->bindParam(':advert', $advert);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':image', $file_name);
        $stmt->execute();

        $_SESSION['response'] = "200"; 
        header("location:main/postjob.php");

    }

    catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
    #done updating the database
}else{
	print_r($errors);
}

}
?>