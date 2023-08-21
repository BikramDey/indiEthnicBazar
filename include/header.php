<?php include('admin/conn.php'); ?>
<!-- Connection Established -->


<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ecommerce_site</title>

	<!--google fonts link-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

	<!--Bootstrap link-->

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all"/>


	<!--font-awesome cdn link-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

	<!--Noty link-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/noty.css" media="all"/>
	<script type="text/javascript" src="assets/js/noty.js"></script>

	<!--default css link-->

	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>

</head>

<body>

	<!--header section-->

	<section id="header">
		<a href="#"><img src="assets/img/logo.png" class="logo" alt=""/></a>
<?php 	
$currentFile = $_SERVER['PHP_SELF'];

// Check if the current script is shop.php
$isPage = basename($currentFile);

?>	
	

		<div>
			<ul id="navbar">
				<li><a class="<?php if($isPage == "index.php" || $isPage == "") echo "active"; ?>" href="index.php">Home</a></li>
				<li><a class="<?php if($isPage == "shop.php") echo "active"; ?>" href="shop.php">Shop</a></li>
				<li><a class="<?php if($isPage == "blog.php") echo "active"; ?>" href="blog.php">Blog</a></li>
				<li><a class="<?php if($isPage == "about.php") echo "active"; ?>" href="about.php">About</a></li>
				<li><a class="<?php if($isPage == "contact.php") echo "active"; ?>" href="contact.php">Contact</a></li>
				<li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
				<?php if (isset($_SESSION['userid'])) { ?>
					<li class="sign-button"><a href="profile.php">Your Profile</a></li>
				<?php } else {?>
				<li class="sign-button"><a href="signup.php">Login/SignUp</a></li>
				<?php }?>
				<a href="#" id="close"><i class="fas fa-times"></i></a>
			</ul>	
		</div>
		<div id="mobile">
			<a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
			<i id="bar" class="fas fa-outdent"></i>
		</div>

	</section>