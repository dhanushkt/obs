<?php
include '../login/accesscontroladmin.php';
$ausername=$_SESSION['ausername'];
require('connect.php');

//$getpatientcount=mysqli_query($connection,"SELECT * FROM patients WHERE dod IS NULL");
//$pcount=mysqli_num_rows($getpatientcount);
//
//$getdoccount=mysqli_query($connection,"SELECT * FROM doctors");
//$dcount=mysqli_num_rows($getdoccount);
//
//$getstaffcount=mysqli_query($connection,"SELECT * FROM staffs");
//$scount=mysqli_num_rows($getstaffcount);
//
//$getwardcount=mysqli_query($connection,"SELECT * FROM wards WHERE status='0'");
//$wcount=mysqli_num_rows($getwardcount);
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
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<link href="../plugins/css/hover.css" rel="stylesheet" media="all">
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
            <div class="container-fluid p-b-0">
                <div class="row bg-title">
					<!--add this line to include bg image to title: style="background:url(../plugins/images/heading-title-bg.jpg) no-repeat center center /cover;" -->
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title">Admin Dashboard</h4>
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
                <!--row -->
				
				<div class="row p-b-10">
					<div class="col-md-12 col-sm-10">
						<div class="card card-inverse">
							<img id="theImgId" class="card-img" src="../plugins/images/cards/bg.png" height="120" alt="Card image">
							<div class="card-img-overlay" style="padding-top: 5px">
								<h4 class="card-title text-uppercase">WELCOME <?php echo $ausername; ?></h4>
								<p class="card-text">You are logged-in to ADMIN control panel, here are some of the basic information about hospital and some basic functions to perform. </p>
								<p class="card-text"><small class="text-white">~AlphaCare</small></p>
							</div>
						</div>
					</div>
				</div>
	
				
                <div class="row">
                    <div class="col-md-3 col-sm-6 hvr-float-shadow" onClick="window.location='view-patients.php'">
                        <div class="white-box">
							<h3 class="box-title"><b>Patients Admitted</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-wheelchair text-info"></i></li>
								<li class="text-right"><span class="counter"><?php echo $pcount ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow" onClick="window.location='view-doctors.php'">
                        <div class="white-box">
							<h3 class="box-title"><b>Doctors</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-user-md text-info"></i></li>
								<li class="text-right"><span class="counter"><?php echo $dcount ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow" onClick="window.location='view-staffs.php'">
                        <div class="white-box">
							<h3 class="box-title"><b>Staffs</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-id-badge text-info"></i></li>
								<li class="text-right"><span class="counter"><?php echo $scount ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow" onClick="window.location='view-wards.php'">
                        <div class="white-box">
							<h3 class="box-title"><b>Available Wards</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-bed text-info"></i></li>
								<li class="text-right"><span class="counter"><?php echo $wcount ?></span></li>
							</ul>
                        </div>
                    </div>
                </div>
                <!--/row -->
				<!--row -->
                <div class="row p-t-10">
                    <div class="col-md-3 col-sm-6 Hoveranimatep hvr-float" data-toggle="tooltip" data-original-title="Admit new Patient" onClick="window.location='add-patient.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-wheelchair bg-black Hoveranimatepat"></i>
                                <div class="bodystate p-t-10">
									<h4><b>ADD PATIENT</b></h4>
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 Hoveranimated hvr-float" data-toggle="tooltip" data-original-title="Create Doctor account" onClick="window.location='add-doctor.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-user-md bg-black Hoveranimatedoc"></i>
                                <div class="bodystate p-l-10 p-t-10">
									<h4><b>ADD DOCTOR</b></h4>
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 Hoveranimates hvr-float" data-toggle="tooltip" data-original-title="Create Staff account" onClick="window.location='add-staff.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-id-badge bg-black Hoveranimatestaff"></i>
                                <div class="bodystate p-t-10">
									<h4><b>ADD STAFF</b></h4>
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 Hoveranimatew hvr-float" data-toggle="tooltip" data-original-title="Create new ward" onClick="window.location='add-ward.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-bed bg-black Hoveranimatewrd"></i>
                                <div class="bodystate p-t-10">
									<h4><b>ADD WARD</b></h4>
                                    <!--<span class="text-muted" style="font-size: small"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row -->
                
                <!--DNS End-->
     
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
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/js/dashboard3.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){  
			$('.Hoveranimated').hover(function(){
				$(".Hoveranimatedoc").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatedoc").removeClass("fa-user-md").addClass("fa-plus");
			},
			function(){
				$(".Hoveranimatedoc").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatedoc").removeClass("fa-plus").addClass("fa-user-md");
			}
									
			)
			
			$('.Hoveranimatep').hover(function(){
				$(".Hoveranimatepat").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatepat").removeClass("fa-wheelchair").addClass("fa-plus");
			},
			function(){
				$(".Hoveranimatepat").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatepat").removeClass("fa-plus").addClass("fa-wheelchair");
			}
									
			)
				 
			$('.Hoveranimates').hover(function(){
				$(".Hoveranimatestaff").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatestaff").removeClass("ti-id-badge").addClass("fa fa-plus");
			},
			function(){
				$(".Hoveranimatestaff").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatestaff").removeClass("fa fa-plus").addClass("ti-id-badge");
			}
									
			)
					
			$('.Hoveranimatew').hover(function(){
				$(".Hoveranimatewrd").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatewrd").removeClass("fa-bed").addClass("fa-plus");
			},
			function(){
				$(".Hoveranimatewrd").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatewrd").removeClass("fa-plus").addClass("fa-bed");
			}
									
			)
		})
	</script>
	
	<script>
		function openlink(url){
			
			var win=window.open(url, '_blank');
			win.focus();
			
		}
	</script>
   <script>
		$(window).load(function() {

			var viewportWidth = $(window).width();
			if (viewportWidth < 750) {
					var theImg = document.getElementById('theImgId');
		theImg.height = 180;
			}

			$(window).resize(function () {

				if (viewportWidth < 750) {
					var theImg = document.getElementById('theImgId');
		theImg.height = 180;
				}
			});
		});
	</script>
</body>

</html>
