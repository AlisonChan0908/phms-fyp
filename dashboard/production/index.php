<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: SignupSignin/signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: SignupSignin/signin.php");
  }
?>
<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

	$pa_weight = '';
  $pa_weight_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_weight WHERE pa_id = $pa_id ORDER BY pa_weight_date ASC";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
    $pa_weight_date = $pa_weight_date . '"'. $row['pa_weight_date'].'",';
		$pa_weight = $pa_weight . '"'. $row['pa_weight'].'",';
	}

	$pa_weight = trim($pa_weight,",");

?>

<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

	$pa_sugarc = '';
    $pa_bg_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_bg WHERE pa_id = $pa_id ORDER BY pa_bg_date ASC, pa_bg_time ASC";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_bg_date = $pa_bg_date . '"'. $row['pa_bg_date'].'",';
		$pa_sugarc = $pa_sugarc . '"'. $row['pa_sugarc'].'",';
	}

	$pa_sugarc = trim($pa_sugarc,",");

?>

<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

    $pa_systolic = '';
    $pa_diastolic = '';
    $pa_bp_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_bp WHERE pa_id = $pa_id";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_bp_date = $pa_bp_date . '"'. $row['pa_bp_date'].'",';
        $pa_systolic = $pa_systolic . '"'. $row['pa_systolic'].'",';
        $pa_diastolic = $pa_diastolic . '"'. $row['pa_diastolic'].'",';
	}

    $pa_systolic = trim($pa_systolic,",");
    $pa_diastolic = trim($pa_diastolic,",");

?>
<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

    $pa_ldl = '';
    $pa_hdl = '';
    $pa_total_cho = '';
    $pa_cho_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_cholesterol WHERE pa_id = $pa_id";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_cho_date = $pa_cho_date . '"'. $row['pa_cho_date'].'",';
        $pa_ldl = $pa_ldl . '"'. $row['pa_ldl'].'",';
        $pa_hdl = $pa_hdl . '"'. $row['pa_hdl'].'",';
        $pa_total_cho = $pa_total_cho . '"'. $row['pa_total_cho'].'",';
	}

    $pa_ldl = trim($pa_ldl,",");
    $pa_hdl = trim($pa_hdl,",");
    $pa_total_cho = trim($pa_total_cho,",");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/PHMS.jpg" type="image/ico" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <title>PHMS | Homepage</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
        .user1 {
            font-size: 18px;
            text-align:left;
            
        }
        .logout {
            font-size: 15px;
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-lemon-o"></i> <span>PHMS <small>Chan ver.1.1</small></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
            <div class="profile_pic">
               
              </div>
              <div class="profile_info">
             
  <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<div class=user1>
         <p>Welcome, </br> <strong><?php echo $_SESSION['username']; ?></strong></p>
       </div>
      <div class=logout>
          <p> <a href="index.php?logout='1'" style="color: white;">Logout</a> </p>
      </div>
    <?php endif ?>
</div>  
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <li><a href="Covid-19/covid19.php">Covid-19</a></li>
                      <li><a href="../../symptomchecker/main/index.php">Symptom Checker</a></li>
                    </ul>
                  </li>


               

                  
                  <li><a><i class="fa fa-line-chart"></i> Health Tracking <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="measurements.php">Measurements</a></li>
                   
                    </ul>
                  </li>


                  <li><a><i class="fa fa-folder-open-o"></i> Health Information <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="personal_profile.php">Personal Profile</a></li>
                    <li><a href="health_history.php">Health History</a></li>
                    <li><a href="allergy.php">Allergy</a></li>
                    <li><a href="medications.php">Medications</a></li>
                   
                    <li><a>Imaging Reports<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="basic_imaging.php">Basic Imaging</a>
                            </li>
                            <li><a href="breast_imaging.php">Breast Imaging</a>
                            </li>
                            <li><a href="ir_imaging.php">Interventional Radiology (IR)</a>
                            </li>
                            <li><a href="nuclear_imaging.php">Nuclear Imaging</a>
                            </li>
                          </ul>
                        </li>
                    <li><a href="lab_results.php">Laboratory Test Results</a></li>
                    <li><a href="files.php"> Miscellaneous Files</a></li>

                  </ul>
                </li>
                  <li><a><i class="fa fa-plus-circle"></i> Emergency Profile <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="emergency_profile.php">Contacts</a></li>
                      <li><a href="insurance.php">Insurance</a></li>
                      <li><a href="medcard.php">Medical Card</a></li>
                     
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-calendar"></i> Appointments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="physician_info.php">Find a physician</a></li>
                      <li><a href="appointment_list.php">Appointment List</a></li>
                     
                   
                    </ul>
                  </li>

                  <li><a><i class="fa fa-calculator"></i> Health Calculators <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="health_cal.php">Health Calculators</a></li>
                    
                    </ul>
                  </li>






                  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="settings.php">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="SignupSignin/signin.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="SignupSignin/signin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- top navigation -->

         <!-- page content -->
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard 
              <!-- Large modal -->
              <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg" style= right:0px; >Alert </button>
            
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="font-size:50%;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Your latest health info</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
         
                      </br>                   
<strong style="color:black;" >BMI Levels</strong>
<!-- BMI Levels -->
<?php
    include "../../includes/db.php";

    $pa_id = $_SESSION['pa_id'];

    $query1 = "SELECT pa_weight FROM patient_weight WHERE pa_id = $pa_id ORDER BY pa_weight_date DESC LIMIT 1";
    $query2 = "SELECT pa_height FROM patient_height WHERE pa_id = $pa_id ORDER BY pa_height_date DESC LIMIT 1";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);

    
   
    $result3 = $result1->fetch_row();
    $result4 = $result2->fetch_row();


