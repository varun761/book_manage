<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="<?=$meta_description?>">
	<meta name="keywords" content="<?=$meta_keywords?>">
	<meta name="author" content="varun">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$page_title?></title>
	<link rel="stylesheet" href="<?=$js_path?>bootstrap.min.css">
	<link rel="stylesheet" href="<?=$fontawesome_path?>css/font-awesome.min.css">
	 <link rel="stylesheet" href="<?=$bootstrap_path?>css/jquery-ui.css">
	<?php $CI=&get_instance(); ?>
	<?php echo $CI->loadCss();?>
</head>
<body class="signup page">
<header class="header">
	<section id="topbar">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 text-xs-center text-sm-left text-md-left text-lg-left pull-left">
					Opening Hours : 8 Am to 7pm
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 text-xs-center text-sm-right text-md-right text-lg-right social pull-left">
					Connect With Us : <i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-google-plus"></i>
				</div>
		</div>
	</div>
	</section>
	<section id="logo">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 small text-center">
					<a href="<?php echo base_url();?>">
					<h2>ODUMMY STORE</h2>
					<h4>Ebooks and Magazines</h4>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="main-nav">
		<div class="container">
			 <nav class="navbar navbar-inverse">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="javascript:void(0)">Home</a></li>
					<li><a href="javascript:void(0)">Shop</a></li>
					<li><a href="<?php echo base_url('category/action/viewAll');?>">Categories</a></li>
					<li><a href="javascript:void(0)">Contact Us</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="http://localhost/book_manage_html/front_html/signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="http://localhost/book_manage/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				  </ul>
				</div>
			</nav>
		</div>
	</section>
</header>
