<!---header Start---->

<?php include('include/header.php'); ?>
<?php
if (!isset($_SESSION['userid'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
?>
<?php
if (!isset($_SESSION['cart_pdid']) || empty($_SESSION['cart_pdid'])) {
    echo "<script>window.location.href='cart.php';</script>";
    exit;
}
?>
<?php
if (isset($_POST['submit'])) {
    $_SESSION['payment'] = $_POST['payment'];
	$payment = $_POST["payment"];
	if($payment == "codpymtd"){
		echo "<script>window.location.href='order.php';</script>";
	}

    echo "<script>window.location.href='payment.php';</script>";
}
?>
<!---header End---->

<div class="container-xxl py-5" id="checkout">
	<div class="container">
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
						<h4 class="text-uppercase text-">Select Your Payment Method</h4>
					</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
					<div class="accordion-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="qrpymtd">
								<label class="form-check-label" for="inlineRadio1">Scan QR Code & Pay</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="codpymtd">
								<label class="form-check-label" for="inlineRadio2">Cash On Delivery</label>
							</div>
							<div class="my-4">
								<input type="submit" name="submit" value="Continue" class="btn btn-primary btn-form px-5 py-2">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->