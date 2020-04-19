<!--Header start-->
<?php include ('header.php'); 
$currentlocation = "ogun";
$token = $_GET['serve'];
$id = $_GET['token'];
include 'auth/db_connections.php';
$conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		$admin_name = $site_name; #admin name for mail function 
 		$admins_email = $site_email; #admin email for mail function 
 		$stmt = $conn->prepare("SELECT * FROM advert where token = :token AND id = :id");
 		$stmt->bindParam(':token', $token);
 		$stmt->bindParam(':id', $id);
 		$stmt->execute();
 		$result = $stmt->fetchAll();
 		$records = count($result);
 		if ($records > 0) {
 			// echo "record is real";
 			foreach ($result as $row ) {
 				echo '
 				<!--Breadcrumb end-->
 		<!--Single content start-->
 		<div class="ed_graysection ed_course_single ed_toppadder80 ed_bottompadder80">
 			<div class="container">
 				<div class="row">
 					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
 						<div class="ed_course_single_item">
 							<div class="ed_course_single_image">
 								<img src="main/uploads/'.$row['image'].'" alt="'.$row['image'].'" />
 							</div>
 							<div class="ed_course_single_info">
 								<h2>Hair Stylist <span>'.$row['state'].'</span></h2>
 								<div class="row">
 									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
 										<div class="course_detail">
 											<div class="course_faculty">
 												<img src="http://placehold.it/32X32" alt=""> <a href="instructor_dashboard.php">'.$row['company_name'].'</a>
 											</div>
 										</div>
 									</div>
 									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right text-right">
 										<div class="ed_course_duration">
 											'.$row['city'].'
 											<p class="fa fa-phone"> '.$row['phone'].'</p>
 										</div>
 									</div>
 								</div>
 							</div>
 							<div class="ed_course_single_tab">
 								<div role="tabpanel">
 									<!-- Nav tabs -->
 									<ul class="nav nav-tabs" role="tablist">
 										<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">description</a></li>
 										<!--li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab">students</a></li>
 										<li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">news</a></li>
 										<li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">events</a></li-->
 									</ul>
 									<!-- Tab panes -->
 									<div class="tab-content">
 										<div role="tabpanel" class="tab-pane active" id="description">
 											<div class="ed_course_tabconetent">
 												<h2>about '.$row['company_name'].'</h2>
 												<p>'.$row['advert'].'</p>

 												
 											</div>
 										</div>
 										
 										
 										
 									</div>
 								</div>
 							</div><!--tab End-->
 						</div>	
 						
 					</div>
 					<!--Sidebar Start-->
 					
 					<!--Sidebar End-->
 				</div>
 			</div>
 		</div>
 		<!--Single content end-->
 				';
 			}
 		}
 		?>
 		

 		<?php include('footer.php');  ?>