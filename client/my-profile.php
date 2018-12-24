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


$query="SELECT * FROM clients WHERE cuname='$ausername'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['cno'];
//update profile
if(isset($_POST['updateprofile']))
{
	$username=$_POST['username'];
	$cemail=$_POST['cemail'];
	$cphno=$_POST['cphno'];
	$sname=$_POST['sname'];
	$semail=$_POST['semail'];
	$sphone=$_POST['sphone'];
	$saddr=$_POST['saddr'];
	//$saddr.= ', '.$_POST['saddr2'];
	$sgst=$_POST['sgst'];

	$uquery="UPDATE clients SET cuname='$username', cemail='$cemail', cphno='$cphno', sname='$sname', semail='$semail', sphno='$sphone', saddress='$saddr', sgstno='$sgst' WHERE cno='$id'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT * FROM clients WHERE cuname='$ausername'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$id = $row['cno'];
		$smsg="Account updated successfully!";

	}
	else
	{
		$fmsg="error!";
	}
}
//change password
if(isset($_POST['changepw']))
{
	$oldpw=md5($_POST['oldpassword']);
	if($oldpw==$row["cpassword"])
	{
		$npw=md5($_POST['newpassword']);
		$pwquery="UPDATE clients SET cpassword='$npw' WHERE cno='$id'";
		$pwresult = mysqli_query($connection, $pwquery);
		$smsg="Password updated successfully!";
		
	}
	else
	{
		$fmsg="Wrong old password!";
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
      
      <!-- username check js start -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check-username.php", {
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
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.php" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!--DNS added Dashboard content-->
                
                 <!--DNS Added Model-->
                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Importent Instruction</h4>
                                        </div>
                                        <div class="modal-body">
                                       	 To Edit Admin information or to delete Admin account you need to login to that admin account.
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <a href="logout.php" class="btn btn-danger waves-effect waves-light">Proceed for login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <!--DNS model END-->
               
                
                <!--row -->
                <?php if(isset($fmsg)) { ?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $fmsg; ?>
									</div> 
					            <?php }?> 
							<?php if(isset($smsg)) { ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $smsg; ?>
									</div> 
				<?php }?>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" height="100%" alt="user" src="../plugins/images/profile-menu.png">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="../plugins/images/users/doctor-female.jpg" class="thumb-lg img-circle" ></a>
                                        <h4 class="text-white"><?php echo $row["cuname"]; ?></h4>
                                        <h5 class="text-white"><?php echo $row["cemail"]; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <!--<li role="presentation" class="nav-item"><a href="#home" class="nav-link " aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs"> Activity</span></a></li>-->
                                <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Setting</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#changepassword" class="nav-link" aria-controls="changepassword" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-key"></i></span> <span class="hidden-xs">Change Password</span></a></li>
								<li role="presentation" class="nav-item"><a href="#remove" class="nav-link" aria-controls="remove" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-times"></i></span> <span class="hidden-xs">Remove Account</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["cuname"]; ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["cphno"]; ?></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 "> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["cemail"]; ?></p>
                                        </div>
                                        
                                    </div>
                                    <hr class="m-t-10 m-b-10">
									<h5 class="font-bold m-t-10">Shop Details</h5>
									<hr class="m-t-10 m-b-10">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Shop Name</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["sname"]; ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Shop Mobile</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["sphno"]; ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Shop email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["semail"]; ?></p>
                                        </div>
									</div>
									<hr class="m-t-10 m-b-10">
									<div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Shop Address</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["saddress"]; ?></p>
                                        </div>
										<?php if(isset($row['sgstno'])) { ?>
                                        <div class="col-md-3 col-xs-6"> <strong>Shop GST No.</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["sgstno"]; ?></p>
                                        </div> <?php } ?>
									</div>
                                    
                                </div>
                                
                               
                            <div class="tab-pane" id="settings">
                             <form data-toggle="validator" method="post">
          
                               
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Username</label>
                                    <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username is used to login" value="<?php echo $row["cuname"]; ?>" required>
                                    <!-- username check start -->
										<div>
										<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="usernameResult" style="color: #E40003"></span>
										</div>
				                     <!-- username check end -->
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="email" name="cemail" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row["cemail"]; ?>" data-error="This email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>    
                                <div class="form-group">
                                    <label  for="special">Mobile Number</span>
                                    </label>
                                        <input type="text" id="special" name="cphno" class="form-control" placeholder="Enter your mobile number" data-error="Invalid mobile number" value="<?php echo $row["cphno"]; ?>" required>
								 		<div class="help-block with-errors"></div>
                                </div>
								<hr>
                                <div class="form-group">
                          
                                        <label class="control-label">Shop Name</label>
                                        <input type="text" name="sname" class="form-control" id="fname" placeholder="Enter your shop name" required value="<?php echo $row["sname"]; ?>" >
                                    
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Shop Email</label>
									 <input class="form-control" name="semail" type="email" required placeholder="Enter the email-id" value="<?php echo $row["semail"]; ?>" data-error="This email address is invalid">
									<div class="help-block with-errors"></div>
                                </div>
								<div class="form-group">
                                    <label class="control-label">Shop Phone Number</label>
                                         <input type="tel" pattern="[0-9]*" maxlength="11" minlength="10" required id="example-phone" name="sphone" class="form-control" placeholder="Enter your phone number" data-error="Invalid mobile number" value="<?php echo $row["sphno"]; ?>" >
                                        <div class="help-block with-errors"></div>
                                    
                                </div>
								<div class="form-group">
                                    <label>Shop Address </label>
									<textarea rows="3" required class="form-control" name="saddr" style=" resize:none "><?php echo $row['saddress']; ?></textarea>
                                    
                                </div>
								<div class="form-group">
                                    <label class="control-label">Shop GST Number</label>
									<input type="text" name="sgst" class="form-control" placeholder="Enter the GST number(optional)" <?php if(isset($row['sgstno'])) { ?> value="<?php echo $row['sgstno']; ?>" <?php } ?> >
                                </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" name="updateprofile">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="tab-pane" id="changepassword"> 
                                
                                <form data-toggle="validator" method="post">
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label">Change Password</label>
                                    <div calss="row">
                                    <div class="form-group col-sm-12 p-l-0 p-t-10">
                                    <input type="password" name="oldpassword" data-toggle="validator" data-minlength="6" class="form-control" id="oldPassword" placeholder="Old Password" required>
                                     </div>
									</div>
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="newpassword" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="New Password" required>
                                            <span class="help-block">Minimum of 6 characters</span> </div>
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="retypepassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Passwords don't match" placeholder="Confirm New Password" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group p-t-0">
                                    
                                        <button class="btn btn-success" name="changepw">Change Password</button>
                                     
                                </div>
                                
								</form>
                                
                                
								</div>
								<div class="tab-pane" id="remove">
                              		<div class="text-center">
                              		<a href="#" class="fcbtn btn btn-danger model_img deleteAdmin" data-id="<?php echo $id ?>" id="deleteDoc">Remove Admin Account</a>
									</div>
								</div>
                               
                            </div>
                        </div>
                    </div>
                </div>
              
                <!--/row -->
                
                <!--DNS End-->
                <!-- .row -->
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Blank Starter page</h3>
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->
                <!-- .right-sidebar -->
                 <!-- Removed Service Panel DNS-->
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
<script>
$(document).ready(function() {
  $('.deleteAdmin').click(function(){
    id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this account!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false,
		  closeOnCancel: false
      },function(isConfirm)
		 {   
           if (isConfirm) {
			   $.ajax({
			  url: 'deleteadmin.php?id='+id,
			  type: 'DELETE',
			  data: {id:id},
			  success: function(){
				swal("Deleted!", "User has been deleted.", "success");
				window.location.replace("logout.php");
          }
        });   
            } else {     
                swal("Cancelled", "Admin account is safe :)", "error");   
            }
      });
  });

});
	
</script>

</html>
