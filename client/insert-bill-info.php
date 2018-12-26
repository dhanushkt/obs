<?php
require('connect.php');
if(isset($_POST['id']) && isset($_POST['totalamt']))
{
	$id=$_POST['id'];
	$totamt=$_POST['totalamt'];
	$discount=$_POST['discountamt'];
	$amtpaid=$_POST['totamtpaid'];
	$amtdue=$_POST['totamtdue'];
	$updatequery="UPDATE bills SET total_amt='$totamt',discount='$discount',amt_paid='$amtpaid',amt_due='$amtdue' WHERE bill_id='$id'";
	$updateresult=mysqli_query($connection,$updatequery);
}
?>