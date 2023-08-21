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
    <div class="container my-4" id="ordercontainer">
        <div class="jumbotron text-center my-4">
            <h1 class="display-5 text-primary fw-bold"><i class="fa fa-circle-check"></i></h1>
            <h1 class="display-6 text-primary fw-bold">Thank You for Your Order!</h1>
            <hr>
            <p class="lead">Your order has been placed and will be processed shortly.</p>
            <p class="lead">You will receive an email confirmation with your order details shortly.</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Order Summary</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $random_string = preg_replace('/[a-z]/', '', strtoupper(bin2hex(random_bytes(6))));
                        $invoice = "INVTXN-" . $random_string;
                        $pdatetime = date('d-m-Y h:i A');
                        $order_date = date("Y-m-d H:i:s");
                        $ctoken = $_SESSION['userid'];
                        $paymentMode = "qr";
                        if (isset($_SESSION['payment']) && $_SESSION['payment'] == "qrpymtd") {
                            $paymentMode = "qr";
                        } else {
                            $paymentMode = "cod";
                        }

                        $i = 0;
                        $finalTotalAmt = 0;
                        $finalTotalQty = 0;
                        foreach ($_SESSION['cart_pdid'] as $key => $value) {
                            $i++;
                        }
                        for ($c = 0; $c < $i; $c++) {
                            $item = (int)$_SESSION['cart_pdid'][$c];
                            $quantity = (int)$_SESSION['cart_pdqty'][$c];
                            $size = $_SESSION['cart_pdsize'][$c];

                            $sql = "SELECT * FROM shop WHERE pdid='$item'";
                            $result = $con->query($sql);
                            $rows = $result->fetch_assoc();
                            $itemPrice = (int)$rows['pdprice'];
                            $subtotal = $quantity * $itemPrice;
                            $finalTotalQty += $quantity;
                            $finalTotalAmt += $subtotal;
                            $sql2 = "INSERT INTO order_items SET 
                                        pdid='$item', 
                                        invoice='$invoice', 
                                        size='$size', 
                                        qty='$quantity', 
                                        ctoken='$ctoken', 
                                        order_date='$order_date', 
                                        paymod='$paymentMode', 
                                        subtotal='$subtotal'";
                            mysqli_query($con, $sql2);

                        ?>
                            <tr>
                                <td><?php echo $rows['pdname']; ?></td>
                                <td><?php echo $size; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>Rs <?php echo $subtotal; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Order Details</h3>
                <ul class="list-group">
                    <li class="list-group-item">Invoice Number: <?php echo $invoice; ?></li>
                    <li class="list-group-item">Order Date: <?php echo $pdatetime; ?></li>
                    <li class="list-group-item">Total Items: <?php echo $finalTotalQty; ?></li>
                    <li class="list-group-item total">Total Amount: Rs<?php echo $finalTotalAmt; ?></li>
                    <?php
                    $ctoken = $_SESSION['userid'];
                    if (isset($_SESSION['payment']) && $_SESSION['payment'] == "qrpymtd") {
                        $paymentMode = "qr";
                    } else {
                        $paymentMode = "cod";
                    }
                    if (isset($_SESSION['upi_id'])) {
                        $upi_id = $_SESSION['upi_id'];
                        $upi_trans_id = $_SESSION['upi_trans_id'];
                    } else {
                        $upi_id = "";
                        $upi_trans_id = "";
                    }

                    $sql3 = "INSERT INTO orders SET
                                ctoken='$ctoken',
                                invoice='$invoice',
                                totalqty='$finalTotalQty',
                                totalamt='$finalTotalAmt',
                                order_date='$order_date',
                                pay_method='$paymentMode',
                                upi_id='$upi_id',
                                upi_transaction_id='$upi_trans_id',
                                order_status='unconfirmed'";
                    mysqli_query($con, $sql3);
                    ?>
                </ul>
            </div>
        </div>
        <div class="my-4 text-center d-grid gap-2 col-6 mx-auto">
            <!-- <input type="submit" value="Place Order" name="order" class="btn btn-primary btn-form px-5 py-2"> -->
            <a href="shop.php" class="btn btn-primary btn-form px-5 py-2">Go Back To Shop</a>
        </div>
    </div>
    <?php
    $ctoken = $_SESSION['userid'];
    session_unset();
    $_SESSION['userid'] = $ctoken;
    ?>

    <!--Bootstrap link-->
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>

    <!--javascript links-->
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>