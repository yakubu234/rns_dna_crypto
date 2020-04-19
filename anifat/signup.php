<?php include('header.php'); ?>
<!--header end -->
<!--Breadcrumb start-->
<div class="banner-black" >
	
</div>
<!--Breadcrumb end-->
<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<div class="ed_heading_top">
						<h3>sign up</h3>
					</div>
					<form class="ed_contact_form ed_toppadder40" method="POST" action="auth/auth.php">
						<div class="form-group">
							<label class="control-label">Company Name :</label>
							<input  name="company-name" type="text"  placeholder="Company Name" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Company Email :</label>
							<input type="email" name="company-email" class="form-control" placeholder="Email Address" included>
						</div>
						<div class="form-group">
							<label class="control-label">Password :</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Confirm Password :</label>
							<input type="password" name="confirm-password" class="form-control">
						</div>
						<button type="submit" name="register" class="btn ed_btn ed_orange pull-right">sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Footer Top section start-->
<?php include('footer.php'); ?>
