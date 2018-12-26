<?php
require('connect.php');
if(isset($_POST['username']) && isset($_POST['cpass']) && isset($_POST['cemail']))
{
	$cuname=$_POST['username'];
	$cemail=$_POST['cemail'];
	$cphno=$_POST['cphno'];
	$cpass=md5($_POST['cpass']);
	$crpass=md5($_POST['crpass']);
	$sname=$_POST['sname'];
	$semail=$_POST['semail'];
	$sphone=$_POST['sphone'];
	$saddr=$_POST['saddr1'];
	$saddr.= ', '.$_POST['saddr2'];
	$sgst=$_POST['sgst'];
	
	if($cpass == $crpass) 
	{

		$insertquery="INSERT INTO `clients` (cuname, cemail, cphno, cpassword, sname, semail, sphno, saddress, sgstno) VALUES ('$cuname','$cemail','$cphno','$cpass','$sname','$semail','$sphone','$saddr','$sgst')";
		$insertc=mysqli_query($connection,$insertquery);
		if($insertc)
		{
			$smsg="Account created successfully redirecting to login in 4 seconds";
		}
		else
		{
			$fmsg="not successful".mysqli_error($connection);
		}
	}
	else
	{
		$fmsg="Password doesnt match";
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>OFMS-EventRegister</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../plugins/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../plugins/css/colors/blue.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!-- username check js start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#usernameLoading').hide();
			$('#username').keyup(function(){
			  $('#usernameLoading').show();
			  $.post("check-clientusername.php", {
				username: $('#username').val()
			  }, function(response){
				$('#usernameResult').fadeOut();
				setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 500);
			  });
				return false;
			});
		});

		function finishAjax(id, response) {
		  $('#usernameLoading').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} //finishAjax
	</script>
	<!-- username check js end -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
<section id="wrapper" class="login-register" style="overflow: scroll">    
	
<div style="padding-top: 20px; padding-left: 60px; padding-right: 60px; padding-bottom: 40px">
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
							echo '<script> window.setTimeout(function(){
		swal("Your Account is Created!", "Redirecting to login page in 4 seconds.", "success");
	}, 300);  window.setTimeout(function(){
		window.location.href = "../login/";
	}, 4000); </script>'
				?>
			</div> 
	<?php }?>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
				<a href="javascript:void(0)" class="text-center db m-b-40"><img src="../plugins/images/eliteadmin-logo-dark.png" alt="Home" />
                    <br/><img src="../plugins/images/eliteadmin-text-dark.png" alt="Home" /></a>
                <form data-toggle="validator" method="post">
                    <h3 class="box-title m-b-20">Enter Account Details</h3><hr>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label class="control-label">Username</label>
                            <input autocomplete="off" class="form-control" type="text" required placeholder="Enter the username" id="username" name="username">
							<!-- username check start -->
							<div>
							<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
							<span id="usernameResult" style="color: #E40003"></span>
							</div>
							<!-- username check end -->
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label class="control-label">Email-ID</label>
                            <input class="form-control" name="cemail" type="email" required placeholder="Enter the email-id" data-error="This email address is invalid">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-xs-12">
                             <label class="control-label">Mobile Number</label>
                             <input type="tel" pattern="[0-9]*" maxlength="11" minlength="10" required id="example-phone" name="cphno" class="form-control" placeholder="Enter your mobile number" data-error="Invalid mobile number">
                            <div class="help-block with-errors"></div>
                         </div>
                    </div>
                    <div class="row col-xs-12">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label class="control-label">Password</label>
                            <input required  id="inputPassword" data-minlength="6" class="form-control" name="cpass" type="password" placeholder="Enter the password(minimum of 6 characters)">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <input data-match="#inputPassword" data-match-error="Passwords don't match" data-minlength="6" class="form-control" type="password" name="crpass" required placeholder="Confirm Password">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                        </div>
                          <h3 class="box-title m-b-0">Shop Details</h3><hr>
                                <div class="row col-xs-12">
                                	<div class="col-md-12" >
                                       <div class="form-group">
                                        	 <label class="control-label">Shop Name</label>
                                            <input type="text" name="sname" class="form-control" id="fname" placeholder="Enter your shop name" required >
                                         </div>
                                    </div>
                                </div>
                                <div class="row col-xs-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Shop Email</label>
                                             <input class="form-control" name="semail" type="email" required placeholder="Enter the email-id" data-error="This email address is invalid">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                         <label class="control-label">Shop Phone Number</label>
                                         <input type="tel" pattern="[0-9]*" maxlength="11" minlength="10" required id="example-phone" name="sphone" class="form-control" placeholder="Enter your phone number" data-error="Invalid mobile number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    </div>
                                </div>
                
                                 <div class="row col-xs-12">
                                    <div class="col-md-12 ">
                                         <label class="control-label">Shop Address</label>
                                        <div class="form-group">
                                            <input name="saddr1" type="text" class="form-control" required placeholder="Address line 1">
                                        </div>
                                        <div class="form-group">
                                            <input name="saddr2" type="text" class="form-control" required placeholder="Address line 2">
                                        </div>
                                    </div>
                              
                                <div class="col-md-12 ">  
                                    <div class="form-group">
                                        <label class="control-label">Shop GST Number</label>
                                        <input type="text" name="sgst" class="form-control" placeholder="Enter the GST number(optional)">
                                    </div>
                                </div>
                                </div>
                        <div class="form-group">
                            <center>
                            <button type="submit" name="accsubmit" class="btn btn-rounded btn-lg btn-info">Submit</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../plugins/bootstrap/dist/js/tether.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../plugins/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../plugins/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
    <script src="../plugins/js/validator.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>

</html>
