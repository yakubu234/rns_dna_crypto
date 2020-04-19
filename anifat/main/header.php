<!DOCTYPE html>
<!-- 
Template Name: Educo
Version: 2.0.0
Author: Kamleshyadav
Website: http://himanshusofttech.com/
Purchase: http://themeforest.net/user/kamleshyadav
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
<meta charset="utf-8" />
<title>NATURAL HAIR</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="Educo, html template, Education template" />
<meta name="author"  content="Kamleshyadav"/>
<meta name="MobileOptimized" content="320" />

<!--srart theme style -->
<link href="..\css/main.css" rel="stylesheet" type="text/css"/>
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="..\images/brush.png" />
</head>
<body>
<!--Page main section start-->
<div id="educo_wrapper">
<header id="ed_header_wrapper">
	<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p>welcome guest</p>
					<div class="ed_info_wrapper">
						<a href="#" id="login_button">Login</a>
							<div id="login_one" class="ed_login_form">
								<h3>log in</h3>
								<form class="form" method="POST" action="auth/auth.php">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="email" name="email" class="form-control" >
									</div>
									<div class="form-group">
										<label  class="control-label">Password :</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="form-group">
										<button type="submit" name="login">login</button>
										<a href="signup.php" >sign up</a>	
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ed_header_bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_logo"> <a href="index.php"><img src="..\images/brush.png"  alt="logo" /></a> </div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
					</div>
					<div class="edoco_menu">
						<ul class="collapse navbar-collapse" id="ed_menu">
							
							<li><a href="dashboard.php">Dashboard</a></li>
							
							
							<li><a href="postjob.php">Post Advert</a></li>
							<li><a href="profile.php">Profile</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_call"><i class="fa fa-logout"></i><a href="..\logout.php">Logout</a></div>
				</div>
			</div>
		</div>
    </div>
</header>