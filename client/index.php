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
$date=date("d-m-Y");

$fetchcno=mysqli_query($connection,"SELECT cno FROM clients WHERE cuname='$ausername'");
$cno=$fetchcno['cno'];


$getbillcount=mysqli_query($connection,"SELECT * FROM bills WHERE (billdate='$date') AND (cno=$cno)");
$bcount=mysqli_num_rows($getbillcount);

$getamtsum=mysqli_query($connection,"SELECT sum(total_amt) FROM bills WHERE (billdate='$date') AND (cno=$cno)");
$sumcount=mysqli_fetch_array($getamtsum);

$gettotbillcount=mysqli_query($connection,"SELECT * FROM bills WHERE cno=$cno");
$totbcount=mysqli_num_rows($gettotbillcount);

$gettotamtsum=mysqli_query($connection,"SELECT sum(total_amt) FROM bills WHERE cno=$cno");
$totsumcount=mysqli_fetch_array($gettotamtsum);

//$countapoint=mysqli_query($connection,"SELECT * FROM appointments JOIN doctors ON appointments.doc_id = doctors.doc_id  WHERE (status='In Process') AND (doctors.username='$ausername')");
//$acount=mysqli_num_rows($countapoint);
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
<!--	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">-->
	
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
                        <h4 class="page-title">Client Dashboard</h4>
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
					<div class="col-md-12 col-sm-10 hvr-wobble-horizontal">
						<div class="card card-inverse">
							<img id="theImgId" class="card-img" src="../plugins/images/cards/bg.png" height="120" alt="Card image">
							<div class="card-img-overlay" style="padding-top: 5px">
								<h4 class="card-title text-uppercase">WELCOME <?php echo $ausername; ?></h4>
								<p class="card-text" id="cText">You are logged-in to CLIENT control panel, here are some of the basic information about your invoices and sales </p>
<!--							<p id="wText" class="card-text text-warning"><i class="fa fa-info-circle"></i><b> THERE ARE <?php //echo mysqli_num_rows($resultcountmsg); ?> UNREAD MESSAGES AND  <?php echo $acount; ?> UNSCHEDULED APPOINTMENTS. </b></p>-->
								<!--<p class="card-text"><small class="text-white">~AlphaCare</small></p>-->
							</div>
						</div>
					</div>
				</div>
	
				
                <div class="row">
                    <div class="col-md-3 col-sm-6 hvr-float-shadow Hoveranimatevp" >
                        <div class="white-box">
							<h3 class="box-title"><b>Invoices Today</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-pencil-square-o text-info Hoveranimatevpt"></i></li>
								<li class="text-right"><span class="counter"><?php echo $bcount ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow">
                        <div class="white-box p-b-40">
							<h3 class="box-title"><b>Sales Today</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-clipboard-check text-info"></i></li>
								<li class="text-right"><span class="counter" style="font-size: 30px"><?php echo $sumcount[0]; ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow">
                        <div class="white-box">
							<h3 class="box-title"><b>All Invoices</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-clipboard-list text-info"></i></li>
								<li class="text-right"><span class="counter"><?php echo $totbcount ?></span></li>
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 hvr-float-shadow">
                        <div class="white-box p-b-40">
							<h3 class="box-title"><b>Total Sales</b></h3>
							<ul class="list-inline two-part">
								<li><i class="fa fa-rupee-sign text-info"></i></li>
								<li class="text-right"><span style="font-size: 30px" class="counter"><?php echo $totsumcount[0]; ?></span></li>
							</ul>
                        </div>
                    </div>
                </div>
                <!--/row -->
				<!--row -->
                <div class="row p-t-10 p-b-0">
                    <div class="col-md-6 col-sm-6 Hoveranimatep hvr-float" data-toggle="tooltip" data-original-title="Create New Bill" onClick="window.location='create-invoice.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-clipboard bg-black Hoveranimatepat"></i>
                                <div class="bodystate p-t-10">
									<h4><b>CREATE BILL</b></h4>
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 Hoveranimated hvr-float" data-toggle="tooltip" data-original-title="Click to view bills" onClick="window.location='view-paid-bills.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-paste bg-black Hoveranimatedoc"></i>
                                <div class="bodystate" style="padding-left: 5px; padding-top: 0px">
									<h4><b>VIEW BILLS</b></h4>
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6 Hoveranimates hvr-float" data-toggle="tooltip" data-original-title="<?php  //echo mysqli_num_rows($resultcountmsg).' '; ?>Unread Messages" onClick="window.location='inbox.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="far fa-envelope bg-black Hoveranimatestaff"></i>
                                <div class="bodystate p-t-10" style="padding-left: 6px">
									<h4><b>VIEW MESSAGE</b></h4> 
                                    <!--<span class="text-muted" style="font-size: 80%"></span>-->
                              <!--  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 Hoveranimatew hvr-float" data-toggle="tooltip" data-original-title="View IP Bills" onClick="window.location='view-ip-bills.php'">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="far fa-file-alt bg-black Hoveranimatewrd"></i>
                                <div class="bodystate p-t-10">
									<h4><b>VIEW BILLS</b></h4>
                                    <!--<span class="text-muted" style="font-size: small"></span>-->
                             <!--   </div>
                            </div>
                        </div>
                    </div> -->
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
				$(".Hoveranimatedoc").removeClass("fa-paste").addClass("fa-plus");
			},
			function(){
				$(".Hoveranimatedoc").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatedoc").removeClass("fa-plus").addClass("fa-paste");
			}
									
			)
			
			$('.Hoveranimatep').hover(function(){
				$(".Hoveranimatepat").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatepat").removeClass("fa-clipboard").addClass("fa-plus");
			},
			function(){
				$(".Hoveranimatepat").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatepat").removeClass("fa-plus").addClass("fa-clipboard");
			}
									
			)
				 
			$('.Hoveranimates').hover(function(){
				$(".Hoveranimatestaff").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatestaff").removeClass("far fa-envelope").addClass("fa fa-eye");
			},
			function(){
				$(".Hoveranimatestaff").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatestaff").removeClass("fa fa-eye").addClass("far fa-envelope");
			}
									
			)
					
			$('.Hoveranimatew').hover(function(){
				$(".Hoveranimatewrd").removeClass("bg-black").addClass("bg-success");
				$(".Hoveranimatewrd").removeClass("far fa-file-alt").addClass("fa fa-eye");
			},
			function(){
				$(".Hoveranimatewrd").removeClass("bg-success").addClass("bg-black");
				$(".Hoveranimatewrd").removeClass("fa fa-eye").addClass("far fa-file-alt");
			}
									
			)
			
//          $('.Hoveranimatevp').hover(function(){
//				$(".Hoveranimatevpt").removeClass("fa-wheelchair").addClass("fa-eye");
//			},
//			function(){
//				$(".Hoveranimatevpt").removeClass("fa-eye").addClass("fa-wheelchair");
//			}
//									
//			)
			
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
				document.getElementById('cText').style.fontSize = "80%";
				document.getElementById('wText').style.fontSize = "86%";
			}

			$(window).resize(function () {

				if (viewportWidth < 750) {
					var theImg = document.getElementById('theImgId');
		theImg.height = 180;
				document.getElementById('cText').style.fontSize = "80%";
				document.getElementById('wText').style.fontSize = "86%";
				}
			});
		});
	</script>  
</body>

</html>
