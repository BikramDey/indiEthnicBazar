<?php
include('conn.php');
function fileRenaming($pdid, $filename, $i)
{
	$filenamearr = explode('.', basename($filename));
	$arrleng = sizeof($filenamearr);
	$extension = $filenamearr[$arrleng - 1];
	$finalimgname = "pdid" . $pdid . "-image" . $i . "." . $extension;
	return $finalimgname;
}
if (strlen($_SESSION['alogin']) == 0) {
	echo "<script>window.location.href='index.php';</script>";
} else {

	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$productname = $_POST['productName'];
		$productcompany = $_POST['productCompany'];
		$productprice = $_POST['productprice'];
		$pd_date = date("Y-m-d H:i:s");
		$pdstars = $_POST['pdstars'];
		$productdescription = trim($_POST['productDescription']);
		$productimage1 = $_FILES["productimage1"]["name"];
		$productimage2 = $_FILES["productimage2"]["name"];
		$productimage3 = $_FILES["productimage3"]["name"];
		$productimage4 = $_FILES["productimage4"]["name"];
		//for getting product id
		$query = mysqli_query($con, "select max(pdid) as pid from shop");
		$result = mysqli_fetch_array($query);
		$productid = $result['pid'] + 1;
		$dir = "productimages/$productid";
		if (!is_dir($dir)) {
			mkdir("productimages/pdid" . $productid);
		}
		$target1 = fileRenaming($productid, $_FILES["productimage1"]["name"], 1);
		$target2 = fileRenaming($productid, $_FILES["productimage2"]["name"], 2);
		$target3 = fileRenaming($productid, $_FILES["productimage3"]["name"], 3);
		$target4 = fileRenaming($productid, $_FILES["productimage4"]["name"], 4);

		move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/pdid$productid/$target1");
		move_uploaded_file($_FILES["productimage2"]["tmp_name"], "productimages/pdid$productid/$target2");
		move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/pdid$productid/$target3");
		move_uploaded_file($_FILES["productimage4"]["tmp_name"], "productimages/pdid$productid/$target4");
		$sql = mysqli_query($con, "INSERT INTO shop SET pdid=$productid,
		pdname='$productname',
		pdbrand='$productcompany',
		pdstars='$pdstars',
		pdprice='$productprice',
		pdcategory='$category',
		pd_date='$pd_date',
		pdimage1='$target1',
		pdimage2='$target2',
		pdimage3='$target3',
		pdimage4='$target4',
		pddetail='$productdescription'");
		$_SESSION['msg'] = "Product Inserted Successfully !!";
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
									<h3>Insert Product</h3>
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

										<div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<select name="category" class="span8 tip" required>
													<option value="">Select Category</option>
													<?php $query = mysqli_query($con, "select * from category");
													while ($row = mysqli_fetch_array($query)) { ?>

														<option value="<?php echo $row['ctname']; ?>"><?php echo $row['ctname']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text" name="productName" placeholder="Enter Product Name" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Company</label>
											<div class="controls">
												<input type="text" name="productCompany" placeholder="Enter Product Company Name" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Price</label>
											<div class="controls">
												<input type="text" name="productprice" placeholder="Enter Product Price" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Description</label>
											<div class="controls">
												<textarea name="productDescription" placeholder="Enter Product Description" rows="6" class="span8 tip"></textarea>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<select name="pdstars" class="span8 tip" required>
													<option value="1">1 Star</option>
													<option value="2">2 Star</option>
													<option value="3">3 Star</option>
													<option value="4">4 Star</option>
													<option value="5">5 Star</option>
												</select>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image1</label>
											<div class="controls">
												<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image2</label>
											<div class="controls">
												<input type="file" name="productimage2" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image3</label>
											<div class="controls">
												<input type="file" name="productimage3" class="span8 tip">
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image4</label>
											<div class="controls">
												<input type="file" name="productimage4" class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Insert</button>
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