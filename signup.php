<!---header Start---->

<?php

include('include/header.php');

?>
<?php
if (isset($_SESSION['userid'])) { 
    echo "<script>window.location.href='profile.php';</script>";
}
?>
<?php
$errortext ="";
if ($_POST['signup'] == "Register") {

    $cphone = (int)$_POST['cphone'];

    $sql_phone="SELECT * FROM customer_details WHERE cphone='$cphone'";
    $result_phone=mysqli_query($con,$sql_phone);
    $rowcount=mysqli_num_rows($result_phone);

    if($rowcount > 0){
        $errortext = '<h5 class="mb-3 mx-auto text-center text-danger"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cannot Register, User Account Already Present! Please Login</h5>';
        $_POST = array();
        
    } else{

        $cname = $_POST['cname'];
        $ctoken = bin2hex(random_bytes(5));
        $cemail = $_POST['cemail'];
        $caddress = $_POST['caddress'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $cpassword = $_POST['cpassword'];
        $ccreate_date = date("Y-m-d H:i:s");

        $query = mysqli_query($con, "select max(cid) as cid from customer_details");
		$result = mysqli_fetch_array($query);
		$cid = $result['cid'] + 1;

        $sql = "INSERT INTO customer_details SET cid='$cid', ctoken='$ctoken', cname='$cname', cphone='$cphone', cemail='$cemail', caddress='$caddress', state='$state', pincode='$pincode', cpassword='$cpassword', ccreate_date='$ccreate_date'";
        mysqli_query($con, $sql);
        $_SESSION['registeruptoken'] = true;
        $successtext ='<i class="fa-solid fa-check"></i>&nbsp;&nbsp;Registration Complete, You can Login';
        echo " <script>new Noty({
            theme : 'relax' , 
            text: '".$successtext."',
            type: 'success',
            layout : 'topRight',
            timeout : 1000
            
        }).show();</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
	// header('location:signup.php');
}

?>

<!---header End---->
<section id="signup-form">
    <h5 class="mt-3 mb-3 mx-auto text-center">
        <a href="login.php">Already have an account ? Login &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
    </h5>
    <div class="container col-11 col-md-7 mx-auto mb-5 py-4 mt-1 shadow-lg rounded">
        <?php echo $errortext; ?>
        <h2 class="mb-3 mx-auto text-center">Customer Registration</h2>
        <form action="signup.php" method="post" enctype="multipart/form-data" class="form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Full Name" name="cname" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Phone Number * (+91-)</label>
                <input type="number" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Phone Number" name="cphone" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Enter Your Email" name="cemail" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea4" class="form-label">Address *</label>
                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Enter Your Full Address" name="caddress" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">State *</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Your State" name="state" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">Pincode *</label>
                <input type="number" class="form-control" id="exampleFormControlInput5" name="pincode" required>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Password *</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" title="8-20 Characters long" minlength="8" maxlength=20" name="cpassword" required>
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must be 8-20 characters long.(Must not contain spaces)
                    </span>
                </div>
            </div>
            <div class="my-4 text-center d-grid gap-2 col-6 mx-auto">
                <input type="submit" value="Register" name="signup" class="btn btn-primary btn-form px-5 py-2">
            </div>
        </form>
    </div>
</section>





<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->