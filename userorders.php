<!---header Start---->

<?php include('include/header.php'); ?>
<?php
if (!isset($_SESSION['userid'])) {
    echo "<script>window.location.href='login.php';</script>";
}
?>

<!---header End---->
<div class="container mx-auto my-4 p-3">
    <table class="table table-striped table-bordered shadow-lg rounded">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Category </th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Order Total</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ctoken = $_SESSION['userid'];
            $cnt = 1;

            $query = mysqli_query($con, "SELECT * FROM order_items WHERE ctoken = '$ctoken' ORDER BY order_date DESC");
            while ($row = mysqli_fetch_array($query)) {
                $pdid = $row['pdid'];
                $sqls = "SELECT * FROM shop WHERE pdid=$pdid";
                $result = $con->query($sqls);
                $rows = $result->fetch_assoc();
                $pdname = $rows['pdname'];
                $pdimage1 = $rows['pdimage1'];
                $productimageLoc = "admin/productimages/pdid" . $pdid . "/" . $pdimage1;
            ?>
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $pdname; ?></td>
                    <td><img src="<?php echo $productimageLoc; ?>" alt="" height="80px" width="80px"></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['subtotal']; ?></td>
                    <td><?php echo $row['paymod']; ?></td>
                </tr>
            <?php $cnt = $cnt + 1;
            } ?>
        </tbody>
    </table>
</div>






<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->