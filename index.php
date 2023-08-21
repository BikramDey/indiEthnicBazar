<?php include('include/header.php'); ?>
<!---header Start---->

<!---header End---->











	<!--hero section-->

	<section id="hero">
		
		<h4>Trade-in-offer</h4>
		<h2>Super value deals</h2>
		<h1>On all products</h1>

		<p>Save more with coupons & up to 70% off!</p>
		<button>Shop Now</button>

	</section>


	<!--feature-->

	<section id="feature" class="section-p1">
		
		<div class="fe-box">
			<img src="assets/img/features/f1.png" alt=""/>
			<h6>Free Shipping</h6>
		</div>

		<div class="fe-box">
			<img src="assets/img/features/f2.png" alt=""/>
			<h6>Online Order</h6>
		</div>

		<div class="fe-box">
			<img src="assets/img/features/f3.png" alt=""/>
			<h6>Save Money</h6>
		</div>

		<div class="fe-box">
			<img src="assets/img/features/f4.png" alt=""/>
			<h6>Promotions</h6>
		</div>

		<div class="fe-box">
			<img src="assets/img/features/f5.png" alt=""/>
			<h6>Happy Sell</h6>
		</div>

		<div class="fe-box">
			<img src="assets/img/features/f6.png" alt=""/>
			<h6>F24/7 Support</h6>
		</div>

	</section>



	<!--product1-->

	<section id="product1" class="section-p1">
		
		<h2>Featured Products</h2>
		<p>Summer Collection New Morden Design</p>

		<div class="pro-container">

			
			<?php
				$sql = "SELECT * FROM shop order by pdid ASC";
				$sql_res = $con->query($sql);
				$count = 0;
				while ($rows = mysqli_fetch_assoc($sql_res)) {
					if($count == 8){break;}
					$count++;
			?>
			<!--Product box start-->
			<div class="pro" onclick="window.location.href='sproduct.php?pdid=<?php echo $rows['pdid']; ?>';">
				<img src="admin/productimages/pdid<?php echo $rows['pdid']; ?>/<?php echo $rows['pdimage1']; ?>" alt=""/>
				<div class="des">
					<span><?php echo $rows['pdbrand']; ?></span>
					<h5><?php echo $rows['pdname']; ?></h5>
					<div class="star">
					<?php
						for ($x = 1; $x <= $rows['pdstars'] ; $x++) {
					?>
							<i class="fas fa-star"></i>
					<?php
						}
					?>
					<?php
						for ($x = $rows['pdstars']; $x < 5 ; $x++) {
					?>
							<i class="fa-regular fa-star"></i>
					<?php
						}
					?>

					</div>
					<h4>Rs&nbsp;<?php echo $rows['pdprice']; ?></h4>
				</div>
				<a href="sproduct.php?pdid=<?php echo $rows['pdid']; ?>" class="cart"><i class="fas fa-shopping-cart"></i></a>
			</div>
			<!--Product box end-->
			<?php
				}
			?>

		</div>

	</section>





	<!--Banner start-->
	<section id="banner" class="section-m1">
		
		<h4>Repair Services</h4>
		<h2>Up to <span>70% off</span> - All t-Shirt & Accessories</h2>
		<button class="normal">Explorer More</button>

	</section>










	<!--product2-->

	<section id="product1" class="section-p1">
		
		<h2>New Arrivals</h2>
		<p>Summer Collection New Morden Design</p>

		<div class="pro-container">
		<?php
				$sql = "SELECT * FROM shop order by pdid DESC";
				$sql_res = $con->query($sql);
				$count = 0;
				while ($rows = mysqli_fetch_assoc($sql_res)) {
					if($count == 8){break;}
					$count++;
			?>
			<!--Product box start-->
			<div class="pro" onclick="window.location.href='sproduct.php?pdid=<?php echo $rows['pdid']; ?>';">
				<img src="admin/productimages/pdid<?php echo $rows['pdid']; ?>/<?php echo $rows['pdimage1']; ?>" alt=""/>
				<div class="des">
					<span><?php echo $rows['pdbrand']; ?></span>
					<h5><?php echo $rows['pdname']; ?></h5>
					<div class="star">
					<?php
						for ($x = 1; $x <= $rows['pdstars'] ; $x++) {
					?>
							<i class="fas fa-star"></i>
					<?php
						}
					?>
					<?php
						for ($x = $rows['pdstars']; $x < 5 ; $x++) {
					?>
							<i class="fa-regular fa-star"></i>
					<?php
						}
					?>

					</div>
					<h4>Rs&nbsp;<?php echo $rows['pdprice']; ?></h4>
				</div>
				<a href="sproduct.php?pdid=<?php echo $rows['pdid']; ?>" class="cart"><i class="fas fa-shopping-cart"></i></a>
			</div>
			<!--Product box end-->
			<?php
				}
			?>

		</div>

	</section>





	<!--sm-banner-->

	<section id="sm-banner" class="section-p1">
		
		<div class="banner-box">
			<h4>crazy deals</h4>
			<h2>buy 1 get 1 free</h2>
			<span>The best classic dress is on sale at cara</span>
			<button class="white">Learn More</button>
		</div>


		<div class="banner-box banner-box2">
			<h4>spring/summer</h4>
			<h2>upcomming season</h2>
			<span>The best classic dress is on sale at cara</span>
			<button class="white">Collection</button>
		</div>

	</section>





	<!--banner3-->

	<section id="banner3">
		
		<div class="banner-box">
			<h2>SEASONAL SALE</h2>		
			<h3>Winter Collection -50% off</h3>
		</div>



		<div class="banner-box banner-box2">
			<h2>NEW FOOTWEAR COLLECTION</h2>		
			<h3>Spring / Summer 2022</h3>
		</div>



		<div class="banner-box banner-box3">
			<h2>T-SHIRTS</h2>		
			<h3>New Trendy Prints</h3>
		</div>

	</section>





	<!--newsletter-->

	<section id="newsletter" class="section-p1 section-m1">
		
		<div class="newstext">
			<h4>Sign Up For Newsletters</h4>
			<p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
		</div>

		<div class="form">
			<input type="text" placeholder="Your email addres">
			<button class="normal">Sign Up</button>
		</div>

	</section>






<!--Footer Start Here-->

<?php

    include('include/footer.php');
    
?>
<!--Footer End Here-->