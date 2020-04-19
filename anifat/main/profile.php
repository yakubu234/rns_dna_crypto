<?php include('header.php');
session_start();
$comp_name = $_SESSION['company_name'];
$comp_email = $_SESSION['company_email'];
$comp_id = $_SESSION['user_id']; 
include '..\auth/db_connections.php';
if(isset($_GET['unit']) && !empty($_GET['unit']) ){
	$compid =$_GET['unit'];
	
	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$stmt = $conn->prepare("SELECT * FROM register WHERE id = :id");
 		$stmt->bindParam(':id', $compid);
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {
 			foreach ($result as $row ) {
 				$company_name = $row['company_name'];
 				$company_email = $row['company_email'];
 				$activate = $row['activate'];
 				$token = $row['token'];
 				$comp_id = $row['id'];
 			} 		
 			

 		}
 	}else{
 		$company_name = $comp_name;
 		$company_email = $comp_email;
 		$comp_id = $comp_id;
 		$token = $_SESSION['comp_token'] ;
 	}
 	#
 	// include '..\auth/db_connections.php';
 	$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		// $admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$stmt = $conn->prepare("SELECT * FROM register WHERE id = :id");
 		$stmt->bindParam(':id', $comp_id);
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {
 			foreach ($result as $row ) {
 				$comp_name = $row['company_name'];
 				$comp_email = $row['company_email'];
 				$activate = $row['activate'];
 				$comp_token = $row['token'];
 				$address = $row['address'];
 				$state = $row['state'];
 				$town = $row['town'];
 				$lga = $row['lga'];
 				$zip = $row['zip'];
 				$contact = $row['contact'];
 				$alt_contact = $row['alt_contact'];
 				$img = $row['img'];
 				$token = $row['token'];

 			} 		
 			

 		}
 		?>
 		<!--Breadcrumb start-->

 		<!--Breadcrumb end-->
 		<!--instructor single start-->
 		<div class="ed_dashboard_wrapper">
 			<div class="container">
 				<div class="row">
 					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
 						<div class="ed_sidebar_wrapper">
 							<div class="ed_profile_img">
 								<img src="uploads/<?php echo $img; ?>" alt="Profile Image" class="img-responsive" />
 							</div>
 							<h3><?php echo $comp_name; ?></h3>
 							<!-- <p><span>active :- </span> 20 Min ago</p> -->
 							<div class="ed_tabs_left">
 								<ul class="nav nav-tabs">
 									<li class="active"><a href="#a" data-toggle="tab">profile</a></li>
 									<li><a href="#b" data-toggle="tab">other details</a></li>
 									<li><a href="#c" data-toggle="tab">logout</a></li>
 								</ul>
 							</div>
 						</div>
 					</div>
 					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
 						<div class="ed_dashboard_tab">
 							<div class="tab-content">
 								<div class="tab-pane active" id="a">
 									<div class="ed_dashboard_inner_tab">
 										<div role="tabpanel">
 											<!-- Nav tabs -->
 											<ul class="nav nav-tabs" role="tablist">
 												<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Company's Detail</a></li>
 											</ul>

 											<!-- Tab panes -->
 											<div class="tab-content">
 												<div role="tabpanel" class="tab-pane active" id="view">
 													<div class="ed_inner_dashboard_info">
 														<h2> <?php echo $company_name ?> (Hair Stylist)</h2>
 														<table id="profile_view_settings">
 															<thead>
 																<tr>
 																	<th>Company name</th>
 																	<!-- <th>Location</th> -->
 																	<th>Company email</th>
 																</tr>
 															</thead>
 															<tbody>
 																<tr>
 																	<td><?php echo $company_name; ?></td>
 																	<!-- <td>London</td> -->
 																	<td><?php echo $company_email; ?></td>
 																</tr>												
 															</tbody>
 														</table>
 													</div>
 												</div>
 											</div>

 										</div><!--tab End-->
 									</div>
 								</div>
 								<div class="tab-pane" id="b">
 									<div class="ed_dashboard_inner_tab">
 										<div role="tabpanel">
 											<!-- Nav tabs -->
 											<ul class="nav nav-tabs" role="tablist">
 												<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">Update</a></li>
 												<li role="presentation"><a href="#instructing" aria-controls="instructing" role="tab" data-toggle="tab">company's Details</a></li>
 											</ul>

 											<!-- Tab panes -->
 											<div class="tab-content">
 												<div role="tabpanel" class="tab-pane active" id="my">
 													<div class="ed_inner_dashboard_info">
 														<h2>Update Companys's Details</h2>
 														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 															<!-- <h3 class="checkout-heading">Billing Details</h3> -->
 															<div class="row">
 																<form method="POST" action="..\upload.php" enctype="multipart/form-data" >
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<input type="hidden" name="id" value="<?php  echo $comp_id; ?>">
 																			<label>Company name <sup>*</sup></label>
 																			<input type="text" class="form-control" name="company_name" placeholder="" value="<?php echo $company_name ?>" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Company Email <sup>*</sup></label>
 																			<input type="text" class="form-control" name="company_email" value="<?php echo $company_email; ?>" placeholder="" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Company identity <sup>*</sup></label>
 																			<input type="text" class="form-control" name="token"  value="<?php echo $token; ?>" readonly placeholder="" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Office Address <sup>*</sup></label>
 																			<input type="text" name="comp_address"  class="form-control" placeholder="" required="">
 																		</div>
 																	</div>


 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>State <sup>*</sup></label>
 																			<input type="text" name="state" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Town / City <sup>*</sup></label>
 																			<input type="text" name="city" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Lga<sup>*</sup></label>
 																			<input type="text" name="lga" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>

 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Postcode / Zip<sup>*</sup></label>
 																			<input type="text" name="zip" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>

 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Contact</label>
 																			<input type="text" name="contact" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>
 																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
 																		<div class="form-group">
 																			<label>Alternate Contact Number</label>
 																			<input type="text" name="Alternate_contact" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>

 																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 																		<div class="form-group">
 																			<label>Choose Cover Photo</label>
 																			<input type="file" name="image" class="form-control" placeholder="" required="">
 																		</div>
 																	</div>

 																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 																		<div class="form-group">
 																			<button type="submit" name="update_comp" class="btn ed_btn pull-right ed_orange">Update</button>
 																		</div>
 																	</div>

 																</div>
 															</form>
 														</div>
 													</div>
 												</div>
 												<div role="tabpanel" class="tab-pane" id="instructing">
 													<div class="ed_inner_dashboard_info">
 														<div class="tab-content">
 															<div role="tabpanel" class="tab-pane active" id="view">
 																<div class="ed_inner_dashboard_info">
 																	<h2> <?php echo $company_name ?> (Hair Stylist)</h2>
 																	<table id="profile_view_settings">
 																		<thead>
 																			<tr>
 																				<th>Company name</th>
 																				<!-- <th>Location</th> -->
 																				<th>Company email</th>
 																			</tr>
 																		</thead>
 																		<tbody>
 																			<tr>
 																				<td><?php echo $comp_name; ?></td>
 																				<!-- <td>London</td> -->
 																				<td><?php echo $comp_email; ?></td>
 																			</tr>												
 																		</tbody>
 																		<thead>
 																			<tr>
 																				<th>Company code</th>
 																				<!-- <th>Location</th> -->
 																				<th>office address</th>
 																			</tr>
 																		</thead>
 																		<tbody>
 																			<tr>
 																				<td><?php echo $comp_token; ?></td>
 																				<!-- <td>London</td> -->
 																				<td><?php echo $address; ?></td>
 																			</tr>												
 																		</tbody>
 																		<thead>
 																			<tr>
 																				<th>state</th>
 																				<!-- <th>Location</th> -->
 																				<th>town</th>
 																			</tr>
 																		</thead>
 																		<tbody>
 																			<tr>
 																				<td><?php echo $state; ?></td>
 																				<!-- <td>London</td> -->
 																				<td><?php echo $town; ?></td>
 																			</tr>												
 																		</tbody>
 																		<thead>
 																			<tr>
 																				<th>lga</th>
 																				<!-- <th>Location</th> -->
 																				<th>zip</th>
 																			</tr>
 																		</thead>
 																		<tbody>
 																			<tr>
 																				<td><?php echo $lga; ?></td>
 																				<!-- <td>London</td> -->
 																				<td><?php echo $zip; ?></td>
 																			</tr>												
 																		</tbody>
 																		<thead>
 																			<tr>
 																				<th>contact</th>
 																				<!-- <th>Location</th> -->
 																				<th>alternative contact</th>
 																			</tr>
 																		</thead>
 																		<tbody>
 																			<tr>
 																				<td><?php echo $contact; ?></td>
 																				<!-- <td>London</td> -->
 																				<td><?php echo $alt_contact; ?></td>
 																			</tr>												
 																		</tbody>
 																		
 																	</table>
 																</div>
 															</div>
 														</div>
 													</div>
 												</div>
 											</div>

 										</div><!--tab End-->
 									</div>
 								</div>
 								<div class="tab-pane" id="c">
 									<div class="ed_dashboard_inner_tab">
 										<div role="tabpanel">
 											<!-- Nav tabs -->
 											<ul class="nav nav-tabs" role="tablist">
 												<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">personal</a></li>
 												<li role="presentation"><a href="#mentions" aria-controls="mentions" role="tab" data-toggle="tab">mentions</a></li>
 												<li role="presentation"><a href="#favourites" aria-controls="favourites" role="tab" data-toggle="tab">favourites</a></li>
 											</ul>

 											<!-- Tab panes -->
 											<div class="tab-content">
 												<div role="tabpanel" class="tab-pane active" id="personal">
 													<div class="ed_inner_dashboard_info">
 														<div class="ed_course_single_info">
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 1 weeks, 2 days ago</span>
 																<p>Student adler braxton started the course Course Status</p>
 															</div> 
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 1 weeks, 4 days ago</span>
 																<p>Student baldwin dallas started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 1 weeks, 3 days ago</span>
 																<p>Student carney Tate started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 2 weeks, 4 days ago</span>
 																<p>Student dwight easton started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 2 weeks, 5 days ago</span>
 																<p>Student elbert wade started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 2 weeks, 2 days ago</span>
 																<p>Student hailey kyler started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 3 weeks, 3 days ago</span>
 																<p>Student graham ryder started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 3 weeks, 6 days ago</span>
 																<p>Student jaxon keegan started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 4 weeks, 2 days ago</span>
 																<p>Student kealy sage started the course Course Status</p>
 															</div>
 															<div class="ed_add_students">
 																<img src="http://placehold.it/50X50" alt="">
 																<span>student started course course status 4 weeks, 4 days ago</span>
 																<p>Student lavern gunner started the course Course Status</p>
 															</div>
 															<div class="col-lg-12">
 																<div class="row">
 																	<div class="ed_blog_bottom_pagination ed_toppadder40">
 																		<nav>
 																			<ul class="pagination">
 																				<li><a href="#">1</a></li>
 																				<li><a href="#">2</a></li>
 																				<li><a href="#">3</a></li>
 																				<li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
 																			</ul>
 																		</nav>
 																	</div>
 																</div>
 															</div>
 														</div>
 													</div>
 												</div>
 												<div role="tabpanel" class="tab-pane" id="mentions">
 													<div class="ed_inner_dashboard_info">
 														<h2>sorry, there was no mentions event found. please try a different filter</h2>
 													</div>
 												</div>
 												<div role="tabpanel" class="tab-pane" id="favourites">
 													<div class="ed_inner_dashboard_info">
 														<h2>sorry, there was no favourites event found. please try a different filter</h2>
 													</div>
 												</div>
 											</div>

 										</div><!--tab End-->
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>


 				</div>
 			</div>
 		</div>
 		<!--instructor single end-->
 		<!--Footer Top section start-->
 		<?php include('footer.php'); ?>