if($result3 == 0 ){
    $result3 = 1;
} else {
    $result3 = (double)$result3[0];
}


if($result4 == 0 ){
    $result4 = 1;
} else {
    $result4 = (double)$result4[0];
}
    

    $resultextreme = (pow(($result4 / 100),2)) ;
   
    $result5 = $result3 /$resultextreme;


    if ((double)$result5 <18.5 && $result5 > 1) {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your BMI falls within the underweight range.</div>";
    } else if ((double)$result5 >= 18.5 && $result5 < 25 ) {
        echo "<div class="." alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your BMI falls within the normal.</div>";
    } else if ((double)$result5 >= 25.0 && $result5 < 30 ) {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your BMI falls within the overweight range.</div>";
    } else if ((double)$result3 == 1 || $result4 == 1 ) {
        echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your weight and height.</div>";
    } else {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your BMI falls within the obese range.</div>";
    }

    ?>


<!-- LDL Cholesterol ALert -->
<?php
    include "../../includes/db.php";

    $pa_id = $_SESSION['pa_id'];

    $query1 = "SELECT pa_ldl FROM patient_cholesterol WHERE pa_id = $pa_id ORDER BY pa_cho_date DESC LIMIT 1";
    $query2 = "SELECT pa_hdl FROM patient_cholesterol WHERE pa_id = $pa_id ORDER BY pa_cho_date DESC LIMIT 1";
    $query3 = "SELECT pa_total_cho FROM patient_cholesterol WHERE pa_id = $pa_id ORDER BY pa_cho_date DESC LIMIT 1";

    $result1 = $con->query($query1);
    $result2 = $con->query($query2);
    $result3 = $con->query($query3);
    
    $result4 = $result1->fetch_row();
    $result5 = $result2->fetch_row();
    $result6 = $result3->fetch_row();

  
    if($result4 == 0 ){
        $result4 = 1;
    } else {
        $result4 = (double)$result4[0]; //ldl
    }
    
    
    if($result5 == 0 ){
        $result5 = 1;
    } else {
        $result5 = (double)$result5[0]; //hdl;
    }

    if($result6 == 0 ){
        $result6 = 1;
    } else {
        $result6 = (double)$result6[0]; //total_cho
    }
?>
</br>
<strong style="color:black;" >LDL Cholesterol Levels (Bad Cholesterol)</strong>
<?php
//if else for ldl

    if ((double)$result4 <100 && $result4 >1 ) {
        echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your LDL cholesterol level is optimal.</div>";
    } else if ((double)$result4 >= 100 && $result4 < 129 ) {
        echo "<div class="." alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your LDL cholesterol level is near optimal/above optimal.</div>";
    } else if ((double)$result4 >= 130 && $result4 < 159 ) {
        echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your LDL cholesterol level is borderline high.</div>";
    } else if ((double)$result4 >= 160 && $result4 < 189 ) {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your LDL cholesterol level is high.</div>";
    } else if ((double)$result4 == 1) {
        echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your LDL cholesterol level.</div>";
    } else {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your LDL cholesterol level is very high. Please consult a physician immediately.</div>";
    }
?>
</br>
<strong style="color:black;" >HDL Cholesterol Levels (Good Cholesterol)</strong>
  
