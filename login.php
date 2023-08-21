<?php include('include/header.php'); ?>
<!---header Start---->
<?php
// if (isset($_SESSION['userid'])) { 
if (strlen($_SESSION['userid']) != 0) {
    echo "<script>window.location.href='profile.php';</script>";
}
?>
<?php

    if (isset($_SESSION['registeruptoken']) && $_SESSION['registeruptoken'] == true) { 
        $successtext ='<i class="fa-solid fa-check"></i>&nbsp;&nbsp;Registration Complete, You can Login';
        echo " <script>new Noty({
            theme : 'relax' , 
            text: '".$successtext."',
            type: 'success',
            layout : 'topRight',
            timeout : 4000
            
        }).show();</script>";
        unset($_SESSION['registeruptoken']);
    }
?>
<?php
$finaltext = "";
if ($_POST['signin'] == "Login") {

    $cphone = (int)$_POST['cphone'];
    $cpassword = $_POST['cpassword'];

    $sql_phone = "SELECT * FROM customer_details WHERE cphone='$cphone'";
    $result_phone = mysqli_query($con, $sql_phone);
    $rowcount = mysqli_num_rows($result_phone);

    if ($rowcount > 0) {
        $sql = "SELECT * FROM customer_details WHERE cphone='$cphone' AND cpassword='$cpassword'";
        $result = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
            $rows = $result->fetch_assoc();
            $_SESSION['userid'] = $rows['ctoken'];
            echo "<script>window.location.href='profile.php';</script>";
        }else{
            $finaltext = '<h5 class="mb-3 mx-auto text-center text-danger"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;User Password do not match.</h5>';
            $_POST = array();
        }
        
    } else {
        $finaltext = '<h5 class="mb-3 mx-auto text-center text-danger"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;User Account not found.</h5>';
    }
    // header('location:signup.php');
}

?>

<!---header End---->
<section id="signin-form">
    <div class="container col-11 col-md-4 mx-auto my-3 py-3 px-4 shadow-lg rounded">
        <?php echo $finaltext; ?>
        <h2 class="mb-3 mx-auto text-center">Customer Login</h2>
        <form action="login.php" method="post" enctype="multipart/form-data" class="form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone Number * (+91-)</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Phone Number" name="cphone" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Password *</label>
                <input type="password" id="exampleFormControlInput2" class="form-control" title="8-20 Characters long" minlength="8" maxlength=20" name="cpassword" required>
            </div>
            <div class="my-4 text-center d-grid gap-2 col-6 mx-auto">
                <input type="submit" value="Login" name="signin" class="btn btn-primary btn-form px-5 py-2">
            </div>
        </form>
    </div>
    <h5 class="mb-3 mx-auto text-center">
        <a href="login.php">Don't have an account ? Register now &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
    </h5>
</section>





<!--Footer Start Here-->

<?php

include('include/footer.php');

?>
<!--Footer End Here-->