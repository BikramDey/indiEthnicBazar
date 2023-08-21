<?php include('admin/conn.php'); ?>
<?php
session_unset();
session_destroy();

echo "<script>window.location.href='login.php';</script>";
exit;
?>