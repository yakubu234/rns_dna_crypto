<!--Header start-->
<?php include ('header.php'); 
$currentlocation = "ogun";
?>
<!--header end -->
<div class="ed_slider_form_section">
<!--Slider start-->
	
<!--Slider end-->
<!--Slider form start-->
<!-- <div style="height: 200px; width:100%;" ></div> -->
<div class="ed_form_box">
<div class="container">
	<div class="ed_search_form">
		<form class="form-inline" method="POST" action="#">
					<div class="form-group">
						<!-- <input type="text" name="state" placeholder="Location" class="form-control" id="course"> -->
						<select class="form-control" name="state" >
												<option selected disabled="">Chose State</option>
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
					<div class="form-group">
						<input type="text" placeholder="City" name="city" class="form-control" id="location">
					</div>

					<div class="form-group">
						<div class="ed_dots"><p><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></p></div>
						<input type="submit" name="search" class="btn ed_btn pull-right ed_orange" value="Search">
					</div>
				</form>
	</div>
</div>
</div>
<!--Slider form end-->
</div>

<div style="margin-top: 10px;"></div>
<!-- Most recomended Courses Section four start -->

<?php
include 'auth/db_connections.php';
$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		if (isset($_POST['search'])) {
 			# code...
 			$state = $_POST['state'];
 			$city = $_POST['city'];
 			$stmt = $conn->prepare("SELECT * FROM advert where (`state` like :state and `city` like :city)");
 			$stmt->bindParam(':city', $comp_id);
 			$stmt->bindParam(':state', $comp_id);
 			$stmt->execute();
 			$result = $stmt->fetchAll();
 			$records = count($result);
 			if ($records > 0) {?>
 				<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
 					<div class="container">
 						<div class="row">
 							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 								<div class="ed_heading_top ed_bottompadder80">
 									<h3>Advert related to <?php echo $city ." ". $state."State"; ?></h3>
 								</div>
 							</div>
 							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 								<div class="ed_mostrecomeded_course_slider ed_mostrecomededcourseslider">
 									<div id="owl-demo3" class="owl-carousel owl-theme">
 										<?php
 										foreach ($result as $row ) {

 											echo '<div class="item">
 											<div class="ed_item_img">
 											<img src="main/uploads/'.$row['image'].'" alt="'.$row['image'].'" class="img-responsive">
 											</div>
 											<div class="ed_item_description ed_most_recomended_data">
 											<h4><a href="course_single.php">Hair Stylist</a><span>'.$row['city'].'</span></h4>
 											<div class="row">
 											<div class="ed_rating">
 											<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
 											<div class="row">

 											</div>
 											</div>
 											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 											<div class="ed_views">
 											<i class="fa fa-phone"></i>
 											<span>'.$phone = $row['phone'].'</span>
 											</div>
 											</div>
 											</div>
 											</div>
 											<div class="course_detail">
 											<div class="course_faculty">
 											<img src="http://placehold.it/32X32" alt=""> <a href="instructor_dashboard.php">'.$row['company_name'].'</a>
 											</div>
 											</div>
 											<p>'.$row['advert'].'</p>
 											<a href="course_single.php/'.$row['token'].'" class="ed_getinvolved">Read More <i class="fa fa-long-arrow-right"></i></a>
 											</div>
 											</div>
 											';
 											$row['comp_id'];
 											$comp_name = $row['company_name'];
 				// $city =$row['city'];
 											$token = $row['token'];
 											$advert =$row['advert'];
 											$phone = $row['phone'];
 											$image = $row['image'];
 											$advert_id = $row['id'];
 										} 		
 									}else{
 										$stmt = $conn->prepare("SELECT * FROM advert ");
 										$stmt->execute();
 										$result = $stmt->fetchAll();
 										$records = count($result);
 										if ($records > 0) {?>
 											<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
 												<div class="container">
 													<div class="row">
 														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 															<div class="ed_heading_top ed_bottompadder80">
 																<h3>Advert related to <?php echo $city ."  ". $state." State"; ?></h3>
 															</div>
 															<?php
 																echo "<h4 style='text-align:center;'>There is no advert for ".$city. " in " .$state."State </h4>";
 																		echo "<h5 style='text-align:center;'>Here are other related Advert</h5>";?>
 														</div>
 														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 															<div class="ed_mostrecomeded_course_slider ed_mostrecomededcourseslider">
 																<div id="owl-demo3" class="owl-carousel owl-theme">
 																	<?php
 																	foreach ($result as $row ) {

 																		echo '<div class="item">
 																		<div class="ed_item_img">
 																		<img src="main/uploads/'.$row['image'].'" alt="'.$row['image'].'" class="img-responsive">
 																		</div>
 																		<div class="ed_item_description ed_most_recomended_data">
 																		<h4><a href="course_single.php">Hair Stylist</a><span>'.$row['city'].'</span></h4>
 																		<div class="row">
 																		<div class="ed_rating">
 																		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
 																		<div class="row">

 																		</div>
 																		</div>
 																		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 																		<div class="ed_views">
 																		<i class="fa fa-phone"></i>
 																		<span>'.$phone = $row['phone'].'</span>
 																		</div>
 																		</div>
 																		</div>
 																		</div>
 																		<div class="course_detail">
 																		<div class="course_faculty">
 																		<img src="http://placehold.it/32X32" alt=""> <a href="instructor_dashboard.php">'.$row['company_name'].'</a>
 																		</div>
 																		</div>
 																		<p>'.$row['advert'].'</p>
 																		<a href="course_single.php/'.$row['token'].'" class="ed_getinvolved">Read More <i class="fa fa-long-arrow-right"></i></a>
 																		</div>
 																		</div>
 																		';
 																		$row['comp_id'];
 																		$comp_name = $row['company_name'];
 																		$city =$row['city'];
 																		$token = $row['token'];
 																		$advert =$row['advert'];
 																		$phone = $row['phone'];
 																		$image = $row['image'];
 																		$advert_id = $row['id'];

 																	}
 																}
 															}?>



 															<div class="item">
 																<div class="ed_item_img">
 																	<img src="http://placehold.it/263X165" alt="item1" class="img-responsive">
 																</div>
 																<div class="ed_item_description ed_most_recomended_data">
 																	<h4><a href="course_single.php">Javascript Campus</a><span>£60</span></h4>
 																	<div class="row">
 																		<div class="ed_rating">
 																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																				<div class="row">
 																					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																						<div class="ed_stardiv">
 																							<div class="star-rating"><span style="width:80%;"></span></div>
 																						</div>
 																					</div>
 																					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																						<div class="row">
 																							<p>(1 review)</p>
 																						</div>
 																					</div>
 																				</div>
 																			</div>
 																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																				<div class="ed_views">
 																					<i class="fa fa-users"></i>
 																					<span>18 students</span>
 																				</div>
 																			</div>
 																		</div>
 																	</div>
 																	<div class="course_detail">
 																		<div class="course_faculty">
 																			<img src="http://placehold.it/32X32" alt=""> <a href="instructor_dashboard.php"> FRANK PASCAL</a>
 																		</div>
 																	</div>
 																	<p>Project-Based Learning is a flexible tool for framing given academic standards into curriculum flexible tool for framing.</p>
 																	<a href="course_single.php" class="ed_getinvolved">get involved <i class="fa fa-long-arrow-right"></i></a>
 																</div>
 															</div>

 															<?php
 														}
 														?>
 													</div>
 												</div>
 											</div>
 										</div>
 									</div><!-- /.container -->
 								</div>
 								<!--Most recomended Courses Section four end -->
 								<!--Newsletter Section six start-->

 								<!--Newsletter Section six end-->
 								<!--Footer Top section start-->

 								<?php include('footer.php');  ?>
