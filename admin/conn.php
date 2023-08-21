<?php session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','','ecommerce_site');
// $con=mysqli_connect('localhost','uwcforyo_ecom','bY4=xB9?@_F%','uwcforyo_ecomdb');

if(!$con)
{
	echo "Sucessfully not connected";
}


?>