<?php
// HDL Cholesterol Levels (Good Cholesterol)
  if ((double)$result5 <40 && $result5 >1 ) {
    echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your HDL cholesterol level is a major risk for heart disease. Please consult a physician immediately.</div>";
} else if ((double)$result5 >= 40 && $result5 < 59 ) {
    echo "<div class="." alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your HDL cholesterol level is normal. The higher, the better</div>";
} else if ((double)$result5 == 1 ) {
    echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your HDL cholesterol level.</div>";
} else {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your HDL cholesterol level is considered protective against heart disease.</div>";
}
?>
</br>
<strong style="color:black;" >Total Cholesterol Levels</strong>
<?php

  // Total Cholesterol Levels
  if ((double)$result6 <200 && $result6 >1 ) {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your total cholesterol level is desirable.</div>";
} else if ((double)$result6 >= 200 && $result6 < 239 ) {
    echo "<div class="." alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your total cholesterol level borderline high.</div>";
} else if ((double)$result4 == 1 || $result5 == 1 || $result6 == 1) {
    echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your LDL and HDL cholesterol levels.</div>";
} else {
    echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your total cholesterol level is high. Please consult a physician immediately.</div>";
}



    ?>
    
    </br>
<strong style="color:black;" >Blood Pressure Levels</strong>
<!-- Systolic BP Levels (the first number) – indicates how much pressure your blood is exerting against your artery walls when the heart beats.) -->
<!-- Diastolic BP Levels (the second number) – indicates how much pressure your blood is exerting against your artery walls while the heart is resting between beats. -->
<?php
    include "../../includes/db.php";

    $pa_id = $_SESSION['pa_id'];

    $query1 = "SELECT pa_systolic FROM patient_bp WHERE pa_id = $pa_id ORDER BY pa_bp_date DESC LIMIT 1";
    $query2 = "SELECT pa_diastolic FROM patient_bp WHERE pa_id = $pa_id ORDER BY pa_bp_date DESC LIMIT 1";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);

   
    $result3 = $result1->fetch_row();
    $result4 = $result2->fetch_row();


    if($result3 == 0 ){
        $result3 = 1;
    } else {
        $result3 = (double)$result3[0];
    }
    
    
    if($result4 == 0 ){
        $result4 = 1;
    } else {
        $result4 = (double)$result4[0];
    }


    if ((double)$result3 <120 && (double)$result3 >1 && (double)$result4 <80 && (double)$result4 >1 ) {
        echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your blood pressure is normal.</div>";
   
    } else if (((double)$result3 >=120 && (double)$result3 <=129 ) && ((double)$result4 <80 )) {
        echo "<div class="." alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your have an elevated blood pressure.</div>";
    
    } else if (((double)$result3 >=130 && (double)$result3 <=139 ) && ((double)$result4 >=80 && ((double)$result4 <=89) )) {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your have high blood pressure. (Hypertension Stage 1)</div>";
   
    } else if (((double)$result3 >=140 && (double)$result4 >=90 )) {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your have high blood pressure. (Hypertension Stage 2)</div>";
    
    } else if ((double)$result3 == 1 || $result4 == 1 ) {
        echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your systolic and diastolic blood pressure.</div>";
    } else {
        echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your are facing hypertensive crisis. Consult your doctor immediately.</div>";
    }

    ?>
</br>
<strong style="color:black;" >Blood Glucose Levels</strong>
<!-- Blood Glucose Levels -->
<?php
    include "../../includes/db.php";

    $pa_id = $_SESSION['pa_id'];

    $query1 = "SELECT pa_measuredt FROM patient_bg WHERE pa_id = $pa_id ORDER BY pa_bg_date DESC LIMIT 1";
    $query2 = "SELECT pa_diabetic FROM patient_bg WHERE pa_id = $pa_id ORDER BY pa_bg_date DESC LIMIT 1";
    $query3 = "SELECT pa_sugarc FROM patient_bg WHERE pa_id = $pa_id ORDER BY pa_bg_date DESC LIMIT 1";

    $result1 = $con->query($query1);
    $result2 = $con->query($query2);
    $result3 = $con->query($query3);
    
   
    $result4 = $result1->fetch_row();
    $result5 = $result2->fetch_row();
    $result6 = $result3->fetch_row();

    

    if($result4  == "NULL"  ){
        $result4 = 1;
    } else {
        $result4 = (string)$result4[0];
    }
    
    
    if($result5  == "NULL"){
        $result5 = 1;
    } else {
        $result5 = (string)$result5[0];
    }

    if($result6 == 0 ){
        $result6 = 1;
    } else {
        $result6 = (double)$result6[0];
    }
   

