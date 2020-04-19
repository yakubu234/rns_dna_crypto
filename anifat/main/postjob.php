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
?>

<!--checkout start-->
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="woo-cart-table">
					<div class="row">
						<form class="checkout woocommerce-checkout" method="POST" action="..\postjob.php" enctype="multipart/form-data">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3 class="checkout-heading">Post Advertisement</h3>
								<div class="row">
									<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label>Country <sup>*</sup></label>
											<select class="form-control">
												<option value="0">Select a country…</option>
												<option value="1">Åland Islands</option>
												<option value="2">Algeria</option>
												<option value="3">Australia</option>
												<option value="4">Brazil</option>
												<option value="5">India</option>
												<option value="6">Switzerland</option>
												<option value="7">United Kingdom (UK)</option>
												<option value="8">United States (US)</option>
											</select>
										</div>
									</div> -->
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
											<input type="hidden" name="token" value="<?php echo $token;?>">
											<label>Company name <sup>*</sup></label>
											<input type="text" class="form-control" name="comp_name" value="<?php echo $comp_name; ?>" readonly placeholder="">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
											<label>City <sup>*</sup></label>
											<input type="text" name="city" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label>State <sup>*</sup></label>
											<select class="form-control" name="state">
												<option value="ABUJA FCT">ABUJA FCT</option>
												<option value="ABIA">ABIA</option>
												<option value="ADAMAWA">ADAMAWA</option>
												<option value="AKWA IBOM">AKWA IBOM</option>
												<option value="ANAMBRA">ANAMBRA</option>
												<option value="BAUCHI">BAUCHI</option>
												<option value="BAYELSA">BAYELSA</option>
												<option value="BENUE">BENUE</option>
												<option value="BORNO">BORNO</option>
												<option value="CROSS RIVER">CROSS RIVER</option>
												<option value="DELTA">DELTA</option>
												<option value="EBONYI">EBONYI</option>
												<option value="EDO">EDO</option>
												<option value="EKITI">EKITI</option>
												<option value="ENUGU">ENUGU</option>
												<option value="GOMBE">GOMBE</option>
												<option value="IMO">IMO</option>
												<option value="JIGAWA">JIGAWA</option>
												<option value="KADUNA">KADUNA</option>
												<option value="KANO">KANO</option>
												<option value="KATSINA">KATSINA</option>
												<option value="KEBBI">KEBBI</option>
												<option value="KOGI">KOGI</option>
												<option value="KWARA">KWARA</option>
												<option value="LAGOS">LAGOS</option>
												<option value="NASSARAWA">NASSARAWA</option>
												<option value="NIGER">NIGER</option>
												<option value="OGUN">OGUN</option>
												<option value="ONDO">ONDO</option>
												<option value="OSUN">OSUN</option>
												<option value="OYO">OYO</option>
												<option value="PLATEAU">PLATEAU</option>
												<option value="RIVERS">RIVERS</option>
												<option value="SOKOTO">SOKOTO</option>
												<option value="TARABA">TARABA</option>
												<option value="YOBE">YOBE</option>
												<option value="ZAMFARA">ZAMFARA</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label>Company Advert Detail <sup style="color:red;" >(max 500 words)</sup></label>
											<textarea class="form-control" name="advert"></textarea> 
										</div>
									</div>
									
									

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
											<label>phone <sup>*</sup></label>
											<input type="text" name="phone" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
											<label>Advert Cover Photo<sup>*</sup></label>
											<input type="file" name="image" class="form-control" placeholder="">
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<button type="submit" name="postjob" class="btn ed_btn pull-right ed_orange">Post</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--checkout end-->

<?php include('footer.php'); ?>