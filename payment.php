<?php include('admin/conn.php'); ?>
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
$payment = $_SESSION["payment"];
if($payment == "codpymtd"){
    echo "<script>window.location.href='order.php';</script>";
}
?>

<?php
if (isset($_POST['order'])) {
    $_SESSION['upi_id'] = $_POST['upi_id'];
    $_SESSION['upi_trans_id'] = $_POST['upi_trans_id'];
    echo "<script>window.location.href='order.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce_site</title>
    <!--google fonts link-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--Bootstrap link-->

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />


    <!--font-awesome cdn link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!--Noty link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/noty.css" media="all" />
    <script type="text/javascript" src="assets/js/noty.js"></script>

    <!--default css link-->

    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
</head>

<body>
    <div class="container-lg py-3 my-4 <?php if($payment != "qrpymtd"){ echo "d-none";} ?>" id="paymentpage">
        <div class="container mx-auto mt-2">
            <div class="text-center mx-auto mb-2">
                <h3 class="text-primary fw-bold">Payment</h3>
                <h5 class="text-uppercase">Scan The QR Code and Pay The Amount Given Below</h5>
            </div>
            <div class="text-center mx-auto mb-3">
                <img src="assets/img/qrimg2.jpeg" width="50%" alt="" title="QR Code To Pay">
            </div>
            <div class="text-center mx-auto mb-3">
                <form action="payment.php" method="post" enctype="multipart/form-data" class="form">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Enter Your UPI ID *</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your UPI ID" name="upi_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Enter UPI Transaction ID(Generated After the Payment) *</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Transaction ID" name="upi_trans_id" required>
                    </div>
                    <div class="my-4 text-center d-grid gap-2 col-6 mx-auto">
                        <input type="submit" value="Place Order" name="order" class="btn btn-primary btn-form px-5 py-2">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Bootstrap link-->
	<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
	
	<!--javascript links-->
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>