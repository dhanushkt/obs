<?php
$cuname=$_POST['cuname'];
$cemail=$_POST['cemail'];
$cphno=$_POST['cphno'];
$cpass=$_POST['cpass'];
$sname=$_POST['sname'];
$semail=$_POST['semail'];
$sphone=$_POST['sphone'];
$saddr=$_POST['saddress'];
$sgst=$_POST['sgst'];

$insertquery="INSERT INTO `clients` (cuname, cemail, cphno, cpass, sname, semail, sphno, saddr, sgst) VALUES ('$cuname','$cemail','$cphno','$cpass','$sname','$semail','$sphone','$saddr','$sgst')";


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
    <title>AlphaSystems - OBS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../plugins/css/animate.css" rel="stylesheet">
    <!-- Wizard CSS -->
    <link href="../plugins/bower_components/register-steps/steps.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../plugins/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-19175540-9', 'auto');
    ga('send', 'pageview');
    </script>
	<style type="text/css">
		body { 
			background-color: aqua;
		}
		
	</style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section style="background-color: #DDDDDD" id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="javascript:void(0)" class="text-center db m-b-40"><img src="../plugins/images/eliteadmin-logo-dark.png" alt="Home" />
                    <br/><img src="../plugins/images/eliteadmin-text-dark.png" alt="Home" /></a>
                <!-- multistep form -->
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Account Setup</li>
                        <li>Shop Details</li>
                   		<li>Shop Contact</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Create your account</h2>
<!--                        <h3 class="fs-subtitle">This is step 1</h3> -->
						<input type="text" name="cuname" placeholder="Username" />
                        <input type="email" name="cemail" placeholder="Email" />
                        <input type="password" name="cpass" placeholder="Password" />
                        <input type="password" name="crpass" placeholder="Confirm Password" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Shop Details</h2>
						<p>Displayed on bill</p>
                        <input type="text" name="sname" placeholder="Shop Name" />
                        <input type="email" name="semail" placeholder="Shop email" />
                        
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
<!--						<input type="submit" name="submit" class="submit action-button" value="Submit" />-->
	                    <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                   <fieldset>
                        <h2 class="fs-title">Shop Contact Details</h2>
<!--                        <h3 class="fs-subtitle">We will never sell it</h3>-->
                        <input type="text" name="sphone" placeholder="Shop phone (saparate multiple phone no. by comma)" />
						<textarea name="saddress" placeholder="Shop Address"></textarea>
						<input type="text" name="sgst" placeholder="GST number (optional)" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="submit" name="submit" class="submit action-button" value="Submit" />
                    </fieldset> 
                </form>
                <div class="clear"></div>
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
    <script src="../plugins/bower_components/register-steps/jquery.easing.min.js"></script>
    <script src="../plugins/bower_components/register-steps/register-init.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../plugins/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../plugins/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
