<?php include('header.php');
session_start();
$comp_name = $_SESSION['company_name'];
$comp_email = $_SESSION['company_email'];
$comp_id = $_SESSION['user_id'];
 $token = $_SESSION['comp_token'] ;
$_SESSION['comp_token'] = $token;
$_SESSION['company_name'] = $comp_name ;
$_SESSION['company_email'] = $comp_email;
$_SESSION['user_id'] = $comp_id;
 ?>

<!--Breadcrumb end-->
<!--single student detail start-->
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<!-- <div class="ed_profile_img">
					<img src="http://placehold.it/263X263" alt="Dashboard Image" />
					</div> -->
					<h3><?php echo $comp_name;?></h3>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#dashboard" data-toggle="tab">dashboard</a></li>
						  <li><a href="#activity" data-toggle="tab">post job</a></li>
						  <li><a href="#notification" data-toggle="tab">notifications <span>0</span></a></li>
						  <li><a href="profile.php?unit=<?php echo $comp_id?>&units=2ifiuel4o90fi">profile</a></li>
						  <li><a href="..\logout.php" >logout</a></li>
						  <!-- <li><a href="#setting" data-toggle="tab">logout</a></li> -->
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<div class="tab-pane active" id="dashboard">
						<div class="ed_dashboard_tab_info">
						<h1>hello, <span><?php echo $comp_name; ?></span></h1>
						<h1>welcome to dashboard</h1>
						<p>Hi <strong>Andre House</strong>, here you have to see and update your profile, subscribed courses, activities, notifications and other things. All the above updates can be modified from the left panel provided.</p>
						</div>
					</div>
					
									
					
					<div class="tab-pane" id="forums">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#started" aria-controls="started" role="tab" data-toggle="tab">topics started</a></li>
									<li role="presentation"><a href="#replies" aria-controls="replies" role="tab" data-toggle="tab">replies created</a></li>
									<li role="presentation"><a href="#favourite" aria-controls="favourite" role="tab" data-toggle="tab">favourite</a></li>
									<li role="presentation"><a href="#subscribed" aria-controls="subscribed" role="tab" data-toggle="tab">subscribed</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="started">
									<div class="ed_dashboard_inner_tab">
										<h2>forum topics started</h2>
										<span>You have not created any topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="replies">
									<div class="ed_dashboard_inner_tab">
										<h2>forum replies created</h2>
										<span>You have not replied to any topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="favourite">
									<div class="ed_dashboard_inner_tab">
										<h2>favorite forum topics</h2>
										<span>You currently have no favourite topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="subscribed">
									<div class="ed_dashboard_inner_tab">
										<h2>subscribed forums</h2>
										<span>You are not currently subscribed to any forums.</span>
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
<!--single student detail end-->
<!--Footer Top section start-->
<?php include('footer.php'); ?>