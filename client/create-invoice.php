<?php
include '../login/accesscontroldoc.php';
require('connect.php');
if(isset($_SESSION['cusername']))
{
	$ausername=$_SESSION['cusername'];
}
elseif(isset($_SESSION['ausername']))
{
	$ausername=$_SESSION['ausername'];
}
date_default_timezone_set('Asia/Kolkata');
if(isset($ausername))
{
		$getbillid="SELECT bill_id FROM bills";
		$getidresult=mysqli_query($connection,$getbillid);
		$getidfetch=mysqli_fetch_assoc($getidresult);
		do{
			$generateid=random_int(1056,9965);
		}
		while($getidfetch['bill_id']==$generateid);
		
}

if (isset($_POST['docsubmit']))
{
	$getcid="SELECT cno FROM clients WHERE cuname='$ausername'";
	$exegetcid=mysqli_query($connection,$getcid);
	$getquery=mysqli_fetch_assoc($exegetcid);
	$cid=$getquery['cno'];
	$dateofbill=date("d-m-Y");
	// real eacape sting is used to prevent sql injection hacking
	$cname= mysqli_real_escape_string($connection,$_POST['cname']);
	if(isset($_POST['email']))
	$cemail=mysqli_real_escape_string($connection,$_POST['email']);
	if(isset($_POST['phone']))
	$cphone=$_POST['phone'];
	$cmethod=mysqli_real_escape_string($connection,$_POST['cmethod']);

	$query="INSERT INTO `bills`(bill_id, billdate, custname, custemail, custphno, custmethod, cno) VALUES ('$generateid','$dateofbill','$cname','$cemail','$cphone','$cmethod','$cid')";
	$result = mysqli_query($connection, $query); 
	if($result)
	{
		$smsg = "Bill Created, Redirecting in 1 seconds (page will be reloaded to create new bill)";
	}
	else
	{
		$fmsg = "Something went wrong! ";
	}

}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AlphaCare Online Hospital Management System">
    <meta name="author" content="Dhanush KT, Nishanth Bhat">
    <!--csslink.php includes fevicon and title-->
    <?php include 'assets/csslink.php'; ?>
</head>

<body class="fix-sidebar">
    <!--header.php includes preloader, top navigarion, logo, user dropdown-->
    <!--div id wrapper in header.php-->
    <!--left-sidebar.php includes mobile search bar, user profile, menu-->
    <?php include 'assets/header.php';
		include 'assets/left-sidebar.php';
		include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Generate Bill</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../index.php" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="alert alert-info">
<!--					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
					<h4><center> <?php echo 'Generated Bill ID: #'.$generateid; ?></center> </h4>
				</div>
				<?php if(isset($fmsg)) { ?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $fmsg; ?>
									</div> 
					            <?php }?> 
							<?php if(isset($smsg)) { ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $smsg;
												$string="?id=".$generateid;
										echo '<script> window.setTimeout(function(){
											window.open("invoice.php'.$string.'","_blank");
										}, 1000); 
										
										window.setTimeout(function(){
											location=location;
										}, 7000);
										
										</script> ';
			//backup
//													echo '<script>window.setTimeout(function(){
//											window.location.href = "invoice.php'.$string.'";
//										}, 1000); </script> ';
													
										?>
									</div> 
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<b>	Please Allow Auto-popup in your broweser to open the bill </b>
				</div>
							<?php }?> 
				<!--- imported add-doctors---->
				<div class="row">
				<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Customers Information</h3>
                            <form data-toggle="validator" method="post">
                              
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Customer Name</label>
                                    <input type="text" class="form-control" autocomplete="off" id="cname" name="cname" placeholder="Enter Customer Name" required>
                                
                                </div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="inputEmail" class="control-label">Customer Email</label>
											<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter Customer Email" data-error="This email address is invalid">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-phone">Customer Phone</label>
												<input type="tel" pattern="[0-9]*" maxlength="11" id="example-phone" name="phone" class="form-control" placeholder="Enter Customer Phone" data-error="Invalid phone number">
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <label class="col-sm-12 p-l-0">Payment Method</label>
                                    <div class="col-sm-12 p-l-0">
                                        <select class="form-control" name="cmethod" required>
                                            <option selected hidden disabled>Select Payment Method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Debit/Credit Card">Debit/Credit Card</option>
											<option value="Online">Online (PAYTM,GPay)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
									<center>
									<button type="submit" name="docsubmit" class="btn btn-info waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil-square-o"></i></span>Create Bill</button>
									</center>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
				<!---End of impoted--->
                <!-- .right-sidebar -->
                <!--DNS Removed Service Panel-->
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>

</html>
