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

       $company_name = $_POST['company_name'];
       $company_email = $_POST['company_email'];
       $token = $_POST['token'];
       $comp_address = $_POST['comp_address'];
       $state = $_POST['state'];
       $city = $_POST['city'];
       $lga = $_POST['lga'];
       $zip = $_POST['zip'];
       $contact = $_POST['contact'];
       $Alternate_contact = $_POST['Alternate_contact'];
       $db_comp_id = $_POST['id'];

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
        // $link = "localhostt"."/".$linkzero."/".$hash_password;
        $sql = "UPDATE `register`   
        SET `company_name` = :company_name,
        `company_email` = :company_email,
        `address` = :address,
        `state` = :state,
        `town` = :town,
        `lga` = :lga,
        `zip` = :zip,
        `contact` = :contact,
        `alt_contact` = :alt_contact,
        `img` = :img  
        WHERE `id` = :comp_id
        ";



        $statement = $conn->prepare($sql);
        $statement->bindValue(":company_name", $company_name);
        $statement->bindValue(":company_email", $company_email);
        $statement->bindValue(":address", $comp_address);
        $statement->bindValue(":state", $state);
        $statement->bindValue(":town", $city);
        $statement->bindValue(":lga", $lga);
        $statement->bindValue(":zip", $zip);
        $statement->bindValue(":contact", $contact);
        $statement->bindValue(":alt_contact", $Alternate_contact);
        $statement->bindValue(":img", $file_name);
        $statement->bindValue(":comp_id", $db_comp_id);
        $count = $statement->execute();
        if ($count == true) {
            # code...
            $_SESSION['response'] = "200"; 
                header("location:main/dashboard.php");
        }
        
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    #done updating the database
}else{
   print_r($errors);
}
}else if (isset($_POST['postjob'])) {
  # code...
  postjob();
 }



?>