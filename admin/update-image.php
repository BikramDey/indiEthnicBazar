<?php
include('conn.php');
if (strlen($_SESSION['alogin']) == 0) {
	echo "<script>window.location.href='index.php';</script>";
} else {
	$pid = intval($_GET['id']); // product id
	$pdimgid = intval($_GET['imgid']); // product image number
	$imgcolname = "pdimage" . $pdimgid;
	$sqls = "SELECT * FROM shop WHERE pdid=$pid";
	$result = $con->query($sqls);
	$rows = $result->fetch_assoc();
	$productimageLoc = "productimages/pdid" . $pid . "/" . $rows[$imgcolname];
	$pdname = $rows['pdname'];


	if (isset($_POST['submit'])) {
		$productimage1 = $_FILES["productimage1"]["name"];


		if (file_exists($productimageLoc)) {
			unlink($productimageLoc);
		}

		$filenamearr = explode('.', basename($productimage1));
		$arrleng = sizeof($filenamearr);
		$extension = $filenamearr[$arrleng - 1];
		$finalimgname = "pdid" . $pid . "-image" . $pdimgid ."." . $extension;


		move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/pdid" . $pid . "/" . $finalimgname);
		$sql = mysqli_query($con, "UPDATE  shop SET $imgcolname='$finalimgname' where pdid='$pid' ");
		$_SESSION['msg'] = "Product Image Updated Successfully !!";
	}


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Update Product Image</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>

		<script>
			function getSubcat(val) {
				$.ajax({
					type: "POST",
					url: "get_subcat.php",
					data: 'cat_id=' + val,
					success: function(data) {
						$("#subcategory").html(data);
					}
				});
			}

			function selectCountry(val) {
				$("#search-box").val(val);
				$("#suggesstion-box").hide();
			}
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
									<h3>Update Product Image 1</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>



									<br />

									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text" name="productName" readonly value="<?php echo $pdname; ?>" class="span8 tip" disabled>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Current Product Image <?php echo $pdimgid; ?></label>
											<div class="controls">
												<img src="<?php echo $productimageLoc; ?>" width="200" height="100">
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">New Product Image <?php echo $pdimgid; ?></label>
											<div class="controls">
												<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
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