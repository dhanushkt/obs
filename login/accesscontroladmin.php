<?php
require('connect.php');
session_start();
if(!isset($_SESSION['ausername']))
{
	echo'<script> window.location="403.php";</script>';
}
?>