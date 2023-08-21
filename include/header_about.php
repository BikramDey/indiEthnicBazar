<?php

    include('admin/conn.php');

?>




<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ecommerce_site</title>

	<!--default css link-->

	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>


	<!--google fonts link-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@200&display=swap" rel="stylesheet"> 


	<!--font-awesome cdn link-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>

<body>

	<!--header section-->

	<section id="header">
		<a href="#"><img src="assets/img/logo.png" class="logo" alt=""/></a>


		<div>
			<ul id="navbar">
				<li><a href="index.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a class="active" href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
				<a href="#" id="close"><i class="fas fa-times"></i></a>
			</ul>	
		</div>
		<div id="mobile">
			<a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
			<i id="bar" class="fas fa-outdent"></i>
		</div>

	</section>