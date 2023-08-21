<?php
include('conn.php');
if (strlen($_SESSION['alogin']) == 0) {
	echo "<script>window.location.href='index.php';</script>";
} else {
	date_default_timezone_set('Asia/Kolkata'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());

	$oid = intval($_GET['oid']);
	$sqls = "SELECT * FROM orders WHERE oid=$oid";
	$result = $con->query($sqls);
	$rows = $result->fetch_assoc();
	$invoice = $rows['invoice'];
	$order_status = $rows['order_status'];
	$pay_method = $rows['pay_method'];
	$upi_id  = $rows['upi_id'];
	$upi_transaction_id = $rows['upi_transaction_id'];


	if (isset($_POST['submit'])) {
		$order_status = $_POST['order_status'];
		$sql = mysqli_query($con, "UPDATE  orders SET order_status='$order_status' where oid='$oid' ");
		$_SESSION['msg'] = "Order Status Updated !!";
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Category</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	</head>

	<body>
		<?php include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Category</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="Category" method="post">

										<div class="control-group">
											<label class="control-label" for="basicinput">Order Invoice Number</label>
											<div class="controls">
												<input type="text" name="category" class="span8 tip" value="<?php echo $invoice; ?>" disabled>
											</div>
										</div>


										<?php if ($pay_method == "cod") { ?>
											<div class="control-group">
												<label class="control-label" for="basicinput">Pay Method</label>
												<div class="controls">
													<input type="text" name="pay_method" class="span8 tip" value="Cash On Delivery" disabled>
												</div>
											</div>


										<?php } else { ?>

											<div class="control-group">
												<label class="control-label" for="basicinput">Pay Method</label>
												<div class="controls">
													<input type="text" name="pay_method" class="span8 tip" value="QR Payment" disabled>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">UPI ID</label>
												<div class="controls">
													<input type="text" name="upi_id" class="span8 tip" value="<?php echo $upi_id; ?>" disabled>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">UPI Transaction ID</label>
												<div class="controls">
													<input type="text" name="upi_transaction_id" class="span8 tip" value="<?php echo $upi_transaction_id; ?>" disabled>
												</div>
											</div>

										<?php } ?>

										<div class="control-group">
											<label class="control-label" for="basicinput">Update Order Status</label>
											<div class="controls">
												<select name="order_status" class="span8 tip" required>
													<option value="unvalidated" <?php if ($order_status == 'unvalidated') echo "selected"; ?>>Unvalidated</option>
													<option value="in process" <?php if ($order_status == 'in process') echo "selected"; ?>>In Process</option>
													<option value="delivered" <?php if ($order_status == 'delivered') echo "selected"; ?>>delivered</option>
												</select>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>


							<div class="module">
								<div class="module-head">
									<h3>Manage Categories</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Image</th>
												<th>Size</th>
												<th>Quantity</th>
												<th>SubTotal</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$oid = intval($_GET['oid']);
											$sqls = "SELECT * FROM orders WHERE oid=$oid";
											$result = $con->query($sqls);
											$rows = $result->fetch_assoc();
											$invoice = $rows['invoice'];
											$cnt = 1;

											$query = mysqli_query($con, "SELECT * FROM order_items WHERE invoice = '$invoice'");
											while ($row = mysqli_fetch_array($query)) {
												$pdid = $row['pdid'];
												$sqls = "SELECT * FROM shop WHERE pdid=$pdid";
												$result = $con->query($sqls);
												$rows = $result->fetch_assoc();
												$pdname = $rows['pdname'];
												$pdimage1 = $rows['pdimage1'];
												$productimageLoc = "productimages/pdid" . $pdid . "/" . $pdimage1;
											?>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $pdname; ?></td>
													<td><img src="<?php echo $productimageLoc; ?>" alt="" height="80px" width="80px"></td>
													<td><?php echo $row['size']; ?></td>
													<td><?php echo $row['qty']; ?></td>
													<td><?php echo $row['subtotal']; ?></td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>

									</table>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
	</body>
<?php } ?>