<?php include('include/header.php'); ?>
<!---header Start---->

<?php
// if (!isset($_SESSION['userid'])) {
if (strlen($_SESSION['userid']) == 0) {
    echo "<script>window.location.href='login.php';</script>";
}
?>
<?php

$errortext = "";
$ctoken=$_SESSION['userid'];
$sqls = "SELECT * FROM customer_details WHERE ctoken='$ctoken'";
$result = $con->query($sqls);
$rows = $result->fetch_assoc();
$cname = $rows['cname'];
$cemail = $rows['cemail'];
$caddress = $rows['caddress'];
$state  = $rows['state'];
$pincode = $rows['pincode'];
$cpassword = $rows['cpassword'];

if (isset($_POST['submit'])) {

    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $caddress = $_POST['caddress'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $cpassword = $_POST['cpassword'];

    $sql = "UPDATE customer_details SET cname='$cname', cemail='$cemail', caddress='$caddress', state='$state', pincode='$pincode', cpassword='$cpassword' WHERE ctoken='$ctoken'";
    mysqli_query($con, $sql);
    $successtext = '<i class="fa-solid fa-check"></i>&nbsp;&nbsp;Profile Updated Successfully';
    echo " <script>new Noty({
            theme : 'relax' , 
            text: '" . $successtext . "',
            type: 'success',
            layout : 'topRight',
            timeout : 1000
            
        }).show();</script>";
}

?>

<!---header End---->
<section id="signup-form">
    <h5 class="mt-3 mb-3 mx-auto text-center">
        <a href="userorders.php">View All Your Orders &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
    </h5>
    <div class="container col-11 col-md-7 mx-auto mb-5 py-4 mt-1 shadow-lg rounded">
        <h2 class="mx-auto text-center mb-0">Your Profile</h2>
        <h6 class="mb-3 mx-auto text-center mt-0">(You Can Edit/Update)</h6>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Full Name" name="cname" value="<?php echo $cname; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Enter Your Email" name="cemail" value="<?php echo $cemail; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea4" class="form-label">Address *</label>
                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Enter Your Full Address" name="caddress" required><?php echo $caddress; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">State *</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Your State" name="state" value="<?php echo $state; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">Pincode *</label>
                <input type="number" class="form-control" id="exampleFormControlInput5" name="pincode" value="<?php echo $pincode; ?>" required>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Password *</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" title="8-20 Characters long" minlength="8" maxlength=20" name="cpassword" value="<?php echo $cpassword; ?>" required>
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must be 8-20 characters long.(Must not contain spaces)
                    </span>
                </div>
            </div>
            <div class="my-4 text-center d-grid gap-2 col-6 mx-auto">
                <input type="submit" value="Update Profile" name="submit" class="btn btn-primary btn-form px-5 py-2">
            </div>
        </form>
    </div>
    <h5 class="my-3 mx-auto text-center">
        <a href="logout.php" class="btn btn-primary btn-form px-5 py-2">LOGOUT</a>
    </h5>
</section>





<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->