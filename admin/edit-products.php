<?php
include('conn.php');
if (strlen($_SESSION['alogin']) == 0) {
	echo "<script>window.location.href='index.php';</script>";
} else {
	$pid = intval($_GET['id']); // product id
	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$productname = $_POST['productName'];
		$productcompany = $_POST['productCompany'];
		$productprice = $_POST['productprice'];
		$productdescription = trim($_POST['productDescription']);
		$pdstars = $_POST['pdstars'];
		$pd_date = date("Y-m-d H:i:s");

		$sql = mysqli_query($con, "UPDATE  shop SET pdcategory='$category',
		pdname='$productname',
		pdbrand='$productcompany',
		pdstars='$pdstars',
		pdprice='$productprice',
		pd_date='$pd_date',
		pddetail='$productdescription' where pdid='$pid' ");
		$_SESSION['msg'] = "Product Updated Successfully !!";
	}

	


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Insert Product</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>

		</script>


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
									<h3>Edit Product</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

										<?php

										$query = mysqli_query($con, "select * from shop where pdid='$pid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($query)) {



										?>


											<div class="control-group">
												<label class="control-label" for="basicinput">Category</label>
												<div class="controls">
													<select name="category" class="span8 tip"  required>
														<?php $query = mysqli_query($con, "select * from category");
														while ($rw = mysqli_fetch_array($query)) {
														?>
															<option value="<?php echo $rw['ctname']; ?>"><?php echo $rw['ctname']; ?></option>
														<?php 
														} ?>
													</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Ratings</label>
												<div class="controls">
													<select name="pdstars" class="span8 tip"  required>
														<option value="1" <?php if($row['pdstars'] == 1) echo "selected"; ?>>1 Star</option>
														<option value="2" <?php if($row['pdstars'] == 2) echo "selected"; ?>>2 Star</option>
														<option value="3" <?php if($row['pdstars'] == 3) echo "selected"; ?>>3 Star</option>
														<option value="4" <?php if($row['pdstars'] == 4) echo "selected"; ?>>4 Star</option>
														<option value="5" <?php if($row['pdstars'] == 5) echo "selected"; ?>>5 Star</option>
													</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Name</label>
												<div class="controls">
													<input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo htmlentities($row['pdname']); ?>" class="span8 tip">
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Company</label>
												<div class="controls">
													<input type="text" name="productCompany" placeholder="Enter Product Comapny Name" value="<?php echo htmlentities($row['pdbrand']); ?>" class="span8 tip" required>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Product Price</label>
												<div class="controls">
													<input type="number" name="productprice" placeholder="Enter Product Price" value="<?php echo htmlentities($row['pdprice']); ?>" class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Description</label>
												<div class="controls">
													<textarea name="productDescription" placeholder="Enter Product Description" rows="6" class="span8 tip"><?php echo $row['pddetail']; ?></textarea>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image1</label>
												<div class="controls">
													<img src="productimages/pdid<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['pdimage1']); ?>" width="200" height="100"> <a href="update-image.php?id=<?php echo $pid; ?>&imgid=1">Change Image</a>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image2</label>
												<div class="controls">
													<img src="productimages/pdid<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['pdimage2']); ?>" width="200" height="100"> <a href="update-image.php?id=<?php echo $pid; ?>&imgid=2">Change Image</a>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image3</label>
												<div class="controls">
													<img src="productimages/pdid<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['pdimage3']); ?>" width="200" height="100"> <a href="update-image.php?id=<?php echo $pid; ?>&imgid=3">Change Image</a>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image4</label>
												<div class="controls">
													<img src="productimages/pdid<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['pdimage4']); ?>" width="200" height="100"> <a href="update-image.php?id=<?php echo $pid; ?>&imgid=4">Change Image</a>
												</div>
											</div>
										<?php } ?>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
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