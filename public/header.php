<?php 
include ("../inc/constants.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>University Admission Portal</title>
	<link href="<?php echo ROOTPATH; ?>public/assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/iconmoon.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/chosen.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/jquery.mobile-menu.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/style.css" rel="stylesheet">
	<link href="cs-smartstudy-plugin.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/color.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/widget.css" rel="stylesheet">
	<link href="<?php echo ROOTPATH; ?>public/assets/css/responsive.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="<?php echo ROOTPATH; ?>public/assets/scripts/jquery.js"></script>
	<script src="<?php echo ROOTPATH; ?>public/assets/scripts/modernizr.js"></script>
	<script src="<?php echo ROOTPATH; ?>public/assets/scripts/bootstrap.min.js"></script>
</head>

<body class="wp-smartstudy">
	<div class="wrapper">
		<!-- Side Menu Start -->
		<div id="overlay"></div>
		
		<div id="mobile-menu">
			<ul>
				<li>
					<div class="mm-search">
						<form id="search" name="search">
							<div class="input-group">
								<input type="text" class="form-control simple" placeholder="Search ..." name="srch-term"
									id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</li>
				<li class="active"><a href="<?php echo ROOTPATH; ?>public/index.php">Home</a></li>
				<li class="active"><a href="<?php echo ROOTPATH; ?>public/about-us.php">About Us</a></li>
				<li class="active"><a href="<?php echo ROOTPATH; ?>public/blog.php">Events</a></li>
				<li class="active"><a href="<?php echo ROOTPATH; ?>public/register.php">Admissions</a></li>
				<li class="active"><a href="<?php echo ROOTPATH; ?>public/contact-us.php">Contact</a></li>

			</ul>
		</div>
		<!-- Side Menu End -->
		<!-- Header Start -->
		<header id="header" class="">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<ul class="top-bar-email">
								<li><a href="mailto:some@mail.com">Portalsystem@mail.com</a></li>
							</ul>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
							<div class="cs-user">
								<ul>
									<li>
                                        <a href="<?php echo ROOTPATH; ?>public/login.php"><i class="icon-login"></i>Login</a>                                    
                                    </li>
                                    <li>
                                        <a href="<?php echo ROOTPATH; ?>public/register.php"><i class="icon-user2"></i>Signup</a>
                                    </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-9">
							<div class="cs-logo cs-logo-dark">
								<div class="cs-media">
									<figure><a href="<?php echo ROOTPATH; ?>public/index.php"><img src="assets/images/logo.png" alt="" /></a>
									</figure>
								</div>
							</div>
							<div class="cs-logo cs-logo-light">
								<div class="cs-media">
									<figure><a href="<?php echo ROOTPATH; ?>public/index.php"><img src="assets/images/logo.png"
												alt="" /></a></figure>
								</div>
							</div>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-6 col-xs-3">
							<div class="cs-main-nav pull-right">
								<nav class="main-navigation">
									<ul>
										<li><a href="<?php echo ROOTPATH; ?>public/index.php">Home</a><span>About College</span></li>
										<li><a href="<?php echo ROOTPATH; ?>public/about-us.php">About Us</a><span>Summary</span></li>
										<li><a href="<?php echo ROOTPATH; ?>public/blog.php">Events</a><span>News/Events/Blogs</span></li>
										<li><a href="<?php echo ROOTPATH; ?>public/register.php">Admissions</a><span>Apply Online</span></li>
										<li><a href="<?php echo ROOTPATH; ?>public/contact-us.php">Contact</a><span>Contact Us Here</span></li>

										<li class="cs-search-area">
											<div class="cs-menu-slide">
												<div class="mm-toggle">
													<i class="icon-align-justify"></i>
												</div>
											</div>
											<div class="search-area">
												<a href="#"><i class="icon-search2"></i></a>
												<form>
													<div class="input-holder">
														<i class="icon-search2"></i>
														<input type="text" placeholder="Enter any keyword">
														<label class="cs-bgcolor">
															<i class="icon-search5"></i>
															<input type="submit" value="search">
														</label>
													</div>
												</form>
											</div>
										</li>
									</ul>
								</nav>
								<div class="cs-search-area hidden-md hidden-lg">
									<div class="cs-menu-slide">
										<div class="mm-toggle">
											<i class="icon-align-justify"></i>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>