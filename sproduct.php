<?php include('include/header.php'); ?>
<!---header Start---->

<!---header End---->
<?php

if ($_POST['submit'] == "SUBMIT") {

	$pdid = $_GET['pdid'];
	$size = $_POST['size'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['cart_pdid'])) {

		$i = 0;
		foreach($_SESSION['cart_pdid'] as $key => $value) 
        {
            $i++;
        }
		$_SESSION['cart_pdid'][$i] = $pdid;
		$_SESSION['cart_pdsize'][$i] = $size;
		$_SESSION['cart_pdqty'][$i] = $quantity;
	}
	else{
		
		$_SESSION['cart_pdid'][0] = $pdid;
		$_SESSION['cart_pdsize'][0] = $size;
		$_SESSION['cart_pdqty'][0] = $quantity;

	}
	echo $_SESSION['cart_pdid'];
	echo $_SESSION['cart_pdsize'];
	echo $_SESSION['cart_pdsize'];
	// echo "<script>window.location.href='cart.php';</script>";
}

?>

<?php

$sqls = "SELECT * FROM shop WHERE pdid=$_GET[pdid]";
$result = $con->query($sqls);
$rows = $result->fetch_assoc();
?>





<!-- prodetails -->

<section id="prodetails" class="section-p1">


	<div class="single-por-image">

		<img src="admin/productimages/pdid<?php echo $_GET['pdid']; ?>/<?php echo $rows['pdimage1']; ?>" width="100%" id="MainImg" alt="" />


		<div class="small-img-group">

			<div class="small-img-col">
				<img src="admin/productimages/pdid<?php echo $_GET['pdid']; ?>/<?php echo $rows['pdimage1']; ?>" width="100%" class="small-img" alt="" />
			</div>

			<div class="small-img-col">
				<img src="admin/productimages/pdid<?php echo $_GET['pdid']; ?>/<?php echo $rows['pdimage2']; ?>" width="100%" class="small-img" alt="" />
			</div>

			<div class="small-img-col">
				<img src="admin/productimages/pdid<?php echo $_GET['pdid']; ?>/<?php echo $rows['pdimage3']; ?>" width="100%" class="small-img" alt="" />
			</div>

			<div class="small-img-col">
				<img src="admin/productimages/pdid<?php echo $_GET['pdid']; ?>/<?php echo $rows['pdimage4']; ?>" width="100%" class="small-img" alt="" />
			</div>

			<div class="small-img-col">
				<img src="assets/img/products/p08image.jpg" width="100%" class="small-img" alt="" />
			</div>
		</div>

	</div>






	<div class="single-pro-details">
		<h6>Home / T-Shirt</h6>
		<h4><?php echo $rows['pdname']; ?></h4>
		<h2>Rs&nbsp;<?php echo $rows['pdprice']; ?></h2>
		<form action="#" method="post" enctype="multipart/form-data" class="form">
			<select name="size">
				<option disabled>Select size</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
				<option value="XXL">XXL</option>
			</select>
			<input type="number" name="quantity" value="1" placeholder="">
			<button type="submit" class="normal" name="submit" value="SUBMIT" >Add To Cart</button>
		</form>
		<h4>Product Details</h4>
		<span><?php echo $rows['pddetail']; ?>
		</span>
	</div>


</section>




<!--product-->

<section id="product1" class="section-p1">

	<h2>Featured Product</h2>
	<p>Summer Collection New Morden Design</p>

	<div class="pro-container">

		<!--Produc box1 start-->
		<div class="pro">
			<img src="assets/img/products/p08image.jpg" alt="" />
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
		</div>
		<!--Produc box1 end-->




		<div class="pro">
			<img src="assets/img/products/p08image.jpg" alt="" />
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
		</div>




		<div class="pro">
			<img src="assets/img/products/p08image.jpg" alt="" />
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
		</div>





		<div class="pro">
			<img src="assets/img/products/p08image.jpg" alt="" />
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
		</div>














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
























<script>
	var MainImg = document.getElementById("MainImg");
	var smallimg = document.getElementsByClassName("small-img");

	smallimg[0].onclick = function() {
		MainImg.src = smallimg[0].src;
	}

	smallimg[1].onclick = function() {
		MainImg.src = smallimg[1].src;
	}

	smallimg[2].onclick = function() {
		MainImg.src = smallimg[2].src;
	}

	smallimg[3].onclick = function() {
		MainImg.src = smallimg[3].src;
	}
</script>







<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->