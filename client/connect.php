<?php

//include_once('./login/connect.php');

$connection = mysqli_connect("103.108.220.200","kersahtn_invoiceadmin","invoiceadmin@12");
if(!$connection)
{
	echo "failed to connect";
	//die("Database Connection Failed" . mysqli_error($connection));
}
$dbselect = mysqli_select_db($connection,'kersahtn_invoice');
if(!$dbselect)
{
	echo "failed to select the database";
	//die("failed to select the database" . mysqli_error($connection)); 
	//die function is used to stop the executon of the page and (.) is used for concatinain since its a sting output
}

?>