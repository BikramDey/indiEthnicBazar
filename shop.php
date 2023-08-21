<?php include('include/header.php'); ?>
<!---header Start---->
<!---header End---->








	<!--hero section-->

	<section id="page-header">
		
		
		<h2>#stayhome</h2>
		

		<p>Save more with coupons & up to 70% off!</p>
		

	</section>










	<!--product1-->

	<section id="product1" class="section-p1">
		
		

		<div class="pro-container">

			<!--Produc box1 start-->
			<?php 
          		$sql="SELECT * FROM shop order by pdid DESC";
          		$sql_res=$con->query($sql);
				$allrows = mysqli_fetch_all($sql_res, MYSQLI_ASSOC);
				foreach ($allrows as $rows) {
  
          		// while($rows=mysqli_fetch_assoc($sql_res))
            	// {
            ?>
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
			<?php 

  				}

 			?>
			<!--Produc box1 end-->




			<!-- <div class="pro">
				<img src="assets/img/products/f2.jpg" alt=""/>
				<div class="des">
					<span>adidas</span>
					<h5>Cartoon Astronaut T-Shirts</h5>
					<div class="star">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$78</h4>
				</div>
				<a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
			</div> -->



		</div>

	</section>











	<!--pagination-->


	<section id="pagination" class="section-p1">

		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>

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