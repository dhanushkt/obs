<?php 
require('../login/connect.php');
if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pass']))
{
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$mobno=$_POST['amob'];
	$passwd=md5($_POST['pass']);
	$insertquery="INSERT INTO `admin` (aname,aemail,amob,apassword) VALUES ('$uname','$email','$mobno','$passwd')";
	$insertresult=mysqli_query($connection,$insertquery);
}

?>