if ((string)$result4 == "Before breakfast" || (string)$result4 =="Before lunch" || (string)$result4 =="Before dinner" || (string)$result4 =="Fasting"  && (string)$result5 == "No" && (double)$result6 <100 && (double)$result6 >1 ) {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your blood glucose is normal.</div>";
} elseif ((string)$result4 == "Before breakfast" || (string)$result4 =="Before lunch" || (string)$result4 =="Before dinner" || (string)$result4 =="Fasting"  && (string)$result5 == "Yes" && (double)$result6 >80 && (double)$result6 <130  ) {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your blood glucose is normal.</div>";
} elseif ((string)$result4 == "After breakfast" || (string)$result4 =="After lunch" || (string)$result4 =="After dinner" && (string)$result5 == "No" && (double)$result6 <140 && (double)$result6 >1 ) {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your blood glucose is normal.</div>";
} elseif ((string)$result4 == "After breakfast" || (string)$result4 =="After lunch" ||(string)$result4 == "After dinner" && (string)$result5 == "Yes" && (double)$result6 <180 && (double)$result6 >1 ) {
    echo "<div class="."alertinfo"."> <span class="."closebtn"." >&times;</span> <strong>Info!</strong> Your blood glucose is normal.</div>";
} elseif ((string)$result4 == 1 || (string)$result5 == 1 || (double)$result6 == 1 ) {
    echo "<div class="."alertwarning"."> <span class="."closebtn"." >&times;</span> <strong>Notice!</strong> Please key in your blood glucose.</div>";
} else {
    echo "<div class="."alert"."> <span class="."closebtn"." >&times;</span> <strong>Alert!</strong> Your blood glucose is not normal. Please consult a physician immediately.</div>";
}   
     
    ?>

        
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</br>
 <p style= color:blue;>Keep up the good work if you do not receive any alerts. Maintain a balanced diet and stay healthy.</p>  
 <p style= color:red;><strong>Please consult a physician immediately if you receive an alert.</strong></p>     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        
                      </div>

                    </div>
                  </div>
                </div>
                <small></small></h3>
              </div>
<!--Start Chart Content -->
<div class="container">	
<div style="position:absolute; top:120px; left:250px; width:580px; height:580px;">    
			<canvas id="chart" style="width: 10vw; height: 10.5vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $pa_weight_date; ?>],// you defined here so show there
		            datasets: 
		            [{
		                label: 'Weight(in kg)',
		                data: [<?php echo $pa_weight; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'#99ffe6',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>

            <div class="clearfix"></div>
<!--BG Chart -->
<div style="position:absolute; top:120px; left:830px; width:570px; height:575px;">  
<canvas id="chart2" style="background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

<script>
  var ctx = document.getElementById("chart2").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [<?php echo $pa_bg_date; ?>],// you defined here so show there
          datasets: 
          [{
              label: 'Blood Glucose(mg/dL)',
              data: [<?php echo $pa_sugarc; ?>],
              backgroundColor: 'transparent',
              borderColor:'#99b3ff',
              borderWidth: 3
          }]
      },
   
      options: {
          scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
          tooltips:{mode: 'index'},
          legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
      }
  });
</script>    
  </div>      
<!--Chart BP -->
<div class="container">	
<div style="position:absolute; top:400px; left:250px; width:580px; height:530px;">     
			<canvas id="chart3" style=" background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart3").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $pa_bp_date; ?>],// you defined here so show there
		            datasets: 
		            [{
		                label: 'Systolic Blood Pressure(in mmHg)',
		                data: [<?php echo $pa_systolic; ?>],
                        
		                backgroundColor: 'transparent',
		                borderColor:'#ff00ff',
		                borderWidth: 3
		            },
                    {
		                label: 'Diastolic Blood Pressure(in mmHg)',
		                data: [<?php echo $pa_diastolic; ?>],
                        
		                backgroundColor: 'transparent',
		                borderColor:'#6600ff',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
  <!--Chart Cholesterol -->
<div class="container">	
<div style="position:absolute; top:401px; left:830px; width:575px; height:580px;">  	        
          <canvas id="chart4" style="background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
    
          <script>
            var ctx = document.getElementById("chart4").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $pa_cho_date; ?>],// you defined here so show there
                    datasets: 
                    [{
                        label: 'LDL (mg/dL)',
                        data: [<?php echo $pa_ldl; ?>],
                            
                        backgroundColor: 'transparent',
                        borderColor:'	#4dffff',
                        borderWidth: 3
                    },
                        {
                        label: 'HDL (mg/dL)',
                        data: [<?php echo $pa_hdl; ?>],
                            
                        backgroundColor: 'transparent',
                        borderColor:'#4d79ff',
                        borderWidth: 3
                    },
                        {
                        label: 'Total Cholesterol(mg/dL)',
                        data: [<?php echo $pa_total_cho; ?>],
                            
                        backgroundColor: 'transparent',
                        borderColor:'#e600e6',
                        borderWidth: 3
                    }]
                },
             
                options: {
                    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                    tooltips:{mode: 'index'},
                    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
                }
            });
          </script>
          </div>
              
                 
                </div>
              </div>
            
          
     


          </div>
          </div>
          </div>
          </div>
        <!-- page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            PHMS
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>