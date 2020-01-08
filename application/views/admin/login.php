<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YOU IN YOU</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
</head>

<body>
	<!-- Main navbar -->
	<div> &nbsp; </div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form method="post" id="loginForm" action="<?php echo base_url('admin/loginverify'); ?>">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Username" name="username" id="username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								<?php if (form_error('username')) { ?> <div class="has-error"> <div class="error help-block"> <?php echo  form_error('username'); ?> </div> </div> <?php } ?> 
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" name="password" id="password" >
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<?php if (form_error('password')) { ?> <div class="has-error"> <div class="error help-block"> <?php echo  form_error('password'); ?> </div> </div> <?php } ?> 
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2016. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</body>
</html>
