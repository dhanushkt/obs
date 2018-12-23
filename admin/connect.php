<?php
$connection = mysqli_connect("localhost","root","");
if(!$connection)
{
	echo "failed to connect";
	//die("Database Connection Failed" . mysqli_error($connection));
}
$dbselect = mysqli_select_db($connection,'obs');
if(!$dbselect)
{
	echo "failed to select the database";
	//die("failed to select the database" . mysqli_error($connection)); 
	//die function is used to stop the executon of the page and (.) is used for concatinain since its a sting output
}

?>