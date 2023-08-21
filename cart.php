<?php include('include/header.php'); ?>
<!---header Start---->
<?php
// if (!isset($_SESSION['userid'])) { 
if (strlen($_SESSION['userid']) == 0) {
    echo "<script>window.location.href='login.php';</script>";
}
?>
<?php
$cart_empty = false;

if (!isset($_SESSION['cart_pdid']) || empty($_SESSION['cart_pdid'])) {
    $cart_empty = true;
}
?>
<!---header End---->

<?php

	if(isset($_GET['inc'])) {
		$incpdid = (int)$_GET['inc'];
        $arr_cart_pdqty = array();
		$i = 0;
		foreach($_SESSION['cart_pdqty'] as $key => $value) {
			if($incpdid == $i){
				$arr_cart_pdqty[$i] = (int)$value + 1;
			}else{
				$arr_cart_pdqty[$i] = $value;
			}
			$i++;
		}
		unset($_SESSION['cart_pdqty']);

		for($i=0;$i<count($arr_cart_pdqty);$i++) {
			$_SESSION['cart_pdqty'][$i] = $arr_cart_pdqty[$i];
		}

		echo "<script>window.location.href='cart.php';</script>";

	}

?>
<?php

if(isset($_GET['dec'])) {
	$decpdid = (int)$_GET['dec'];
	$arr_cart_pdqty = array();
	$i = 0;
	foreach($_SESSION['cart_pdqty'] as $key => $value) {
		if($decpdid == $i){
			$arr_cart_pdqty[$i] = (int)$value - 1;
		}else{
			$arr_cart_pdqty[$i] = $value;
		}
		$i++;
	}
	unset($_SESSION['cart_pdqty']);

	for($i=0;$i<count($arr_cart_pdqty);$i++) {
		$_SESSION['cart_pdqty'][$i] = $arr_cart_pdqty[$i];
	}

	// header('location:cart.php');
	echo "<script>window.location.href='cart.php';</script>";

}

?>

<?php

	if(isset($_GET['delete'])) {
		$deletepdid = (int)$_GET['delete'];

		$arr_cart_pdid = array();
        $arr_cart_pdsize = array();
        $arr_cart_pdqty = array();
		$i = 0;
		foreach($_SESSION['cart_pdid'] as $key => $value) {
			$arr_cart_pdid[$i] = $value;
			$i++;
		}
		$i = 0;
		foreach($_SESSION['cart_pdsize'] as $key => $value) {
			$arr_cart_pdsize[$i] = $value;
			$i++;
		}
		$i = 0;
		foreach($_SESSION['cart_pdqty'] as $key => $value) {
			$arr_cart_pdqty[$i] = $value;
			$i++;
		}

		unset($_SESSION['cart_pdid']);
		unset($_SESSION['cart_pdsize']);
		unset($_SESSION['cart_pdqty']);

		$k = 0;
		for($i=0;$i<count($arr_cart_pdid);$i++) {
			if($i == $deletepdid){
				continue;
			}
			$_SESSION['cart_pdid'][$k] = $arr_cart_pdid[$i];
			$_SESSION['cart_pdsize'][$k] = $arr_cart_pdsize[$i];
			$_SESSION['cart_pdqty'][$k] = $arr_cart_pdqty[$i];
			$k++;
		}

		echo "<script>window.location.href='cart.php';</script>";

	}

?>






	<!--hero section-->

	<section id="page-header" class="about-header">
		
		
		<h2>#let's_talk</h2>

		<p>LEAVE A MESSAGE, We love to hear from you</p>
				

	</section>


	<h2 class="my-5 mx-auto text-center text-primary <?php if($cart_empty == false) echo "d-none";?>">
        Your Cart is Empty
    </h2>



	<!-- cart section -->

	<section id="cart" class="section-p1 <?php if($cart_empty == true) echo "d-none";?>">
		<table width="100%">
			<thead>
				<tr>
					<td>Image</td>
					<td>Product</td>
					<td>Size</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Subtotal</td>
					<td>Remove</td>
				</tr>
			</thead>
			<tbody>
			<?php

				$i = 0;
				$finalTotalAmt = 0;
				foreach($_SESSION['cart_pdid'] as $key => $value) {
					$i++;
				}
				for ($c = 0; $c < $i; $c++){
					$item = (int)$_SESSION['cart_pdid'][$c];
					$quantity= (int)$_SESSION['cart_pdqty'][$c];
					$size = $_SESSION['cart_pdsize'][$c];
					
					$sql = "SELECT * FROM shop WHERE pdid='$item'";
					$result = $con->query($sql);
					$rows = $result->fetch_assoc();
					$itemPrice = (int)$rows['pdprice'];
					$subtotal = $quantity * $itemPrice;
					$finalTotalAmt += $subtotal;
			?>
			
				<tr>
					
					<td><img src="admin/productimages/pdid<?php echo $item; ?>/<?php echo $rows['pdimage1']; ?>" alt="" /></td>
					
					<td><?php echo $rows['pdname']; ?></td>
					<td><?php echo $size; ?></td>
					<td>Rs&nbsp;<?php echo $rows['pdprice']; ?></td>
					<td>
						<?php if($quantity == 1){?>
							<a href="cart.php" class="disabled">-</a>
						<?php }else{?>
							<a href="cart.php?dec=<?php echo $c; ?>">-</a>
						<?php }?>
						<input type="number" value="<?php echo $quantity; ?>" disabled>
						
						<a href="cart.php?inc=<?php echo $c; ?>">+</a>
					</td>
					<td>Rs&nbsp;<?php echo $subtotal; ?></td>
					<td><a href="cart.php?delete=<?php echo $c; ?>"><i class="fas fa-times-circle"></i></a></td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</section>





	<!-- cart-add -->

	<section id="cart-add" class="section-p1 <?php if($cart_empty == true) echo "d-none";?>">
		<div id="coupon">
			<h3>Apply Coupon</h3>
			<div>
				<input type="text" placeholder="Enter Your Coupon">
				<button class="normal">Apply</button>
			</div>
		</div>

		<div id="subtotal">
			<h3>Cart Totals</h3>
			<table>
				<tr>
					<td>Cart Subtotal</td>
					<td>$ <?php echo $finalTotalAmt; ?></td>
				</tr>
				<tr>
					<td>Shipping</td>
					<td>Free</td>
				</tr>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong>$ <?php echo $finalTotalAmt; ?></strong></td>
				</tr>
			</table>
			<a href="checkout.php"> Proceed to checkout</a>
		</div>
	</section>




	


<!--Footer Start Here-->

<?php

    include('include/footer.php');
    
?>
<!--Footer End Here-->